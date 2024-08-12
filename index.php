<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/normalize.css">
    <link rel="stylesheet" href="./public/css/index.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <a class="header__logo-link" href="#">LOGO</a>
                </div>
                <nav class="header__nav">
                    <ul class="header__list">
                        <li class="header__item">
                            <a href="#" class="header__item-link">Статьи</a>
                        </li>
                        <li class="header__item">
                            <a href="#" class="header__item-link">О нас</a>
                        </li>
                        <li class="header__item">
                            <a class="header__item-link" href="./src/admin/admin.php">to admin</a>
                        </li>
                    </ul>
                </nav>
                <a href="tel:+375298504988" class="header__phone">+375298504988</a>
                <a href="#" class="header__btn">Войти</a>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="main__section">
            <div class="container">
                <div class="main-section__inner">
                    <h1 class="main-section__title">Hello world</h1>
                    <p class="main-section__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
                        voluptatum.</p>
                    <button class="main-section__btn">Кнопка действия</button>
                </div>
            </div>
        </section>
    </main>

</body>

</html>

<?php
require_once ("./src/articles/controller.php");

$articlesController = new ControllerArticles();

$action = $_GET['action'] ?? 'get';

switch ($action) {
    case 'get':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $articlesController->getArticle($id);
        } else {
            $articlesController->getArticles();
        }
        break;
    case 'post':
        $articlesController->createArticle();
        break;
    case 'update':
        $articlesController->updateArticle();
        break;
    case 'delete':
        $articlesController->deleteArticle();
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Метод не поддерживается']);
        break;
}

