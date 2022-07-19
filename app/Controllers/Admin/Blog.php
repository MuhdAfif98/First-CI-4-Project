<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Blog extends BaseController
{
    public function index()
    {
        echo 'This is admin blog area';
        // return view("shop");
    }

    public function createNew()
    {  
        return view("blog_form");
    }

    public function saveBlog()
    {  
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';

    }

    
}
