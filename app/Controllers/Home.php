<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function about(): string
    {
        return view('about');
    }

    public function academics(): string
    {
        return view('academics');
    }

    public function news(): string
    {
        return view('news');
    }

    public function contact(): string
    {
        return view('contact');
    }

    public function register(): string
    {
        return view('register');
    }
}


