<?php
/** @var \OKBlog\Blog\Block\PostBlock $block */
$post = $block->getPost();
?>
<main class="post_page">
    <h1><?= $post->getName() ?></h1>
    <div class="left_part">
        <img src="/images/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="300"/>
        <span class="created">Created: <?= $post->getCreatedAt() ?></span>
        <?php
            if ($post->getAuthorId()) {
                $author = $block->getAuthor($post->getAuthorId());
            ?>
            <span class="author_post">Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
        <?php  } ?>
    </div>
    <div class="right_part text"><?= $post->getText() ?></div>
    <div class="clear"></div>
</main>