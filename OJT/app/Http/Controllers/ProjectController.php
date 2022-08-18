<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applicant;

class ProjectController extends Controller
{
    public function login()
    {
        return view('trial.loginpage');
    }

    public function home()
    {
        return view('WeDoProject');
    }

    public function applicant()
    {
        return view('applicantPage');
    }

    public function allApplicants(Request $request)
    {
        $cmdSelect=applicant::get();
        return response()->json(['status'=>200,'data'=>$cmdSelect]);
    }

    public function store(Request $request)
    {
        $imageName= $request->resume->getClientOriginalName();
        $values=[
            'fname'=>$request->fname,
            'mname'=>$request->mname,
            'lname'=>$request->lname,
            'sname'=>$request->sname,
            'bday'=>$request->bday,
            'gender'=>$request->gender,
            'city'=>$request->city,
            'prov'=>$request->prov,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'education'=>$request->education,
            'workExp'=>$request->workExp,
            'reason'=>$request->reason,
            'field'=>$request->field,
            'position'=>$request->position,
            'application'=>$request->application,
            'resume'=>$imageName

        ];

        $cmdCreate=applicant::create($values);

        if($cmdCreate){
            $request->resume->storeAs('/public/image',$imageName);
           return response()->json(['status'=>200,'msg'=>'Details has been successfully registered.', 'data'=>$cmdCreate]);
        }else{
           return response()->json(['status'=>201, 'msg'=>'Error On Save.']);
        }

        // $imageName= $request->signature->getClientOriginalName();

        // $request->signature->storeAs('public/',$imageName);

    }

    public function create(Request $request)
    {
        return view('applicantPage');
    }
}
