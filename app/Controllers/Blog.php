<?php

namespace App\Controllers;

use App\Controllers\Admin\Shop as AdminShop;
use App\Models\BlogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new CustomModel($db);
        echo '<pre>';
        print_r($model->getPosts());
        echo '</pre>';
        $data = [
            //'meta_title' => 'CodeIgniter 4 Blog',
            'title' => 'This is the blog page',

        ];

        $posts = ['Title 1', 'Title 2', 'Title 3'];
        $data['posts'] = $posts;

        // echo view('templates/header', $data);
        // echo view('blog');
        // echo view('templates/footer');

        return view('blog', $data);
    }

    public function post($id)
    {
        $model = new BlogModel();
        $post = $model->find($id);
        if ($post) {
            $data = [
                'meta_title' => $post['post_title'],
                'title' => $post['post_title'],
                'post' => $post
            ];
        } else {
            $data = [
                'meta_title' => 'Post not found',
                'title' => 'Post not found',
            ];
        }

        // $data = [
        //     'meta_title' => 'CodeIgniter 4 Blog',
        //     'title' => 'This is the SINGLE blog page',
        // ];
        // echo view('templates/header',$data);
        // echo view('single_post');
        // echo view('templates/footer');
        return view('single_post', $data);
    }

    public function new()
    {
        $data = [
            'meta_title' => 'New Post',
            'title' => 'Create new post',
        ];
        if ($this->request->getMethod() == 'post') {
            $model = new BlogModel();
            $model->save($_POST);
        }
        return view('new_post', $data);
    }

    public function delete($id)
    {
        $model = new BlogModel();
        $post = $model->find($id);
        if ($post) {
            $model->delete($id);
            return redirect()->to('/blog');
        }
    }

    public function edit($id)
    {
        $model = new BlogModel();
        $post = $model->find($id);

        $data = [
            'meta_title' => $post['post_title'],
            'title' => $post['post_title'],
            'post' => $post
        ];
        if ($this->request->getMethod() == 'post') {
            $model = new BlogModel();
            $_POST['post_id'] = $id;
            $model->save($_POST);
            $post = $model->find($id);
        }
        $data['post'] = $post;
        return view('edit_post', $data);
    }
}
