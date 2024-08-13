<?php

class ServiceController
{
    private $serviceModel;
    private $db;
    private $view;
    public function __construct($db)
    {
        $this->db = $db;
        $this->serviceModel = new ArticlesModel($this->db);
    }

    public function createArticle()
    {
        try {
            $name = $_POST['name'];
            $content = $_POST['content'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $image = uploadFile($file);
            }
            $image = '';

            $res = $this->serviceModel->createArticle($name, $content, $image);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            print_r(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }
    }
    public function deleteArticle()
    {
        try {
            $id = $_POST['id'];
            $res = $this->serviceModel->deleteArticle($id);

            // add redirect
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            print_r(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
    public function updateArticle()
    {
        try {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $id = $_POST['id'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $image = uploadFile($file);
            }

            $image = '';

            $res = $this->serviceModel->updateArticle($name, $content, $image, $id);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            print_r(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
    public function getArticles()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $articles = $this->serviceModel->getArticles($page);
        include 'src/views/public/articles.php';
    }
    public function getArticle($id)
    {
        try {
            $res = $this->serviceModel->getArticle($id);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            print_r(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
}