<?php
/** @var \OKBlog\Blog\Block\PageBlock $block */
?>
<main>
    <section title="Latest News">
        <h2>Latest News</h2>
        <div class="news-list">
            <?php foreach($block->getLatestPosts(4,10) as $post): ?>
            <div class="news">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <span>created: <?= $post->getPublicDate() ?></span>
                <button type="button">Read now</button>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</main>

