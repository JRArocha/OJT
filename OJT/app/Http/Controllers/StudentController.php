<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view ('WeDoOjt');
    }

    public function store(Request $request)
    {
        $values=[
            'name'=>$request->name,
            'email'=>$request->email,
            'course'=>$request->course,
            'section'=>$request->section
        ];

        $cmdCreate=Student::create($values);
        if($cmdCreate){
           return response()->json(['status'=>200,'msg'=>'Details has been successfully registered.']);
        }else{
           return response()->json(['status'=>201, 'msg'=>'Error On Save.']);
        }
    }

    public function search_student(Request $request)
    {
        $id = $request->id;
        $cmdSearch=Student::where('id', $id)->get();
        if($cmdSearch){
            return response()->json(['status'=>200,'data'=>$cmdSearch, 'msg'=>'User Found...']);
        }
        else{
            return response()->json(['status'=>201,'msg'=>'No user found...']);
        }
    }

    public function update_student(Request $request)
    {
        $id = $request->id;
        $values=[
            'name'=>$request->name,
            'email'=>$request->email,
            'course'=>$request->course,
            'section'=>$request->section
        ];

        $cmdUpdate=Student::where('id', $id)->update($values);
        if($cmdUpdate){
            return response()->json(['status'=>200, 'msg'=>'Details updated successfully.']);
        }else{
            return response()->json(['status'=>201, 'msg'=>'Error update.']);
        }
    }

    public function delete_student(Request $request)
    {
        $id = $request->id;
        $cmdDelete = Student::where('id', $id)->delete();
        if($cmdDelete){
            return response()->json(['status'=>200, 'msg'=>'Student record deleted successfully.']);
        }else{
            return response()->json(['status'=>201, 'msg'=>'Error deletion.']);
        }
    }

    public function get_allstudent(Request $request)
    {
        $cmdSelect=Student::get();
        return response()->json(['status'=>200,'data'=>$cmdSelect]);
    }
}
