<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function contact()
    {
        return view('site.contact');
    }
}
