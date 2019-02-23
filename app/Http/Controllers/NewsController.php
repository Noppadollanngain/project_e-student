<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use Auth;
use Image;
use File;
use Carbon\Carbon;

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
                ->orderBy('news.updated_at','desc')
                ->paginate(10);
        return view('admin.dashboard.new-show',[
            'data' => $data,
        ]);
    }

    public function formcreatenew(){
        $list_possition = DB::table('typestudent')
        ->select('typestudent.typename','typestudent.id')
        ->orderBy('id','ASC')
        ->get();
        return view('admin.dashboard.new-create',[
            'possition' => $list_possition
        ]);
    }

    public function createnew(Request $request){
        $data = new News;
        $data->header = $request->header;
        $data->message = $request->message;
        $data->status = 0;
        $data->typestudent = $request->type;
        $data->admin_create = Auth::user()->id;

        if ($request->hasFile('image')&&$request->header!=NULL&&$request->message&&$request->type!=0) {
           $filename = str_random(10) . '_450x450.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(450,450)->save(public_path() . '/images/News/' . $filename);
            $data->image = $filename;
            $data->save();
            $request->session()->flash('statuscreate', 'ข้อมูลถูกอัพเดทแล้ว');
            return redirect()->route('admin.news');

        }else{
            $request->session()->flash('statuscreate', 'เกิดข้อผิดพลาด');
            return redirect()->route('admin.news.create');
        }
    }

    public function edit($id){
        $data = DB::table('news')
            ->join('typestudent', 'typestudent.id', '=', 'news.typestudent')
            ->leftJoin('admins as admins_create', 'admins_create.id', '=', 'news.admin_create')
            ->leftJoin('admins as admins_send', 'admins_send.id', '=', 'news.admin_send')
            ->select('news.*', 'typestudent.typename','admins_create.fname as getF','admins_create.lname as getL','admins_send.fname as setF','admins_send.lname as setL')
            ->where('news.id','=',$id)
            ->get();
        $list_possition = DB::table('typestudent')
            ->select('typestudent.typename','typestudent.id')
            ->orderBy('id','ASC')
            ->get();
        return view('admin.dashboard.edit-new',[
            'data' => $data,
            'possition' => $list_possition
        ]);
    }

    public function updatenews(Request $request,$id){
        $data = News::find($id);
        $data->header = $request->header;
        $data->message = $request->message;
        $data->status = 2;
        $data->typestudent = $request->type;
        $data->admin_create = Auth::user()->id;

        if ($request->hasFile('image')) {
            File::delete(public_path() . '\\images\\News\\' . $data->image);
            $filename = str_random(10) . '_450x450.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(450,450)->save(public_path() . '/images/News/' . $filename);
            $data->image = $filename;
        }

        if($request->header!=NULL&&$request->message&&$request->type!=0){
            $data->save();
            $request->session()->flash('statuscreate', 'ข้อมูลถูกอัพเดทแล้ว');
            return redirect()->route('admin.news');
        }
        else{
            $request->session()->flash('statuscreate', 'เกิดข้อผิดพลาด');
            return redirect()->route('admin.news.edit',[
                'id' => $id
            ]);
        }

    }
}
