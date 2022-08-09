<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view ('trial.register');
    }

    public function store(Request $request)
    {
        $values=[
            'name'=>$request->name,
            'email'=>$request->email,
            'course'=>$request->course,
            'course'=>$request->course,
            'section'=>$request->section
        ];

        $cmdCreate=Student::create($values);
        if($cmdCreate){
           return response()->json(['status'=>200, 'msg'=>'Details has been successfully registered.']);
        }else{
           return response()->json(['status'=>201, 'msg'=>'Error On Save.']);
        }
    }

    public function update_student()
    {
        $cmdUpdate=Student::update($values)->where('id',$id);
        return response()->json(['status'=>200,'data'=>$cmdDelete]);
    }


    public function delete_student()
    {
        $cmdDelete=Student::delete($values)->where('id',$id);
        return response()->json(['status'=>200,'data'=>$cmdDelete]);
    }


    public function get_allstudent(Request $request)
    {
        $cmdSelect=Student::get();
        return response()->json(['status'=>200,'data'=>$cmdSelect]);
    }




}
