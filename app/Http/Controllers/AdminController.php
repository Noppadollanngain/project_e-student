<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\AdminRegisRequest;
use Hash;
use Auth;
use Image;
use File;

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
        $list_Admin  = DB::table('admins')
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
                            ->orderBy('id','ASC')
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
            if ($request->hasFile('image')) {
                $filename = str_random(10) . '_320x450.' . $request->file('image')->getClientOriginalExtension();
                Image::make($request->file('image'))->resize(320,450)->save(public_path() . '/images/Profile/' . $filename);
            }
            $admin->image = $filename;
            $admin->save();
            return redirect()->action('AdminController@showAdmin');
        }
    }

    public function profile(){
        $admin = DB::table('admins')
                    ->join('possition', 'admins.possition', '=', 'possition.id')
                    ->where('admins.id', '=', Auth::user()->id)
                    ->select('admins.*', 'possition.name')
                    ->get();
        return view('admin.dashboard.profile',[
            'admin' => $admin
        ]);
    }

    public function viewprofile($id){
        $admin = DB::table('admins')
                    ->join('possition', 'admins.possition', '=', 'possition.id')
                    ->where('admins.id', '=', $id)
                    ->select('admins.*', 'possition.name')
                    ->get();
        return view('admin.dashboard.view-profile',[
            'admin' => $admin
        ]);
    }

    public function destroy($id){
        $admin_del = Admin::find($id);
        if ($admin_del->image != 'nopic.jpg') {
            File::delete(public_path() . '\\images\\Profile\\' . $admin_del->image);
        }
        $admin_del->delete();
        return redirect()->action('AdminController@showAdmin');
    }

    public function edit(){
        $admin = DB::table('admins')
                    ->join('possition', 'admins.possition', '=', 'possition.id')
                    ->where('admins.id', '=', Auth::user()->id)
                    ->select('admins.*', 'possition.name')
                    ->get();
        $list_possition = DB::table('possition')
                    ->select('possition.name','possition.id')
                    ->orderBy('id','ASC')
                    ->get();

        return view('admin.dashboard.edit-profile',[
            'admin' => $admin,
            'possition' => $list_possition
        ]);
    }

    public function profileupdate(Request $request,$id){
        $admin = Admin::find($id);
        $admin->fname = $request->fname;
        $admin->lname = $request->lname;
        $admin->email = $request->mail;

        if(Auth::user()->possition==1){
            $admin->possition = $request->possition;
        }

        if ($request->hasFile('image')) {
            File::delete(public_path() . '\\images\\Profile\\' . $admin->image);
            $filename = str_random(10) . '_320x450.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(320,450)->save(public_path() . '/images/Profile/' . $filename);
            $admin->image = $filename;
        }

        $admin->save();

        $request->session()->flash('statusupdate', 'ข้อมูลถูกอัพเดทแล้ว');
        return redirect()->action('AdminController@edit');
    }
}
