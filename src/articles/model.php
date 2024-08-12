<?php

require_once "./src/db/db.php";

class ArticlesModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function createArticle($name, $content, $image)
    {
        $sql = "INSERT INTO articles (name, content, image, created_at) VALUES (?, ?, ?, ?)";

        $create_at = gmdate('Y-m-d h:i:s \G\M\T');

        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([$name, $content, $image, $create_at]);
    }
    public function deleteArticle($id)
    {
        $sql = 'DELETE FROM articles WHERE id = ?';
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function updateArticle($name, $content, $image, $id)
    {
        $sql = 'UPDATE articles SET name=?, content=?, image=? WHERE id=?';
        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute([$name, $content, $image, $id]);
    }
    public function getArticles()
    {
        $sql = 'SELECT * FROM articles';
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getArticle($id)
    {
        $sql = 'SELECT * FROM articles WHERE id = ?';
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}