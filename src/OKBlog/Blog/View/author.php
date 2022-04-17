<?php
/** @var \OKBlog\Blog\Block\AuthorBlock $block */
?>
<main>
    <section title="News">
        <h1><?= $block->getAuthor()->getName(); ?></h1>
        <div class="news-list">
            <?php foreach($block->getAuthorPosts() as $post): ?>
                <div class="news">
                    <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                        <img src="/img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                    </a>
                    <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                    <span>Rubric: <?= $block->getRubricByPostId($post->getPostId())->getName() ?></span>
                    <span>Created: <?= $post->getPublicDate() ?></span>
                    <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
