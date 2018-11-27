<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Possition;
use App\Http\Requests\PossitionRequest;

class PossitionController extends Controller
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
        $possition = Possition::paginate(5);
        $possition_count = Possition::count();

        return view('admin.dashboard.list-possition',[
            'possition' => $possition,
            'count' => $possition_count,
            'row' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PossitionRequest $request)
    {
        $possition = new Possition();
        $possition->name = $request->title;
        $possition->save();
        return redirect()->action('PossitionController@index');
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
        $data = Possition::findOrFail($id);
        return view('admin.dashboard.edit', ['data_get' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Possition::find($id);
        $update->name = $request->title;
        $update->save();
        return redirect()->action('PossitionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Possition::destroy($id);
        return redirect()->action('PossitionController@index');
    }
}
