<?php

namespace App\Controllers;

use App\Controllers\Admin\Shop as AdminShop;

class Blog extends BaseController
{
    public function index()
    {
        $data=[
            //'meta_title' => 'CodeIgniter 4 Blog',
            'title' => 'This is the blog page',

        ];

        $posts = ['Title 1','Title 2', 'Title 3'];
        $data['posts'] = $posts;
        echo view('templates/header', $data);
        echo view('blog');
        echo view('templates/footer');

    }

    public function post(){
        $data=[
            'meta_title' => 'CodeIgniter 4 Blog',
            'title' => 'This is the SINGLE blog page',

        ];
        echo view('templates/header',$data);
        echo view('single_post');
        echo view('templates/footer');
    }

}
