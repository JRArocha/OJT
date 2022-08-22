<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\applicant;
use App\Models\User;
use App\Models\UserLog;
use DB;



class ProjectController extends Controller
{
    public function logout(Request $request){
        if(session()->has('UID')){
            session()->pull('UID');
            return redirect('/login');
        }
    }

    public function fetch_login(Request $request){
        $username = $request->uname;
        $password = $request->upass;

        $query = UserLog::where('username',$username)->first();
        if(!$query)
        {
            return response()->json(['status'=>201,'msg'=>"Unrecognized Username!"]);
        }
        else
        {
            if(Hash::check($request->upass, $query->password))
            {
                $request->session()->put('UID', $query->id);
                $request->session()->put('email', $query->email);
                return redirect('/');
            }
            else
            {
                return response()->json(['status'=>201,'msg'=>"Invalid Login Account!"]);
            }
        }
    }

    public function getloguser(Request $request){
        $id=session()->get('UID');
        $query = DB::table('users')
        ->where('id',$id)
        ->get();
        return response()->json(['status'=>201,'data'=>$query]);
    }

    public function login()
    {
        return view('trial.loginpage');
    }

    public function home(Request $request)
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
        $total=$cmdSelect->count();
        return response()->json(['status'=>200,'data'=>$cmdSelect, 'total'=>$total]);
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
           return response()->json(['status'=>500, 'msg'=>'Error On Save.']);
        }

        // $imageName= $request->signature->getClientOriginalName();

        // $request->signature->storeAs('public/',$imageName);

    }

    public function create(Request $request)
    {
        return view('applicantPage');
    }

    public function search(Request $request)
    {
        $info = $request->id;

        $cmdSearch=applicant::where('ctrlno', $info)
        ->orWhere('lname', $info)
        ->orWhere('prov', $info)
        ->orWhere('city', $info)
        ->orWhere('field', $info)
        ->orWhere('position', $info)
        ->get();
        if($cmdSearch->count()>0){
            return response()->json(['status'=>200,'data'=>$cmdSearch, 'msg'=>'Applicant found...']);
        }
        else{
            return response()->json(['status'=>500,'msg'=>'No Applicant found...']);
        }
    }

    public function getselected(Request $request)
    {
        $id = $request->id;

        $cmdSearch=applicant::where('ctrlno', $id)->get();
        if($cmdSearch->count()>0){
            return response()->json(['status'=>200, 'data'=>$cmdSearch, 'msg'=>'Applicant found...']);
        }
        else{
            return response()->json(['status'=>500,'msg'=>'No Applicant found...']);
        }
    }

    public function getdownload(Request $request)
    {

    }
}
