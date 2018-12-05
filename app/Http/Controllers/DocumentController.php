<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Documents;
use Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function search_form_doc($id){
        return view('admin.dashboard.form-search-doc',[
            'type' => $id
        ]);
    }

    public function search_word_doc(Request $request,$id){
        if($request->std_id){
            $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.estd_id','users.fname','users.lname','users.username', 'typestudent.typename')
                ->where('documentdata.typestudent','=',$id)
                ->where('users.username', 'like', '%' .$request->std_id. '%')
                ->paginate(15);
        }
        if($request->fname){
            $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.estd_id','users.fname','users.lname','users.username', 'typestudent.typename')
                ->where('documentdata.typestudent','=',$id)
                ->where('users.fname', 'like', '%' .$request->fname. '%')
                ->paginate(15);
        }
        if($request->lname){
            $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.estd_id','users.fname','users.lname','users.username', 'typestudent.typename')
                ->where('documentdata.typestudent','=',$id)
                ->where('users.lname', 'like', '%' .$request->lname. '%')
                ->paginate(15);
        }
        if($request->estd_id){
            $list = DB::table('documentdata')
                ->join('users', 'documentdata.student', '=', 'users.id')
                ->join('typestudent', 'typestudent.id', '=', 'documentdata.typestudent')
                ->select('documentdata.*','users.estd_id','users.fname','users.lname','users.username', 'typestudent.typename')
                ->where('documentdata.typestudent','=',$id)
                ->where('users.estd_id', 'like', '%' .$request->estd_id. '%')
                ->paginate(15);
        }
        if($request->std_id==null&&$request->fname==null&&$request->lname==null&&$request->estd_id==null){
            $request->session()->flash('status_search_doc', 'ไม่ได้ระบุคำค้นหา');
            return back();
        }

        return view('admin.dashboard.document-list',[
            'list' =>  $list,
            'num' => 1,
            'type' => $id
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

    public function search_form(){
        return view('admin.dashboard.form-search');
    }

    public function search_word(Request $request){
        if($request->std_id){
            $list = DB::table('users')
                    ->where('users.username', 'like', '%' .$request->std_id. '%')
                    ->orderBy('users.id','ASC')
                    ->paginate(15);
        }
        if($request->fname){
            $list = DB::table('users')
                    ->where('users.fname', 'like', '%' .$request->fname. '%')
                    ->orderBy('users.id','ASC')
                    ->paginate(15);
        }
        if($request->lname){
            $list = DB::table('users')
                    ->where('users.lname', 'like', '%' .$request->lname. '%')
                    ->orderBy('users.id','ASC')
                    ->paginate(15);
        }
        if($request->estd_id){
            $list = DB::table('users')
                    ->where('users.estd_id', 'like', '%' .$request->estd_id. '%')
                    ->orderBy('users.id','ASC')
                    ->paginate(15);
        }
        if($request->std_id==null&&$request->fname==null&&$request->lname==null&&$request->estd_id==null){
            $request->session()->flash('status_search_doc', 'ไม่ได้ระบุคำค้นหา');
            return back();
        }

        return view('admin.dashboard.document-manage',[
            'list' =>  $list,
        ]);
    }

    public static function bool_return($id){
        $data = DB::table('documentdata')
            ->where('student','=',$id)
            ->get();
        $data_get = $data->count();
        //dd($data);
        if($data_get!=0){
            return true;
        }elseif($data_get==0){
            return false;
        }

    }

    public function create_document($id){
        $data = DB::table('users')
                    ->where('users.id','=',$id)
                    ->get();
        $list_possition = DB::table('typestudent')
                    ->select('typestudent.typename','typestudent.id')
                    ->orderBy('id','ASC')
                    ->get();
        return view('admin.dashboard.create-doc',[
            'data' => $data,
            'id' => $id,
            'possition' => $list_possition
        ]);
    }

    public function update_document($id){
        return view('admin.dashboard.update-doc');
    }

    public function document_create(Request $request,$id){

        if($request->type==0){
            $request->session()->flash('status_search_doc', 'ไม่ได้ระบุประเภท');
            return back();
        }

        /*if($request->doc1==null){
            $request->$doc1 = 0;
        }
        if($request->doc2==null){
            $request->$doc2 = 0;
        }
        if($request->doc13==null){
            $request->$doc3 = 0;
        }
        if($request->doc4==null){
            $request->$doc4 = 0;
        }
        if($request->doc5==null){
            $request->$doc5 = 0;
        }*/

        $new = new Documents();
        $new->student = $id;
        $new->typestudent = $request->type;
        $new->adminget = Auth::user()->id;
        $new->doc1 = $request->doc1;
        $new->doc2 = $request->doc2;
        $new->doc3 = $request->doc3;
        $new->doc4 = $request->doc4;
        $new->doc5 = $request->doc5;

        $new->save();
        return redirect()->route('admin.view-user',[
            'id' => $id
        ]);
    }

}
