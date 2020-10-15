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

    public function getCategoryById($id) {
        $this->db->query("SELECT * FROM categories WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}


