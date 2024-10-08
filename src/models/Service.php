<?php

class ArticlesModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createArticle($name, $content, $image)
    {
        $sql = "INSERT INTO articles (name, content, image, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $content, $image]);
    }
    public function deleteArticle($id)
    {
        $sql = 'DELETE FROM articles WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function updateArticle($name, $content, $image, $id)
    {
        $sql = 'UPDATE articles SET name=?, content=?, image=? WHERE id=?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $content, $image, $id]);
    }
    public function getArticles($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $sql = 'SELECT * FROM articles LIMIT :limit OFFSET :offset';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getArticle($id)
    {
        $sql = 'SELECT * FROM articles WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}