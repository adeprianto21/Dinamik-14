<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function pca()
    {
        return view('pca');
    }

    public function netcomp()
    {
        return view('netcomp');
    }

    public function cspc()
    {
        return view('cspc');
    }

    public function webdev()
    {
        return view('webdev');
    }

    public function animation()
    {
        return view('animation');
    }
}
