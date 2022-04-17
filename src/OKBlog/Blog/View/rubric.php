<?php
/** @var \OKBlog\Blog\Block\RubricBlock $block */
?>
<main>
    <section title="Newss">
        <h1><?= $block->getRubric()->getName(); ?></h1>
        <div class="news-list">
            <?php foreach($block->getRubricPosts() as $post): ?>
            <div class="news">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <span>Author: <a href="/<?= $block->getAuthorById($post->getAuthorId())->getUrl() ?>"><?= $block->getAuthorById($post->getAuthorId())->getName() ?></a></span>
                <span>Created: <?= $post->getPublicDate() ?></span>
                <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
