<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {

        if (!isAdminLoggedIn()) {
            redirect('admins/index');
        }

        $data = [
            'title' => 'Admin Page',
            'description' => 'This is the Admin Page'
        ];
        $this->view('pages/index', $data);
    }
}
