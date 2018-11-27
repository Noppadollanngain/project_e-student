<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;

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

        return view('admin.dashboard.list',[
            'list' => $list_Admin,
            'count' => $list_Admin_count
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
}
