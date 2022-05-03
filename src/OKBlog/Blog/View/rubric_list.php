<?php
  /** @var \OKBlog\Blog\Block\RubricListBlock $block */
?>
<nav>
    <div class="menu-btn-mobile">
        <button class="wrapper-button">
            <i></i><i></i><i></i>
        </button>
    </div>
    <ul>
        <?php foreach ($block->getRubricList() as $rubric): ?>
            <li>
                <a href="/<?= $rubric->getUrl() ?>"><?= $rubric->getName() ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
