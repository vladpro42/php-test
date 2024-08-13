<?php
class AdminController
{
    private $db;
    private $serviceModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->serviceModel = new ArticlesModel($this->db);
    }

    public function getAllArticles()
    {
        $articles = $this->serviceModel->getArticles();
        include 'src/views/admin/services_list.php';
    }

    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $file = $_FILES['image'];

            $uploadDir = 'public/uploads/';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $uploadfile = $uploadDir . basename($file['name']);
            $fromPath = $file['tmp_name'];

            $isSuccess = move_uploaded_file($fromPath, $uploadfile);
            $isSuccess ? $image = $uploadfile : $image = '';

            $this->serviceModel->createArticle($name, $content, $image);
            header('Location: index.php?action=admin_services');
        } else {
            include 'src/views/admin/service_form.php';
        }
    }
    public function updateArticle($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $content = $_POST['content'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $image = uploadFile($file);
            } else {
                $image = '';
            }
            $this->serviceModel->createArticle($name, $content, $image);
            header('Location: index.php?action=admin_services');
        } else {
            $service = $this->serviceModel->getArticle($id);
            include 'src/views/admin/service_form.php';
        }
    }
    public function deleteArticle()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $this->serviceModel->deleteArticle($id);
        header('Location: index.php?action=admin_services');
    }

}