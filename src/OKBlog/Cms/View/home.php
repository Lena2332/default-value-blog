<?php
/** @var \OKBlog\Blog\Block\PageBlock $block */
?>
<main>
    <section title="Latest News">
        <h2>Latest News</h2>
        <div class="news-list">
            <?php foreach($block->getLatestPosts() as $post): ?>
            <div class="news">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/img/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <?php
                $author = $block->getAuthorById($post->getAuthorId());
                if($author):
                    ?>
                    <span>Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
                <?php endif; ?>
                <span>Created: <?= $post->getCreatedAt() ?></span>
                <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</main>

