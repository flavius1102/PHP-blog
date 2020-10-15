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

    public function addPost($data) {
        $this->db->query("INSERT INTO posts (title, user_id, body, category_id) VALUES (:title, :user_id, :body, :category_id)");
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':category_id', $data['category_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}
