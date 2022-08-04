<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dar;


class ojtController extends Controller
{
    public function list()
    {
        $data=dar::
        orderBy('Lname','asc')
        ->get();
        return view('welcome')->with('sige', $data);
    }
}
