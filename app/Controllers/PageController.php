<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PageController extends BaseController
{
    public function index()
    {
        echo "welcome to pagecontroller";
    }
    public function view($page)
    {
        $data['title'] = ucfirst($page);
        // echo "options $data";
        
        echo view('templates/header' , $data);
        // echo view('templates/navbar' , $data);
        echo view('pages/' .$page, $data);
        echo view('templates/footer' , $data);
    }
}
