<?php
/** @var \OKBlog\Blog\Block\PostBlock $block */
$post = $block->getPost();
?>
<main>
    <img src="img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getText() ?></p>
    <span><?= $post->getPublicDate() ?></span>
</main>