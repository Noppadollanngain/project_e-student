<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\AdminRegisRequest;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function showAdmin(){
        $list_Admin = $users = DB::table('admins')
                        ->join('possition', 'admins.possition', '=', 'possition.id')
                        ->select('admins.id','admins.fname','admins.lname', 'possition.name')
                        ->paginate(15);
        $list_Admin_count = Admin::count();
        $num = 1;

        return view('admin.dashboard.list',[
            'list' => $list_Admin,
            'count' => $list_Admin_count,
            'num' => $num
        ]);
    }

    public function create(){
        $list_possition = DB::table('possition')
                            ->select('possition.name','possition.id')
                            ->get();
        return view('admin.dashboard.regis-admin',[
            'possition' => $list_possition
        ]);
    }

    public function Addadmin(AdminRegisRequest $request){

        $person = Admin::where('username', '=',$request->username)->first();

        if($person != null){
            $request->session()->flash('confirmation', 'Username ถูกใช้แล้ว');
            return redirect()->action('AdminController@create');
        }
        else if($request->password!=$request->password_confirmation){
            $request->session()->flash('confirmation', 'รหัสผ่านไม่ตรงกัน');
            return redirect()->action('AdminController@create');
        }
        else{
            $admin = new Admin();
            $admin->fname = $request->fname;
            $admin->lname = $request->lname;
            $admin->email = $request->mail;
            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->possition = $request->possition;
            $admin->save();
            return redirect()->action('AdminController@showAdmin');
        }
    }
}
