<?php

class Categories extends Controller {

    public function __construct() {
        if (!isAdminLoggedIn()) {
            redirect('admins/login');
        }
        $this->categoryModel = $this->model('Category');
    }

    public function index() {
        // Get categories
        $category = $this->categoryModel->getCategories();

        $data = [
            'categories' => $category
        ];

        $this->view('categories/index', $data);
    }
}


