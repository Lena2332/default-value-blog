<?php
/** @var \OKBlog\Blog\Block\Modules\LatestPosts $block */

?>
<section title="Latest News" class="latest_news">
    <h2>Latest News</h2>
    <div class="news-list blog-slider">
        <?php foreach($block->getPosts() as $post): ?>
            <div class="news">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/images/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <?php
                if($post->getAuthorId()):
                    $author = $block->getAuthorById($post->getAuthorId());
                    ?>
                    <span class="author_post"><i class="fa-solid fa-user"></i> Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
                <?php endif; ?>
                <span>Created: <?= $post->getCreatedAt() ?></span>
                <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
            </div>
        <?php endforeach ?>
    </div>
</section>
