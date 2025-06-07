<?php

namespace Modules\Blog\Controllers;

// use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Blog extends BaseController
{
    public function index()
    {
        return view('Modules\Blog\Views\index');
    }
}