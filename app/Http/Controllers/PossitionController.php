<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Possition;

class PossitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showListPos(){
        $possition = Possition::all();
        $possition_count = Possition::count();

        return view('admin.dashboard.list-possition',[
            'possition' => $possition,
            'count' => $possition_count
        ]);
    }
}
