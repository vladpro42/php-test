<?php include 'src/views/public/header.php'; ?>

<h1 class="articles__title">Наши услуги</h1>

<ul class="articles__list">
    <?php foreach ($articles as $article): ?>
        <li class="articles__item">
            <h2 class="articles__item-title">
                <?php echo $article['name']; ?>
            </h2>
            <img class="articles__img" width="600" height="400" src="<?php echo $article['image']; ?>"
                alt="<?php echo $article['name']; ?>">
            <p class="articles__text">
                <?php echo $article['content']; ?>
            </p>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Пагинация -->

<div class="pagination">
    <?php
    $page = 3;
    if ($page > 1): ?>
        <a href="index.php?action=services&page=<?php echo $page - 1; ?>">Предыдущая</a>
    <?php endif; ?>

    <?php if (count($articles) == 10): ?>
        <a href="index.php?action=services&page=<?php echo $page + 1; ?>">Следующая</a>
    <?php endif; ?>
</div>