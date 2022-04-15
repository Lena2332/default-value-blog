<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Post;

class Repository
{
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function getPostList(): array
    {
        return [
            1 => $this->makeEntity()
                 ->setPostId(1)
                 ->setName('33 sunt asperiores sed vero fugit')
                 ->setUrl('33-sunt-asp')
                 ->setImg('news-placeholder.png')
                 ->setIntroText('Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!')
                 ->setText('Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.')
                 ->setPublicDate('14.04.2022'),
            2 => $this->makeEntity()
                ->setPostId(2)
                ->setName('Quo quos autem ut quae facilis eos quidem suscipit')
                ->setUrl('facilis-quidem')
                ->setImg('news-placeholder.png')
                ->setIntroText('Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum?')
                ->setText('Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum? A aliquam harum ut sequi dolores aut error perferendis sed saepe fugit ut soluta maiores eos tempore eaque. Quo nihil autem et voluptatum culpa qui inventore quidem sit dolorum quisquam et nihil voluptas.')
                ->setPublicDate('10.03.2022'),
            3 => $this->makeEntity()
                ->setPostId(3)
                ->setName('Rem veritatis blanditiis est dolore minima?')
                ->setUrl('rem-veritatis')
                ->setImg('news-placeholder.png')
                ->setIntroText('Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis.')
                ->setText('Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis. Aut incidunt culpa eos autem aliquid non culpa facilis ex illum sapiente sed consequatur recusandae. A dolorem consectetur eum commodi nostrum et cumque veritatis in earum sunt aut aperiam doloremque non nesciunt eveniet hic quisquam voluptatem.')
                ->setPublicDate('1.04.2022'),
            4 => $this->makeEntity()
                ->setPostId(4)
                ->setName('Ut ipsam excepturi et sequi adipisci.')
                ->setUrl('ut-ipsam-excepturi')
                ->setImg('news-placeholder.png')
                ->setIntroText('Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit.')
                ->setText('Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit. Ut quae inventore quo delectus explicabo aut sunt architecto qui libero magni qui voluptate alias eos repellendus recusandae. Qui Quis provident sed provident facere ut consequatur quia! Ex expedita optio ea quidem nisi et quas cupiditate vel nemo soluta est eaque aliquam.')
                ->setPublicDate('4.04.2022'),
            5 => $this->makeEntity()
                ->setPostId(5)
                ->setName('Et officia consequatur qui necessitatibus suscipit.')
                ->setUrl('et-officia-consequatur')
                ->setImg('news-placeholder.png')
                ->setIntroText('Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus.')
                ->setText('Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus. Id aperiam dolores quo fugit incidunt ut consequuntur sapiente et similique inventore aut galisum natus quo beatae voluptas. 33 nemo blanditiis 33 dolor nobis ut maiores nisi qui nobis dolores vel quas earum et voluptatem porro. Ut voluptate quas et deleniti dignissimos rem quibusdam ipsam et neque Quis hic tenetur voluptatibus. Non officia voluptatem ut asperiores ipsam et doloribus ipsam. Sit accusamus tenetur et sequi internos et dicta similique veniam aut tempore consequatur ut magni maxime in praesentium dicta. Rem tempora ut quod nemo id impedit perferendis sed adipisci architecto qui veniam neque.Quo dolore aspernatur sit repellat praesentium cum sequi reprehenderit et minus atque. Id nihil illum aut repudiandae error et reiciendis voluptate rem optio galisum. ')
                ->setPublicDate('07.04.2022'),
            6 => $this->makeEntity()
                ->setPostId(6)
                ->setName('Nam autem itaque ut labore obcaecati id omnis dolorum.')
                ->setUrl('nam-auten')
                ->setImg('news-placeholder.png')
                ->setIntroText('Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum.')
                ->setText('Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum.')
                ->setPublicDate('12.04.2022'),
            7 => $this->makeEntity()
                ->setPostId(7)
                ->setName('Eum inventore eligendi id aliquid itaque aut autem aliquam')
                ->setUrl('eum-inventore')
                ->setImg('news-placeholder.png')
                ->setIntroText('Ut officia tempore ut voluptatem inventore et natus laudantium qui suscipit ratione id quis tempora.')
                ->setText('Laudantium internos eos magnam illo vel officiis doloremque hic molestiae aperiam aut quam quaerat et error possimus qui perferendis aliquid. Id internos perspiciatis qui praesentium culpa ut rerum neque aut unde ullam non possimus amet et ducimus suscipit ut galisum nihil. Et suscipit repudiandae qui dolores voluptates et veniam corrupti et tempore perferendis qui recusandae necessitatibus ut expedita laborum.')
                ->setPublicDate('11.04.2022'),
            8 => $this->makeEntity()
                ->setPostId(8)
                ->setName('Sit cupiditate est quia iusto.')
                ->setUrl('sit-cup')
                ->setImg('news-placeholder.png')
                ->setIntroText('Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit. Ex voluptas dolorum non ducimus veritatis qui quos dolorem ab assumenda iusto.')
                ->setText('Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit. Ex voluptas dolorum non ducimus veritatis qui quos dolorem ab assumenda iusto. Est modi autem vel repellendus optio excepturi fuga et nihil cumque in error sapiente in quisquam dolor a sunt quaerat.')
                ->setPublicDate('10.04.2022'),
            9 => $this->makeEntity()
                ->setPostId(9)
                ->setName('Et suscipit voluptatem qui quidem autem est consequatur dignissimos')
                ->setUrl('suscrit-volume')
                ->setImg('news-placeholder.png')
                ->setIntroText('Lorem ipsum dolor sit amet. Eum quaerat magni et quia fugit aut sapiente mollitia ut perspiciatis doloribus.')
                ->setText('Lorem ipsum dolor sit amet. Eum quaerat magni et quia fugit aut sapiente mollitia ut perspiciatis doloribus. Ut omnis excepturi ut aliquam omnis aut minus quas sit voluptatem aliquid. Eos inventore aspernatur aut expedita perspiciatis quo sequi harum nam sunt vero. Ab veritatis culpa ab veritatis esse sit voluptatibus incidunt sed necessitatibus nihil est culpa eius est consectetur sint aut totam adipisci.')
                ->setPublicDate('09.04.2022'),
            10 => $this->makeEntity()
                ->setPostId(10)
                ->setName('Ut voluptatem unde id veritatis saepe!')
                ->setUrl('ut-volutptaten')
                ->setImg('news-placeholder.png')
                ->setIntroText('Lorem ipsum dolor sit amet. Et iste omnis et odio consequatur cum iure error a consequatur eveniet qui saepe atque.')
                ->setText('Lorem ipsum dolor sit amet. Et iste omnis et odio consequatur cum iure error a consequatur eveniet qui saepe atque. Et reprehenderit cumque sed libero voluptas nam ipsa vitae vel praesentium dicta. Non debitis quia sunt culpa corporis tenetur qui molestias consequatur aut voluptas laboriosam et dignissimos harum.')
                ->setPublicDate('07.04.2022'),
            11 => $this->makeEntity()
                ->setPostId(11)
                ->setName('Quo architecto modi nam consequatur quos?')
                ->setUrl('architecto')
                ->setImg('news-placeholder.png')
                ->setIntroText('Ab dicta laboriosam vel unde molestiae ut nesciunt iusto est pariatur aliquid? Id aperiam eveniet')
                ->setText('Ab dicta laboriosam vel unde molestiae ut nesciunt iusto est pariatur aliquid? Id aperiam eveniet At nihil voluptate ut quaerat distinctio eos molestiae possimus et consequuntur velit a recusandae repellendus vero laboriosam. Id maiores exercitationem ab dolor mollitia aut voluptas quam et enim architecto ut voluptate architecto. Ut commodi mollitia est doloribus sunt et sapiente expedita a maxime consequatur non autem repellendus est temporibus dolores nam perspiciatis ducimus.')
                ->setPublicDate('05.04.2022'),
        ];

    }

    /**
     * @param string $url
     * @return Entity|null
     */
    public function getPostByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getPostList(),
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIdArr
     * @return Entity[]
     */
    public function getPostByIds(array $postIdArr): array
    {
        return array_intersect_key(
            $this->getPostList(),
            array_flip($postIdArr)
        );
    }

    /**
     * @param int $quantity
     * @param int $pastDays
     * @return Entity[]|null
     */
    public function getLatestPosts($quantity, $pastDays): ?array
    {
        $posts = $this->getPostList();

        //get unix time to past days
        $diffDayTime = time() - $pastDays * 86400;

        $data = array_filter($posts,
            function ($post) use ($diffDayTime) {
                $postTime = strtotime($post->getPublicDate());
                return $postTime >= $diffDayTime;
            }
        );

        usort($data, function ($item1, $item2) {
            return strtotime($item2->getPublicDate()) <=> strtotime($item1->getPublicDate());
        });

        //take only needed quantity of posts
        $data = array_slice($data, 0, $quantity);

        return $data;
    }


    /**
     * @return Entity
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }

}