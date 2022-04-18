DROP TABLE IF EXISTS olena_kupriiets_blog;

DROP USER IF EXISTS 'olena_kupriiets_blog_user'@'%';

CREATE DATABASE olena_kupriiets_blog;

CREATE USER 'olena_kupriiets_blog_user'@'%' IDENTIFIED BY '5707stkom@32021tT';

GRANT ALL ON olena_kupriiets_blog.* TO 'olena_kupriiets_blog_user'@'%';