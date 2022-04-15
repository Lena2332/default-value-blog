<?php
  /** @var \OKBlog\Blog\Block\RubricListBlock $block */
?>
<nav>
    <ul>
        <?php foreach ($block->getRubricList() as $rubric): ?>
            <li>
                <a href="/<?= $rubric->getUrl() ?>"><?= $rubric->getName() ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
