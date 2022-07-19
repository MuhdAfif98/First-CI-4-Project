<?php

namespace App\Controllers;

use App\Controllers\Admin\Shop as AdminShop;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
        //return view('shop');
    }

    function validation(){
        $shop = new Shop();
        echo $shop->product('laptop', 'lenovo').'<br>';

        $adminShop = new AdminShop();
        echo $adminShop->product('laptop', 'asus');
    }

    function show404(){
        echo 'This is  404 page error';
    }
}
