DROP TABLE IF EXISTS `rubric_post`;
#---
DROP TABLE IF EXISTS `daily_statistic`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `rubric`;
#---
DROP TABLE IF EXISTS `author`;
#---
CREATE TABLE `post` (
    `post_id` int unsigned NOT NULL auto_increment COMMENT 'Post ID',
    `url` varchar(100) NOT NULL UNIQUE COMMENT 'Url',
    `name` varchar(255) NOT NULL COMMENT 'Name',
    `img` varchar(100) DEFAULT NULL COMMENT 'Path to image',
    `intro_text` varchar(255) DEFAULT NULL COMMENT 'Intro text',
    `text` varchar(3000) DEFAULT NULL COMMENT 'Text',
    `author_id` int unsigned COMMENT 'Author ID',
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP COMMENT 'Data of post create',
    `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP COMMENT 'Data of post update',
    PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHAR SET utf8mb4 COMMENT 'Post entity';
#---
INSERT INTO `post` (`url`, `name`, `img`, `intro_text`, `text`, `author_id`, `created_at`)
VALUES ('33-sunt-asp', '33 sunt asperiores sed vero fugit', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '1', '2022-04-14 21:35:59'),
       ('facilis-quidem', 'Quo quos autem ut quae facilis eos quidem suscipit', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum?', 'Lorem ipsum dolor sit amet. Ut nobis quos et magnam optio ut provident beatae sed molestiae molestiae et voluptates doloribus et modi harum? A aliquam harum ut sequi dolores aut error perferendis sed saepe fugit ut soluta maiores eos tempore eaque. Quo nihil autem et voluptatum culpa qui inventore quidem sit dolorum quisquam et nihil voluptas.', '2', '2022-03-10 15:32:00'),
       ('rem-veritatis', 'Rem veritatis blanditiis est dolore minima?', 'news-placeholder.png', 'Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis.', 'Ad alias earum et pariatur maiores eos reprehenderit dicta hic eveniet nobis non velit blanditiis et eius fuga est distinctio omnis. Aut incidunt culpa eos autem aliquid non culpa facilis ex illum sapiente sed consequatur recusandae. A dolorem consectetur eum commodi nostrum et cumque veritatis in earum sunt aut aperiam doloremque non nesciunt eveniet hic quisquam voluptatem.', '3', '2022-04-02 20:35:59'),
       ('ut-ipsam-excepturi', 'Ut ipsam excepturi et sequi adipisci.', 'news-placeholder.png', 'Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit.', 'Nam exercitationem voluptate cum repudiandae illum qui odit distinctio et quia maiores qui modi nihil et repudiandae impedit. Ut quae inventore quo delectus explicabo aut sunt architecto qui libero magni qui voluptate alias eos repellendus recusandae. Qui Quis provident sed provident facere ut consequatur quia! Ex expedita optio ea quidem nisi et quas cupiditate vel nemo soluta est eaque aliquam.', '4', '2022-02-15 19:25:00'),
       ('et-officia-consequatur', 'Et officia consequatur qui necessitatibus suscipit.', 'news-placeholder.png', 'Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus.', 'Aut itaque corporis ex tempora dolorem vel aperiam explicabo. Et amet fugiat id quasi minima 33 galisum possimus. Id aperiam dolores quo fugit incidunt ut consequuntur sapiente et similique inventore aut galisum natus quo beatae voluptas. 33 nemo blanditiis 33 dolor nobis ut maiores nisi qui nobis dolores vel quas earum et voluptatem porro. Ut voluptate quas et deleniti dignissimos rem quibusdam ipsam et neque Quis hic tenetur voluptatibus. Non officia voluptatem ut asperiores ipsam et doloribus ipsam. Sit accusamus tenetur et sequi internos et dicta similique veniam aut tempore consequatur ut magni maxime in praesentium dicta. Rem tempora ut quod nemo id impedit perferendis sed adipisci architecto qui veniam neque.Quo dolore aspernatur sit repellat praesentium cum sequi reprehenderit et minus atque. Id nihil illum aut repudiandae error et reiciendis voluptate rem optio galisum.', '2', '2022-04-07 20:11:05'),
       ('nam-auten', 'Nam autem itaque ut labore obcaecati id omnis dolorum.', 'news-placeholder.png', 'Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum.', 'Sed culpa saepe ad quia quia sit molestiae internos qui reprehenderit voluptatem. In doloribus quia qui illo velit qui quam voluptas eos quia accusamus ea consectetur amet in minus galisum.', '2', '2022-04-15 16:32:09'),
       ('eum-inventore', 'Eum inventore eligendi id aliquid itaque aut autem aliquam', 'news-placeholder.png', 'Ut officia tempore ut voluptatem inventore et natus laudantium qui suscipit ratione id quis tempora.', 'Laudantium internos eos magnam illo vel officiis doloremque hic molestiae aperiam aut quam quaerat et error possimus qui perferendis aliquid. Id internos perspiciatis qui praesentium culpa ut rerum neque aut unde ullam non possimus amet et ducimus suscipit ut galisum nihil. Et suscipit repudiandae qui dolores voluptates et veniam corrupti et tempore perferendis qui recusandae necessitatibus ut expedita laborum.', '3', '2022-03-02 21:35:59'),
       ('sit-cup', 'Sit cupiditate est quia iusto.', 'news-placeholder.png', 'Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit. ', 'Vel fugiat nemo sit ipsam quisquam ut eius reprehenderit.  Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '1', '2022-03-22 21:35:59'),
       ('suscrit-volume', 'Et suscipit voluptatem qui quidem autem est consequatur dignissimos', 'news-placeholder.png', 'Eum quaerat magni et quia. Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '2', '2022-02-24 21:07:00'),
       ('ut-volutptaten', 'Ut voluptatem unde id veritatis saepe!', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '3', '2022-03-15 21:15:00'),
       ('architecto', 'Quo architecto modi nam consequatur quos?', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Quo architecto modi nam consequatur quos? Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '1', '2022-04-10 07:35:59'),
       ('veritatis', 'Veritatis blanditiis est dolore minima', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '5', '2022-03-30 21:00:05'),
       ('inventore', 'Inventore eligendi id aliquid itaque aut autem', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '2', '2022-04-04 21:08:59'),
       ('ipsam-excepturp', 'Excepturp asperiores sed vero fugit', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '2', '2022-04-02 21:00:59'),
       ('officia-consequatur', 'Officia sunt asperiores sed vero fugit', 'news-placeholder.png', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint!', 'Lorem ipsum dolor sit amet. Aut error fugit aut iste necessitatibus est quae rerum et placeat neque nam eligendi expedita vel maxime sint! Est nesciunt voluptatem in laboriosam molestiae sit nihil iste neque dicta quo consequatur magnam. Cum fugiat numquam et consequatur beatae aut dolores soluta non explicabo autem. 33 fugiat minus sit tempora iusto et neque voluptatem sed consequuntur nesciunt. Et beatae repellendus quo inventore vero 33 animi harum ut nobis ratione. Hic quidem aspernatur quo odit incidunt id molestiae voluptatem non harum voluptatum ut atque blanditiis et error quia ut odit deleniti. Aut blanditiis vitae et necessitatibus veritatis est delectus temporibus sit facilis ipsum est voluptatibus placeat.', '3', '2022-03-05 21:00:59');
#---
CREATE TABLE `author` (
    `author_id` int unsigned NOT NULL auto_increment COMMENT 'Author ID',
    `url` varchar(100) NOT NULL UNIQUE COMMENT 'Url',
    `name` varchar(255) NOT NULL COMMENT 'Author name',
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP COMMENT 'Data of author create',
    PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHAR SET utf8mb4 COMMENT 'Author entity';
#---
INSERT INTO `author` (`url`, `name`, `created_at`)
VALUES ('vadim-kolesnik', 'Vadim Kolesnik', '2022-02-03 21:00:59'),
       ('iryna-tkachuk', 'Iryna Tkachuk', '2022-02-05 18:00:59'),
       ('valentyna-sirenko', 'Valentyna Sirenko', '2022-03-05 16:00:59'),
       ('nikolay-galchenko', 'Nikolay Galchenko', '2022-01-25 09:00:59'),
       ('oksana-nazarova', 'Oksana Nazarova', '2022-03-07 11:00:59');
#---
CREATE TABLE `rubric` (
    `rubric_id` int unsigned NOT NULL auto_increment COMMENT 'Rubric ID',
    `url` varchar(100) NOT NULL UNIQUE COMMENT 'Url',
    `name` varchar(255) NOT NULL COMMENT 'Rubric name',
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP COMMENT 'Data of rubric create',
    PRIMARY KEY (`rubric_id`)
) ENGINE=InnoDB DEFAULT CHAR SET utf8mb4 COMMENT 'Rubric entity';
#---
INSERT INTO `rubric` (`url`, `name`, `created_at`)
VALUES ('main', 'Головні новини', '2022-02-03 21:00:59'),
       ('economic', 'Економіка', '2022-02-05 18:00:59'),
       ('culture', 'Культура', '2022-03-05 16:00:59'),
       ('interview', 'Інтерв&apos;ю', '2022-01-25 09:00:59'),
       ('health', 'Здоров&apos;я', '2022-03-07 11:00:59');
#---
CREATE TABLE `rubric_post` (
    `id` int unsigned NOT NULL auto_increment COMMENT 'ID',
    `rubric_id` int unsigned NOT NULL COMMENT 'Rubric ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHAR SET utf8mb4 COMMENT 'Relation table';
#---
INSERT INTO `rubric_post` (`rubric_id`, `post_id`)
VALUES ('1', '1'),
       ('1', '3'),
       ('1', '7'),
       ('2', '2'),
       ('2', '5'),
       ('2', '8'),
       ('3', '4'),
       ('3', '6'),
       ('3', '9'),
       ('4', '10'),
       ('4', '11'),
       ('4', '15'),
       ('5', '14'),
       ('5', '13'),
       ('5', '12');
#---
ALTER TABLE `rubric_post`
    ADD CONSTRAINT `FK_RUBRIC_ID_RUBRIC` FOREIGN KEY (`rubric_id`)
        REFERENCES `rubric` (`rubric_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_POST_ID_POST` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
CREATE TABLE `daily_statistic` (
    `id` int unsigned NOT NULL auto_increment COMMENT 'ID',
    `post_id` int unsigned UNIQUE COMMENT 'Post ID',
    `views` int unsigned DEFAULT NULL COMMENT 'Quantity views',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHAR SET utf8mb4 COMMENT 'Daily statistic of view';
#---
INSERT INTO `daily_statistic` (`post_id`, `views`)
VALUES ('1', '1'),
       ('2', '3'),
       ('3', '7'),
       ('5', '2'),
       ('8', '5'),
       ('10', '8'),
       ('13', '4'),
       ('14', '6');
#---
ALTER TABLE `daily_statistic`
    ADD CONSTRAINT `FK_POST_ID_DAILLY_STAT_POST_ID_POST` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
ALTER TABLE `post`
    ADD CONSTRAINT `FK_POST_ID_AUTHOR` FOREIGN KEY (`author_id`)
        REFERENCES `author` (`author_id`) ON DELETE SET NULL;
#---
ALTER TABLE `rubric_post`
    ADD CONSTRAINT `RP_RUBRIC_ID_POST_ID` UNIQUE (`rubric_id`,`post_id`);