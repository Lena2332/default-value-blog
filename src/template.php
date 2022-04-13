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
        <menu>
            <li>Rubric 1</li>
            <li>Rubric 2</li>
            <li>Rubric 3</li>
            <li>Rubric 4</li>
        </menu>
    </header>

    <main>
        <section title="Latest News">
            <h2>Latest News</h2>
            <div class="news-list">
                <div class="news">
                    <a href="/news-1-url" title="News 1">
                        <img src="/img/news-placeholder.png" alt="News 1" width="200"/>
                    </a>
                    <a href="/news-1-url" title="News 1">News 1</a>
                    <span>07/08/2022</span>
                    <button type="button">Read now</button>
                </div>
                <div class="news">
                    <a href="/news-2-url" title="News 2">
                        <img src="/img/news-placeholder.png" alt="News 2" width="200"/>
                    </a>
                    <a href="/news-2-url" title="News 2">News 2</a>
                    <span>07/08/2022</span>
                    <button type="button">Read now</button>
                </div>
                <div class="news">
                    <a href="/news-3-url" title="News 3">
                        <img src="/img/news-placeholder.png" alt="News 3" width="200"/>
                    </a>
                    <a href="/news-3-url" title="News 3">News 3</a>
                    <span>07/08/2022</span>
                    <button type="button">Read now</button>
                </div>
            </div>
        </section>
    </main>

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

