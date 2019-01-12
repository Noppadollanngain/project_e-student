<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Image;
use File;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function NewShowList(){
        $data = DB::table('news')
                ->join('typestudent', 'typestudent.id', '=', 'news.typestudent')
                ->leftJoin('admins as admins_create', 'admins_create.id', '=', 'news.admin_create')
                ->leftJoin('admins as admins_send', 'admins_send.id', '=', 'news.admin_send')
                ->select('news.*', 'typestudent.typename','admins_create.fname as getF','admins_create.lname as getL','admins_send.fname as setF','admins_send.lname as setL')
                ->paginate(10);
        return view('admin.dashboard.new-show',[
            'data' => $data
        ]);
    }

    public function formcreatenew(){
        return view('admin.dashboard.new-create');
    }

    public function createnew(Request $request){
        dd($request);
    }
}
