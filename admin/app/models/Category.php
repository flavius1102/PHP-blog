<?php

class Category {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getCategories() {
        $this->db->query("SELECT *, categories.id as categoryId FROM categories WHERE is_active = 1");

        $result = $this->db->resultSet();

        return $result;
    }

    public function addCategory($data) {
        $this->db->query("INSERT INTO categories (name, is_active) VALUES (:name, :is_active)");
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':is_active', $data['is_active']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategoryById($id) {
        $this->db->query("SELECT * FROM categories WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateCategory($data) {
        $this->db->query("UPDATE categories SET name = :name, is_active = :is_active WHERE id = :id");
        error_log("UPDATE categories SET name = :name, is_active = :is_active WHERE id = :id", 0);
        error_log($data['name'], 0);
        error_log($data['id'], 0);
        error_log($data['is_active'], 0);
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':is_active', $data['is_active']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
