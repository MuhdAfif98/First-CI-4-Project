<?php

namespace App\Controllers;

use App\Models\CustomModel;

class Transactions extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new CustomModel($db);

        
    }
}
