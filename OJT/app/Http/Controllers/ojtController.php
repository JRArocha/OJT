<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class ojtController extends Controller
{
    public function list()
    {
        $data=Student::
        orderBy('name','asc')
        ->get();
        return view('welcome')->with('open', $data);
    }

    public function show($StudentID){
        return view('trial.show')->with('preview', Student::find($StudentID));
    }
}
