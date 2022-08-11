<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeDoController extends Controller
{
    public function home()
    {
        return view('WeDoOjt');
    }

}
