<?php
/** @var \OKBlog\Framework\View\Renderer $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{DV.Campus} PHP Framework</title>
    <link rel="preload" as="style" href="/css/main.min.css"/>
    <link rel="stylesheet" href="/css/main.min.css"/>
</head>
<body>
    <header>
        <div class="header-wrapper content-wrapper">
            <a href="/" title="{DV.Campus} PHP Framework">
                <img src="/images/logo.jpg" alt="{DV.Campus} Logo" width="200"/>
            </a>
            <?= $this->render(\OKBlog\Blog\Block\RubricListBlock::class) ?>
        </div>
    </header>


    <?= $this->render($this->getContent(), $this->getContentBlockTemplate()) ?>

    <footer>
        <div class="footer_wrapper">
            <nav>
                <ul class="footer-links">
                    <li class="footer-link-item">
                        <a href="/about-us">About Us</a>
                    </li>
                    <li class="footer-link-item">
                        <a href="/terms-and-conditions">Terms & Conditions</a>
                    </li>
                    <li class="footer-link-item">
                        <a href="/contact-us">Contact Us</a>
                    </li>
                </ul>
            </nav>
            <p class="copyright">© Default Value <?= date('Y') ?>. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>

