<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
    public function index()
    {
        echo 'This is admin shop area';
        // return view("shop");
    }

    public function product($type,$product_id)
    {
        echo '<h2>This is a ADMIN product : '.$type.' with an id: '.$product_id.'</h2>';
        // return view("product");
    }

    
}
