<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>Hello world</h1>
    <a href="./src/admin/admin.php">to admin</a>

    <form action="index.php">
        <input type="text" name="id" value="1">
        <input type="submit" value="submit">
    </form>
</body>

</html>

<?php
require_once ("./src/articles/controller.php");

$articlesController = new ControllerArticles();

$action = $_GET['action'];

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

