<?php
class Admins extends Controller {
    public function __construct() {

        $this->adminModel = $this->model('Admin');
    }

    public function index() {

        // Init data
        $data = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456'
        ];

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if (!($this->adminModel->findAdminByEmail($data['email']))) {
            // Register Admin
            if ($this->adminModel->register($data)) {
                redirect('admins/login');
            } else {
                $this->view('admins/index', $data);
            }
        }
        $this->view('admins/index', $data);
    }

    public function login() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for admin/email
            if ($this->adminModel->findAdminByEmail($data['email'])) {
                // Admin found

            } else {
                // Admin not found
                $data['email_err'] = 'No admin found';
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInAdmin = $this->adminModel->login($data['email'], $data['password']);
                if ($loggedInAdmin) {
                    // Create Session
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['password_err'] = 'Email or password incorrect';
                    $this->view('admins/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admins/login', $data);
            }

        } else {
            // Init data
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('admins/login', $data);
        }
    }

    private function createAdminSession($admin) {
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['admin_email'] = $admin->email;
        $_SESSION['admin_name'] = $admin->name;
        redirect('admins/index');
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_name']);
        session_destroy();
        redirect('admins/login');
    }
}