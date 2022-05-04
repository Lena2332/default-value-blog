<?php
  /** @var \OKBlog\Blog\Block\RubricListBlock $block */
?>
<nav>
    <div class="menu-btn-mobile" id="menu-btn-mobile">
        <button class="wrapper-button">
            <i></i><i></i><i></i>
        </button>
    </div>
    <div class="nav-menu" id="nav-wrapper">
        <ul>
            <?php foreach ($block->getRubricList() as $rubric): ?>
                <li>
                    <a href="/<?= $rubric->getUrl() ?>"><?= $rubric->getName() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
