<?php
/** @var \OKBlog\Blog\Block\PostBlock $block */
$post = $block->getPost();
?>
<main>
    <img src="img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getText() ?></p>
    <?php
    $author = $block->getAuthor($post->getAuthorId());
    if($author):
        ?>
        <span>Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
    <?php endif; ?>
    <span><?= $post->getCreatedAt() ?></span>
</main>