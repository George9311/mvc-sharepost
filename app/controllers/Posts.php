<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        // Get posts
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts

        ];

        $this->view('posts/index', $data);
    }
  
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'sizes' => trim($_POST['sizes']),
                'brand' => trim($_POST['brand']),
                'price' => trim($_POST['price']),
                'image' => trim($_POST['image']),
                'title_err' => '',
                'body_err' => '',
                'brand_err' => '',
                'sizes_err' => ''

            ];

            // validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            // validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body';
            }
            if (empty($data['brand_err'])) {
                $data['brand_err'] = 'Please enter brand';
            }
            if (empty($data['sizes_err'])) {
                $data['sizes_err'] = 'Please enter size';
            }

            // Make sure no errors

            if (empty($data['title_err']) && empty($data['body_err'])) {
                //Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => '',
                'sizes' => '',
                'brand' => '',
                'price' => ''

            ];

            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'sizes' => trim($_POST['sizes']),
                'brand' => trim($_POST['brand']),
                'price' => trim($_POST['price']),
                'title_err' => '',
                'body_err' => '',
                'brand_err' => '',
                'sizes_err' => ''

            ];

            // validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            // validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body';
            }
            if (empty($data['brand_err'])) {
                $data['brand_err'] = 'Please enter brand';
            }
            if (empty($data['sizes_err'])) {
                $data['sizes_err'] = 'Please enter size';
            }

            // Make sure no errors

            if (empty($data['title_err']) && empty($data['body_err'])) {
                //Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);
            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'sizes' => $post->sizes,
                'brand' => $post->brand,
                'price' => $post->price

            ];

            $this->view('posts/edit', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);
            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {

            redirect('posts');
        }
    }
}
