<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ApiController extends Controller
{
    public function Login($username,$password){
        $data1 = User::where('username','=',$username)->get();
        $data2 = User::where('email','=',$username)->get();

        $data3 = User::where('username','=',$username)->where('password_firebase','=',$password)->get();
        $data4 = User::where('email','=',$username)->where('password_firebase','=',$password)->get();
        //dd($data4);
        if($data1->count()==0&&$data2->count()==0){
           return [
            "datalogin" => [
                "email" => 'username error',
                "password" => '',
                "status" => false
            ]
           ];
        }elseif($data3->count()==0&&$data4->count()==0){
            return [
                "datalogin" => [
                    "email" => '',
                    "password" => 'password error',
                    "status" => false
                ]
            ];
        }elseif($data3->count()>0||$data4->count()>0){
            if($data3->count()>0){
                foreach ($data3 as $datashow) {
                    # code...
                }
            }
            elseif($data4->count()>0){
                foreach ($data4 as $datashow) {
                    # code...
                }
            }
            return [
                "datalogin" => [
                    "email" => $username,
                    "password" => $password,
                    "status" => true
                ],
                "datauser" => [
                    "fname" => $datashow->fname,
                    "lname" => $datashow->lname,
                ]

            ];
        }
    }
}
