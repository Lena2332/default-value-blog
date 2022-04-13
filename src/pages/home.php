<main>
    <section title="Latest News">
        <h2>Latest News</h2>
        <div class="news-list">
            <?php foreach(getLatestNews(4,10) as $post): ?>
            <div class="news">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/img/<?= $post['img'] ?>" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>" class="title"><?= $post['name'] ?></a>
                <span>created: <?= $post['public_date'] ?></span>
                <button type="button">Read now</button>
            </div>
            <?php endforeach ?>
        </div>
    </section>
</main>

