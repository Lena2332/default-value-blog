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
                    <img src="/images/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <?php
                       if($post->getAuthorId()){
                           $author = $block->getAuthorById($post->getAuthorId());
                ?>
                           <span class="author_post"><i class="fa-solid fa-user"></i> Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
                <?php } ?>
                <span>Created: <?= $post->getCreatedAt() ?></span>
                <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
