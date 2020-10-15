<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {

        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'ForumMVC',
            'description' => 'Simple Forum application on MVC PHP framework'
        ];
        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other admins'
        ];
        $this->view('pages/about', $data);
    }
}
