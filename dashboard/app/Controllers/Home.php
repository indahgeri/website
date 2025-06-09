<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('html');
        return view('home');
    }

    public function countdown(): string
    {
        helper('html');
        return view('countdown');
    }
}
