<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Crypt;
use Hash;
use App\News;
use Carbon\Carbon;
use Auth;

class FirebaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create($id,$doc1,$doc2,$doc3,$doc4,$doc5,$type)
    {
        if($doc1==NULL){
            $doc1 = 0;
        }
        if($doc2==NULL){
            $doc2 = 0;
        }
        if($doc3==NULL){
            $doc3 = 0;
        }
        if($doc4==NULL){
            $doc4 = 0;
        }
        if($doc5==NULL){
            $doc5 = 0;
        }
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/test-project-9d73f-firebase-adminsdk-brci2-d720a70bbf.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
                                 ->withDatabaseUri('https://test-project-9d73f.firebaseio.com')
                                 ->create();
        $database = $firebase->getDatabase();
        $newPost = $database->getReference('Users/Document/'.$id)
                             ->set([
                                'doc1' => $doc1,
                                'doc2' => $doc2,
                                'doc3' => $doc3,
                                'doc4' => $doc4,
                                'doc5' => $doc5,
                                'status' => false,
                                'type'=> $type
                             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update($id,$doc1,$doc2,$doc3,$doc4,$doc5,$type)
    {
        if($doc1==NULL){
            $doc1 = 0;
        }
        if($doc2==NULL){
            $doc2 = 0;
        }
        if($doc3==NULL){
            $doc3 = 0;
        }
        if($doc4==NULL){
            $doc4 = 0;
        }
        if($doc5==NULL){
            $doc5 = 0;
        }

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/test-project-9d73f-firebase-adminsdk-brci2-d720a70bbf.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
                                 ->withDatabaseUri('https://test-project-9d73f.firebaseio.com')
                                 ->create();
        $database = $firebase->getDatabase();
        $newPost = $database->getReference('Users/Document/'.$id)
                             ->set([
                                'doc1' => $doc1,
                                'doc2' => $doc2,
                                'doc3' => $doc3,
                                'doc4' => $doc4,
                                'doc5' => $doc5,
                                'status' => false,
                                'type'=> $type
                             ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function store_backend_username()
    {

    }

    public function createNews($id){
        $update = News::find($id);
        $update->send_message = Carbon::now()->toDateTimeString();
        $update->status = 1;
        $update->admin_send = Auth::user()->id;
        $update->save();

        $data = DB::table('news')
                    ->where('news.id', '=', $id)
                    ->get();
        //dd($data);
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/test-project-9d73f-firebase-adminsdk-brci2-d720a70bbf.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
                                 ->withDatabaseUri('https://test-project-9d73f.firebaseio.com')
                                 ->create();
        $database = $firebase->getDatabase();

        foreach($data as $dataset){
            $newPost = $database->getReference('Users/News/'.$id)
                             ->set([
                                'headerNew' => $dataset->header,
                                'message' => $dataset->message,
                                'image' => $dataset->image,
                                'type' => $dataset->typestudent
                             ]);
        }
        session()->flash('statuscreate', 'ข้อความถูกส่งไปเรียบร้อย');
        return redirect()->route('admin.news');
    }
}
