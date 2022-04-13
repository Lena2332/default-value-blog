<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{DV.Campus} PHP Framework</title>
    <style>
header,
        main,
        footer {
    border: 1px dashed black;
        }

        .news-list {
    display: flex;
}

        .news-list .news {
    max-width: 30%;
        }
    </style>
</head>
<body>
    <header>
        <a href="/" title="{DV.Campus} PHP Framework">
            <img src="/img/logo.jpg" alt="{DV.Campus} Logo" width="200"/>
        </a>
        <nav>
            <?php foreach (getRubricList() as $rubric): ?>
                <li>
                    <a href="/<?= $rubric['url'] ?>"><?= $rubric['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </nav>
    </header>

    <?php require_once "../src/pages/$page" ?>

    <footer>
        <nav>
            <ul>
                <li>
                    <a href="/about-us">About Us</a>
                </li>
                <li>
                    <a href="/terms-and-conditions">Terms & Conditions</a>
                </li>
                <li>
                    <a href="/contact-us">Contact Us</a>
                </li>
            </ul>
        </nav>
        <p>© Default Value <?= date('Y') ?>. All Rights Reserved.</p>
    </footer>
</body>
</html>

