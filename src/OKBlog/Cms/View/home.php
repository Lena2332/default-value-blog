<?php
/** @var \OKBlog\Blog\Block\PageBlock $block */
?>
<section class="welcome-section">
    <div class="content-wrapper">
        <div class="content">
            <div class="welcome-section-title">
                <h1>Lorem ipsum dolor sit amet</h1>
                <h2>consectetur adipisicing elit.</h2>
            </div>
            <div class="welcome-section-items">

                <!-- 1 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dolore illo nisi optio
                        repudiandae? Architecto cumque exercitationem, facilis minima nesciunt nisi recusandae tempora
                        voluptas.</p>
                </div>

                <!-- 2 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, tempora voluptate? A dolor earum
                        eveniet excepturi fugit incidunt laudantium magni maiores, veniam?</p>
                </div>

                <!-- 3 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, consequatur cum debitis
                        distinctio dolorem eius est hic ipsum molestiae natus omnis porro sit.</p>
                </div>
            </div>
            <a href="javascript: void(0)" class="read-more-btn button-hover">
                Read More
            </a>
        </div>
    </div>
</section>
<main>
    <section title="Latest News" class="latest_news">
        <h2>Latest News</h2>
        <div class="news-list">
            <?php foreach($block->getLatestPosts(4,10) as $post): ?>
            <div class="news">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/images/<?= $post->getImg() ?>" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>" class="title"><?= $post->getName() ?></a>
                <?php
                $author = $block->getAuthorById($post->getAuthorId());
                if($author):
                    ?>
                    <span class="author_post"><i class="fa-solid fa-user"></i> Author: <a href="/<?= $author->getUrl() ?>"><?= $author->getName() ?></a></span>
                <?php endif; ?>
                <span>Created: <?= $post->getCreatedAt() ?></span>
                <button type="button"><a href="/<?= $post->getUrl() ?>">Read now</a></button>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</main>

