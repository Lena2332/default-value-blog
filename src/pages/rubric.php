<main>
    <section title="Newss">
        <h1><?= $data['name'] ?></h1>
        <div class="news-list">
            <?php foreach(getRubricPosts($data['rubric_id']) as $post): ?>
            <div class="news">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/img/<?= $post['img'] ?>" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>" class="title"><?= $post['name'] ?></a>
                <span>created: <?= $post['public_date'] ?></span>
                <button type="button"><a href="/<?= $post['url'] ?>">Read now</a></button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
