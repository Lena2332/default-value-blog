<?php

declare(strict_types=1);

namespace OKBlog\Install\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use OKBlog\Blog\Model\Rubric\Repository as RubricRepository;
use OKBlog\Blog\Model\Post\Repository as PostRepository;
use OKBlog\Blog\Model\Author\Repository as AuthorRepository;

class GenerateData extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'install:generate-data';

    private const POSTS_COUNT = 300;

    private const AUTHORS_COUNT = 45;

    private \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter;

    /**
     * @param \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter
     * @param string|null $name
     */
    public function __construct(
        \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter,
        string $name = null
    ) {
        parent::__construct($name);
        $this->adapter = $adapter;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generate demo data for blog testing');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->generateData();
        $output->writeln('Completed!');

        return self::SUCCESS;
    }

    /**
     * Generate test data
     *
     * @return void
     */
    private function generateData(): void
    {
        $this->profile([$this, 'truncateTables']);
        $this->profile([$this, 'generateRubrics']);
        $this->profile([$this, 'generateAuthors']);
        $this->profile([$this, 'generatePosts']);
        $this->profile([$this, 'generatePostRubrics']);
    }

    /**
     * Truncate (empty) tables before inserting new data
     *
     * @return void
     */
    private function truncateTables(): void
    {
        $tables = [
            'daily_statistic',
            PostRepository::TABLE_RUBRIC_POST,
            PostRepository::TABLE,
            RubricRepository::TABLE,
            AuthorRepository::TABLE
        ];
        $connection = $this->adapter->getConnection();
        $connection->query('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            $connection->query("TRUNCATE TABLE `$table`");
            $this->output->writeln("Truncated table: $table");
        }

        $connection->query('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Insert 10 rubrics. Add posts to random 7 of them
     *
     * @return void
     */
    private function generateRubrics(): void
    {
        $rubrics = [
            'Health', 'Main News', 'Economic', 'Culture', 'Interview', 'Cooking', 'Sport', 'Building', 'Children', 'Pets'
        ];
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO rubric (`name`, `url`, `created_at`)
                VALUES (:name, :url, :created_at);
            SQL);
        foreach ($rubrics as $rubric) {
            $statement->bindValue(':name', $rubric);
            $statement->bindValue(':url', strtolower(str_replace(' ','-', $rubric)));
            // random date from 2022-01-01 to 2022-04-22
            $statement->bindValue(':created_at', date('Y-m-d', random_int(1640988000, 1650609280)));
            $statement->execute();
        }
    }

    /**
     * Insert 20 authors.
     *
     * @return void
     */
    private function generateAuthors(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO author (`name`, `url`, `created_at`)
                VALUES (:name, :url, :created_at);
            SQL);
        for ($i = 1; $i <= self::AUTHORS_COUNT; $i++) {
            $name = $this->getRandomName();
            $statement->bindValue(':name', $name);
            $statement->bindValue(':url', strtolower(str_replace(' ','-', $name)));
            // random date from 2022-01-01 to 2022-04-22
            $statement->bindValue(':created_at', date('Y-m-d', random_int(1640988000, 1650609280)));
            $statement->execute();
            // generate authors with namesakes
            if (random_int(1, 4) === 1) {
                $statement->bindValue(':name', $name);
                $statement->bindValue(':url', strtolower(str_replace(' ','-', $name.'-2g')));
                // random date from 2022-01-01 to 2022-04-22
                $statement->bindValue(':created_at', date('Y-m-d', random_int(1640988000, 1650609280)));
                $statement->execute();
                $i++;
            }
        }
    }

    /**
     * @return void
     */
    private function generatePosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO post (`url`, `name`, `img`, `intro_text`, `text`, `author_id`, `created_at`)
                VALUES (:url, :name, :img, :intro_text, :text, :author_id, :created_at);
            SQL);

        for ($i = 1; $i <= self::POSTS_COUNT; $i++) {
            $name = "Post $i";
            $url = str_replace(' ', '-', strtolower($name));
            $statement->bindValue(':url', $url);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':img', 'news-placeholder.png');
            $statement->bindValue(':intro_text', "$name short description text");
            $statement->bindValue(':text', "$name full description text");
            $authorId = random_int(1, self::AUTHORS_COUNT);
            if (random_int(1, 7) === 1) {
                $authorId = null;
            }
            $statement->bindValue(':author_id', $authorId);
            // random date from 2022-01-01 to 2022-04-22
            $statement->bindValue(':created_at', date('Y-m-d', random_int(1640988000, 1650609280)));
            $statement->execute();
        }
    }

    /**
     * @return void
     */
    private function generatePostRubrics(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO rubric_post (`rubric_id`, `post_id`)
                VALUES (:rubric_id, :post_id);
            SQL);
        // Get only 7 random rubrics of total 10
        $rubricIds = array_rand(array_flip(range(1, 10)), 7);
        for ($i = 1; $i <= self::POSTS_COUNT; $i++) {
            if (random_int(1, 4) === 1) {
                continue;
            }
            $postRubrics = (array) array_rand(array_flip($rubricIds), random_int(1, 3));
            foreach ($postRubrics as $rubricId) {
                $statement->bindValue(':rubric_id', $rubricId);
                $statement->bindValue(':post_id', $i);
                $statement->execute();
            }
        }
    }

    /**
     * @return void
     */
    private function getRandomName(): string
    {
        static $randomNames = [
            'Norbert','Damon','Laverna','Annice','Brandie','Emogene','Cinthia','Magaret','Daria','Ellyn','Rhoda',
            'Debbra','Reid','Desire','Sueann','Shemeka','Julian','Winona','Billie','Michaela','Loren','Zoraida',
            'Jacalyn','Lovella','Bernice','Kassie','Natalya','Whitley','Katelin','Danica','Willow','Noah','Tamera',
            'Veronique','Cathrine','Jolynn','Meridith','Moira','Vince','Fransisca','Irvin','Catina','Jackelyn',
            'Laurine','Freida','Torri','Terese','Dorothea','Landon','Emelia'
        ];

        return $randomNames[array_rand($randomNames)]. ' ' .$randomNames[array_rand($randomNames)];
    }

    /**
     * @param callable $callback
     * @return void
     */
    private function profile(callable $callback): void
    {
        $start = microtime(true);
        $callback();
        $totalTime = number_format(microtime(true) - $start, 4);
        $this->output->writeln("Executing <info>$callback[1]</info> took <info>$totalTime</info>");
    }
}