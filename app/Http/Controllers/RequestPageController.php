<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RequestPage;

class RequestPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = RequestPage::all();
        return view('requestpage',compact('data'));

        //$data = DB::select('select * from request');
        //return view('requestpage',['requestpage'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('new_request');
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
        $data = new RequestPage();
        $data->schedule = $request->schedule;
        $data->title = $request->title;
        $data->room = $request->room;
        $data->personNum = $request->personNum;
        $data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        $data->action = $request->action;
        $data->save();
        return redirect()->route('requestpage.index')->with('alert-success','Request has been submitted!');
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
        $data = RequestPage::where('id',$id)->get();

        return view('edit_request',compact('data'));
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
        //
        $data = RequestPage::where('id',$id)->first();
        $data->schedule = $request->schedule;
        $data->title = $request->title;
        $data->room = $request->room;
        $data->personNum = $request->personNum;
        $data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        $data->action = $request->action;
        $data->save();
        return redirect()->route('requestpage.index')->with('alert-success','Change has been done succesfully!');
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
        $data = RequestPage::where('id',$id)->first();
        $data->delete();
        return redirect()->route('requestpage.index')->with('alert-success','Request has been deleted!');
    }
}