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

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'is_active' => trim($_POST['is_active']),
                'id' => trim($_POST['id']),
                'name_err' => '',
                'is_active_err' => ''
            ];

            // Validate title
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter category name';
            }
            // Validate body
            if (empty($data['is_active'])) {
                $data['is_active_err'] = 'Please enter whether the category active or not';
            }

            // Make sure no errors
            if (empty($data['name_err']) && empty($data['is_active_err'])) {
                // Validated
                if ($this->categoryModel->addCategory($data)) {
                    flash('category_message', 'Category Added');
                    redirect('categories');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('categories/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('categories/add', $data);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'is_active' => trim($_POST['is_active']),
                'admin_id' => $_SESSION['admin_id'],
                'name_err' => '',
                'is_active_err' => ''
            ];

            // Validate title
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // Validate body
            if (empty($data['is_active'])) {
                $data['is_active_err'] = 'Please enter whether category is active or not';
            }

            // Make sure no errors
            if (empty($data['name_err']) && empty($data['is_active_err'])) {
                // Validated
                if ($this->categoryModel->updateCategory($data)) {
                    flash('category_message', 'Category Updated');
                    redirect('categories');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('categories/edit', $data);
            }
        } else {
            // Get existing post from model
            $category = $this->categoryModel->getCategoryById($id);

            // Check  for owner
            if (!$_SESSION['admin_id']) {
                redirect('categories');
            }

            $data = [
                'id' => $id,
                'name' => $category->name,
                'is_active' => $category->is_active
            ];

            $this->view('categories/edit', $data);
        }
    }

    public function show($id) {
        $category = $this->categoryModel->getCategoryById($id);

        $data = [
            'category' => $category
        ];

        $this->view('categories/show', $data);
    }
}
