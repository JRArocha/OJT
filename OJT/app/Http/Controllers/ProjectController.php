<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\applicant;
use Public\image;
use App\Models\User;
use App\Models\UserLog;
use DB;
use Response;
use download;


class ProjectController extends Controller
{
    public function regadmin(Request $request)
    {

        $values=
        [
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>hash::make($request->password),
            'confirmPassword'=>hash::make($request->password1)
        ];

        if($request->password==$request->password1)
        {
            $cmdAdmin = UserLog::create($values);
            return response()->json(['status'=>200,'msg'=>'Details has been successfully registered.']);
        }
        else
        {
            return response()->json(['status'=>201,'msg'=>'Password Does not match']);
        }
    }

    public function cadmin(Request $request)
    {
        return view('trial.createaccount');
    }

    public function logout(Request $request)
    {
        if(session()->has('UID')){
            session()->pull('UID');
            return redirect('/login');
        }
    }

    public function fetch_login(Request $request)
    {
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
                $request->session()->put('name', $query->name);
                return redirect('/');
            }
            else
            {
                return response()->json(['status'=>201,'msg'=>"Invalid Login Account!"]);
            }
        }
    }

    public function getloguser(Request $request)
    {
        $id=session()->get('UID');
        $query = DB::table('admins')
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
        $cmdSelect=applicant::orderBy('ctrlno', 'DESC')->get();
        $total=$cmdSelect->count();

        return response()->json(['status'=>200,'data'=>$cmdSelect, 'total'=>$total]);
    }

    public function sort(Request $request)
    {
        $descVal=$request->descVal;

        $cmdSort=applicant::orderBy('application', $descVal)->get();

        if($cmdSort){
            return response()->json(['status'=>200,'data'=>$cmdSort]);
        }
        else{
            return response()->json(['status'=>201,'msg'=>'Error Sorting...']);
        }
    }

    public function store(Request $request)
    {
        $imageName= $request->resume->getClientOriginalName();
        $id=session()->get('UID');
        $assessor = DB::table('admins')->where('id',$id)->first();
        $status='Pending';

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
            'assessor'=>$assessor->name,
            'resume'=>$imageName,
            'status'=>$status,
        ];
        $request->resume->move(base_path('public/image/'),$imageName);
        $cmdCreate=applicant::create($values);

        if($cmdCreate){
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
        ->orWhere('status', $info)
        ->orWhere('assessor', $info)
        ->get();

        $total=$cmdSearch->count();
        if($cmdSearch->count()>0){
            return response()->json(['status'=>200,'data'=>$cmdSearch, 'count'=>$total,'msg'=>'Applicant found...']);
        }
        else{
            return response()->json(['status'=>500,'msg'=>'No Applicant found...']);
        }
    }

    public function getselected(Request $request)
    {
        $id = $request->id;
        $picturePath=0;

        $cmdSearch=applicant::where('ctrlno', $id)->first();

        $picturePath=asset('image/'.$cmdSearch->resume);

        if($cmdSearch->count()>0){
            return response()->json(['status'=>200, 'data'=>$cmdSearch, 'msg'=>'Applicant found...','picturePath'=>$picturePath]);
        }
        else{
            return response()->json(['status'=>500,'msg'=>'No Applicant found...']);
        }
    }

    public function print(Request $request)
    {
        $id = $request->id;
        $values=[
            'status'=>'Success'
        ];

        $cmdPrint=applicant::where('ctrlno', $id)->update($values);
        if($cmdPrint){
            return response()->json(['status'=>200, 'msg'=>'Print Success']);
        }else{
            return response()->json(['status'=>201, 'msg'=>'Error Printing']);
        }
    }
}
