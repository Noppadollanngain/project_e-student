<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
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

    public function store_backend_username($id)
    {
        /*DB::table('users')
                    ->select('username')
                    ->orderBy('users.id','ASC')
                    ->get();
        /*$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/test-project-9d73f-firebase-adminsdk-brci2-d720a70bbf.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)
                                 ->withDatabaseUri('https://test-project-9d73f.firebaseio.com')
                                 ->create();
        $database = $firebase->getDatabase();
        $newPost = $database->getReference('Users/Username/'.$id)
                             ->set([
                                'username' => $doc1,
                                'password' => $doc2,
                             ]);*/
    }
}
