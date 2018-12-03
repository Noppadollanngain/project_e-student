<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function list1(){
        $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.fname','users.lname', 'typestudent.typename')
                ->where('documentdata.typestudent','=',1)
                ->paginate(15);
                //dd($list);
        return view('admin.dashboard.document-list',[
            'list' =>  $list,
            'num' => 1
        ]);
    }

    public function list2(){
        $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.fname','users.lname', 'typestudent.typename')
                ->where('documentdata.typestudent','=',2)
                ->paginate(15);
                //dd($list);
        return view('admin.dashboard.document-list',[
            'list' =>  $list,
            'num' => 1
        ]);
    }

    public function list3(){
        $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.fname','users.lname', 'typestudent.typename')
                ->where('documentdata.typestudent','=',3)
                ->paginate(15);
                //dd($list);
        return view('admin.dashboard.document-list',[
            'list' =>  $list,
            'num' => 1
        ]);
    }

    public function list4(){
        $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.fname','users.lname', 'typestudent.typename')
                ->where('documentdata.typestudent','=',4)
                ->paginate(15);
                //dd($list);
        return view('admin.dashboard.document-list',[
            'list' =>  $list,
            'num' => 1
        ]);
    }

    public function view_user($id){
        $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->leftJoin('admins as adminsget', 'adminsget.id', '=', 'documentdata.adminget')
                ->leftJoin('admins as adminsset', 'adminsset.id', '=', 'documentdata.adminset')
                ->select('documentdata.*','users.*', 'typestudent.typename','adminsget.fname as getF','adminsget.lname as getL','adminsset.fname as setF','adminsset.lname as setL')
                ->where('documentdata.student','=',$id)
                ->get();
        return view('admin.dashboard.view-user',[
            'dataget' => $list
        ]);
    }

}
