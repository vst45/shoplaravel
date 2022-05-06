<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index()
    {
        return view('blog.index');
    }
}
