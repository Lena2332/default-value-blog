# GET RUBRICS WITH POSTS (must return 7)
SELECT DISTINCT (r.rubric_id), r.name
FROM rubric r
    INNER JOIN rubric_post rp
        ON r.rubric_id = rp.rubric_id;

# GET AUTHORS WITH POST
SELECT a.author_id, a.name, COUNT(post_id) as quantity_posts
FROM `author` a
    INNER JOIN `post` p
        ON a.author_id = p.author_id
GROUP BY p.author_id;

# GET RUBRIC/POST/AUTHOR by ID
SELECT * FROM rubric WHERE rubric_id = 5;
SELECT * FROM post WHERE post_id = 7;
SELECT * FROM author WHERE author_id = 10;

# GET RUBRIC/POST/AUTHOR by URL
SELECT * FROM rubric WHERE url = 'health';
SELECT * FROM post WHERE url = 'post-7';
SELECT * FROM author WHERE url = 'noah-magaret';

# GET POSTS BY RUBRIC
SELECT p.post_id, p.name
FROM post p
    INNER JOIN rubric_post rp
        ON p.post_id = rp.post_id
WHERE rp.rubric_id = 5;

# GET AUTHORS sorted by number of POSTS
SELECT a.author_id, a.name, COUNT(p.post_id) as quantity_posts
FROM  `author` a
    INNER JOIN `post` p ON a.author_id = p.author_id
GROUP BY p.author_id ORDER BY quantity_posts DESC;

# GET RUBRIC with the highest number of AUTHORS (every post has 1 author)
SELECT r.rubric_id, r.name, COUNT(a.author_id) as quantity_authors
FROM `rubric` r
    INNER JOIN `rubric_post` rp ON r.rubric_id = rp.rubric_id
    INNER JOIN `post` p ON p.post_id = rp.post_id
    INNER JOIN `author` a ON a.author_id = p.author_id AND a.author_id IS NOT NULL
GROUP BY rp.rubric_id ORDER BY quantity_authors DESC;

# GET AUTHORS without namesakes
SELECT author.* FROM author
    INNER JOIN (SELECT name FROM author GROUP BY name HAVING COUNT(name) = 1) as author_unique
        ON (author.name = author_unique.name)
ORDER BY author.name;

SELECT a.* FROM author AS a
    LEFT JOIN author AS a2
        ON a.name = a2.name AND a.author_id != a2.author_id
WHERE a2.author_id IS NULL;

SELECT name FROM author GROUP BY name HAVING COUNT(name) = 1







