<?php

declare(strict_types=1);

function getRubricList(): array
{
    return [
        1 => [
            'rubric_id' => 1,
            'name'      => 'Головні новини',
            'url'       => 'main',
            'posts'     => [1,3,7]
        ],
        2 => [
            'rubric_id' => 1,
            'name'      => 'Економіка',
            'url'       => 'economic',
            'posts'     => [2,5,8]
        ],
        3 => [
            'rubric_id' => 1,
            'name'      => 'Культура',
            'url'       => 'culture',
            'posts'     => [4,6,9]
        ],
        4 => [
            'rubric_id' => 1,
            'name'      => 'Інтерв\'ю',
            'url'       => 'interview',
            'posts'     => [10,11]
        ]
    ];
}

function getPostList(): array
{
    return [
        1 => [
           'post_id'     => 1,
           'name'        => '33 sunt asperiores sed vero fugit',
           'url'         => '33-sunt-asp',
           'img'         => '',
           'intro_text'  => 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! ',
           'text'        => 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat. ',
           'public_date' => '14.04.2022',
        ],
        2 => [
            'post_id'     => 2,
            'name'        => 'Quo quos autem ut quae facilis eos quidem suscipit',
            'url'         => 'facilis_quidem',
            'img'         => '',
            'intro_text'  => 'Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum? ',
            'text'        => 'Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum? A aliquam harum ut sequi dolores aut error perferendis sed saepe fugit ut soluta maiores eos tempore eaque. Quo nihil autem et voluptatum culpa qui inventore quidem sit dolorum quisquam et nihil voluptas. ',
            'public_date' => '10.03.2022',
        ],
        3 => [
            'post_id'     => 3,
            'name'        => 'Rem veritatis blanditiis est dolore minima?',
            'url'         => 'rem-veritatis',
            'img'         => '',
            'intro_text'  => 'Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis. ',
            'text'        => 'Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis. Aut incidunt culpa eos autem aliquid non culpa facilis ex illum sapiente sed consequatur recusandae. A dolorem consectetur eum commodi nostrum et cumque veritatis in earum sunt aut aperiam doloremque non nesciunt eveniet hic quisquam voluptatem. ',
            'public_date' => '1.04.2022',
        ],
        4 => [
            'post_id'     => 4,
            'name'        => 'Ut ipsam excepturi et sequi adipisci.',
            'url'         => 'ut-ipsam-excepturi',
            'img'         => '',
            'intro_text'  => 'Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit. ',
            'text'        => 'Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit. Ut quae inventore quo delectus explicabo aut sunt architecto qui libero magni qui voluptate alias eos repellendus recusandae. Qui Quis provident sed provident facere ut consequatur quia! Ex expedita optio ea quidem nisi et quas cupiditate vel nemo soluta est eaque aliquam. ',
            'public_date' => '4.04.2022',
        ],
        5 => [
            'post_id'     => 5,
            'name'        => 'Et officia consequatur qui necessitatibus suscipit.',
            'url'         => 'et-officia-consequatur',
            'img'         => '',
            'intro_text'  => 'Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus.',
            'text'        => 'Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus. Id aperiam dolores quo fugit incidunt ut consequuntur sapiente et similique inventore aut galisum natus quo beatae voluptas. 33 nemo blanditiis 33 dolor nobis ut maiores nisi qui nobis dolores vel quas earum et voluptatem porro. Ut voluptate quas et deleniti dignissimos rem quibusdam ipsam et neque Quis hic tenetur voluptatibus. Non officia voluptatem ut asperiores ipsam et doloribus ipsam. Sit accusamus tenetur et sequi internos et dicta similique veniam aut tempore consequatur ut magni maxime in praesentium dicta. Rem tempora ut quod nemo id impedit perferendis sed adipisci architecto qui veniam neque.Quo dolore aspernatur sit repellat praesentium cum sequi reprehenderit et minus atque. Id nihil illum aut repudiandae error et reiciendis voluptate rem optio galisum. ',
            'public_date' => '07/04/2022',
        ],
        6 => [
            'post_id'     => 6,
            'name'        => 'Nam autem itaque ut labore obcaecati id omnis dolorum. ',
            'url'         => 'nam-auten',
            'img'         => '',
            'intro_text'  => 'Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum. ',
            'text'        => 'Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum. ',
            'public_date' => '12.04.2022',
        ],
        7 => [
            'post_id'     => 7,
            'name'        => 'Eum inventore eligendi id aliquid itaque aut autem aliquam',
            'url'         => 'eum-inventore',
            'img'         => '',
            'intro_text'  => 'Ut officia tempore ut voluptatem inventore et natus laudantium qui suscipit ratione id quis tempora. ',
            'text'        => 'Laudantium internos eos magnam illo vel officiis doloremque hic molestiae aperiam aut quam quaerat et error possimus qui perferendis aliquid. Id internos perspiciatis qui praesentium culpa ut rerum neque aut unde ullam non possimus amet et ducimus suscipit ut galisum nihil. Et suscipit repudiandae qui dolores voluptates et veniam corrupti et tempore perferendis qui recusandae necessitatibus ut expedita laborum. ',
            'public_date' => '11.04.2022',
        ],
        8 => [
            'post_id'     => 8,
            'name'        => 'Sit cupiditate est quia iusto.',
            'url'         => 'sit-cup',
            'img'         => '',
            'intro_text'  => 'Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit. Ex voluptas dolorum non ducimus veritatis qui quos dolorem ab assumenda iusto. ',
            'text'        => 'Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit. Ex voluptas dolorum non ducimus veritatis qui quos dolorem ab assumenda iusto. Est modi autem vel repellendus optio excepturi fuga et nihil cumque in error sapiente in quisquam dolor a sunt quaerat.',
            'public_date' => '10.04.2022',
        ],
        9 => [
            'post_id'     => 9,
            'name'        => 'Et suscipit voluptatem qui quidem autem est consequatur dignissimos',
            'url'         => 'suscrit-volume',
            'img'         => '',
            'intro_text'  => 'Lorem ipsum dolor sit amet. Eum quaerat magni et quia fugit aut sapiente mollitia ut perspiciatis doloribus. ',
            'text'        => 'Lorem ipsum dolor sit amet. Eum quaerat magni et quia fugit aut sapiente mollitia ut perspiciatis doloribus. Ut omnis excepturi ut aliquam omnis aut minus quas sit voluptatem aliquid. Eos inventore aspernatur aut expedita perspiciatis quo sequi harum nam sunt vero. Ab veritatis culpa ab veritatis esse sit voluptatibus incidunt sed necessitatibus nihil est culpa eius est consectetur sint aut totam adipisci. ',
            'public_date' => '09.04.2022',
        ],
        10 => [
            'post_id'     => 10,
            'name'        => 'Ut voluptatem unde id veritatis saepe! ',
            'url'         => 'ut-volutptaten',
            'img'         => '',
            'intro_text'  => 'Lorem ipsum dolor sit amet. Et iste omnis et odio consequatur cum iure error a consequatur eveniet qui saepe atque. ',
            'text'        => 'Lorem ipsum dolor sit amet. Et iste omnis et odio consequatur cum iure error a consequatur eveniet qui saepe atque. Et reprehenderit cumque sed libero voluptas nam ipsa vitae vel praesentium dicta. Non debitis quia sunt culpa corporis tenetur qui molestias consequatur aut voluptas laboriosam et dignissimos harum. ',
            'public_date' => '07.04.2022',
        ],
        11 => [
            'post_id'     => 11,
            'name'        => 'Quo architecto modi nam consequatur quos?',
            'url'         => 'architecto',
            'img'         => '',
            'intro_text'  => 'Ab dicta laboriosam vel unde molestiae ut nesciunt iusto est pariatur aliquid? Id aperiam eveniet ',
            'text'        => 'Ab dicta laboriosam vel unde molestiae ut nesciunt iusto est pariatur aliquid? Id aperiam eveniet At nihil voluptate ut quaerat distinctio eos molestiae possimus et consequuntur velit a recusandae repellendus vero laboriosam. Id maiores exercitationem ab dolor mollitia aut voluptas quam et enim architecto ut voluptate architecto. Ut commodi mollitia est doloribus sunt et sapiente expedita a maxime consequatur non autem repellendus est temporibus dolores nam perspiciatis ducimus. ',
            'public_date' => '05.04.2022',
        ],

    ];
}

function getRubricPosts(int $rubricId): array
{
    $rubrics = getRubricList();

    if (!isset($rubrics[$rubricId])) {
        throw new InvalidArgumentException("Rubric with ID $rubricId does not exist");
    }

    $rubricPosts = [];
    $posts = getPostList();

    foreach($rubrics[$rubricId]['posts'] as $postId){
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Post with ID $postId from rubric $rubricId does not exist");
        }

        $rubricPosts[] = $posts[$postId];
    }

    return $rubricPosts;
}

function getRubricByUrl(string $rubricUrl): ?array
{
    $rubrics = getRubricList();

    $data = array_filter($rubrics,
        function($rubric) use ($rubricUrl){
           return $rubric['url'] === $rubricUrl;
        }
    );

    return $data;
}

function getPostByUrl(string $postUrl): ?array
{
    $posts = getPostList();

    $data = array_filter($posts,
        function($post) use ($postUrl){
            return $post['url'] === $postUrl;
        }
    );

    return $data;

}

function getLatestNews(int $quantity = 5, int $pastDays = 2): ?array
{
   $posts = getPostList();

   //get unix time to past days
   $diffDayTime = time() - $pastDays * 86400;

   $data = array_filter($posts,
       function($post) use($diffDayTime){
           $postTime = strtotime($post['public_date']);
           return $postTime >= $diffDayTime;
       }
   );

   usort($data, function ($item1, $item2) {
       return strtotime($item2['public_date']) <=> strtotime($item1['public_date']);
   });

   //take only needed quantity of posts
   $data = array_slice($data, 0, $quantity);

   return $data;
}


