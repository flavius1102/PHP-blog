<?php

class Posts extends Controller {

    public function __construct() {
        if (!isAdminLoggedIn()) {
            redirect('admins/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');
    }

    public function index() {
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }


    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $category = $this->categoryModel->getCategoryById($post->category_id);

        $data = [
            'post' => $post,
            'user' => $user,
            'category' => $category
        ];

        $this->view('posts/show', $data);
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check  for owner
            if (!$_SESSION['admin_id']) {
                redirect('posts');
            }

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }
}
