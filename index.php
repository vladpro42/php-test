<?php

require_once "src/controllers/HomeController.php";
require_once "src/controllers/ServiceController.php";
require_once "src/controllers/AdminController.php";
require_once "src/models/Service.php";
require_once "src/helpers/index.php";


try {
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Failed to connect with MySQL: " . $e->getMessage());
}

$action = isset($_GET["action"]) ? $_GET["action"] : 'home';

switch ($action) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'articles':
        $controller = new ServiceController($db);
        $controller->getArticles();
        break;
    case 'admin_services':
        $controller = new AdminController($db);
        $controller->getAllArticles();
        break;
    case 'add_service':
        $controller = new AdminController($db);
        $controller->createArticle();
        break;
    case 'edit_service':
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $controller = new AdminController($db);
        $controller->updateArticle($id);
        break;
    case 'delete_service':
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $controller = new AdminController($db);
        $controller->deleteArticle();
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo "Страница не найдена";
        break;
}
