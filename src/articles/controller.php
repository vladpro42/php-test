<?php
require_once "./src/articles/model.php";
require_once "./src/helpers/index.php";
class ControllerArticles
{
    private $model;
    public function __construct()
    {
        $this->model = new ArticlesModel();
    }

    public function createArticle()
    {
        try {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $file = $_FILES['image'];

            $image = uploadFile($file);

            $res = $this->model->createArticle($name, $content, $image);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            echo json_encode(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }
    }
    public function deleteArticle()
    {
        try {
            $id = $_POST['id'];
            $res = $this->model->deleteArticle($id);

            // add redirect
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            echo json_encode(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
    public function updateArticle()
    {
        try {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $id = $_POST['id'];
            $file = $_FILES['image'];

            $image = uploadFile($file);

            $res = $this->model->updateArticle($name, $content, $image, $id);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
            echo json_encode(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
    public function getArticles()
    {
        try {
            $res = $this->model->getArticles();
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            http_response_code(500);
        }

    }
    public function getArticle($id)
    {
        try {
            $res = $this->model->getArticle($id);
            echo json_encode($res);
        } catch (Exception $e) {
            $e->getMessage();
            echo json_encode(['error' => 'На сервере произошла ошибка, в результате которой он не может успешно обработать запрос.']);
        }

    }
}