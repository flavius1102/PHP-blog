<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query("SELECT *, posts.id as postId, users.id as userId, users.name as userName, categories.id as categoryId, categories.name as categoryName, posts.created_at as postCreated, users.created_at as userCreated FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.created_at DESC");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function deletePost($id) {
        $this->db->query("DELETE FROM posts WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
