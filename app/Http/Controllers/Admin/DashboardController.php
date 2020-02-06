<?php

namespace MeRRS\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use MeRRS\Home;
use MeRRS\Http\Controllers\Controller;
use MeRRS\RequestPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $results = DB::table('request')//->select('room')->count();
        ->select(DB::raw('count(*) as room'))
            ->where('room', '<>',  1)
            ->get();
        return view('admin.dashboard',compact('results'));
    }

//    public function hitung()
//    {
//        $users = DB::table('users')
//            ->select(DB::raw('count(*) as room'))
//            ->where('room', 'Small Meeting Room', 1)
//            ->groupBy('room')
//            ->get();
//        return view('admin.dashboard',compact('users'));
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
            'title' => 'required|max:255',
            'room' => 'required',
            'personNum' => 'required|numeric',
            'frequency' => 'required|max:255',
            'description' => 'required|max:255',
            'requestedBy' => 'required',
        ]);
        //
        $data = new Home();
        $data->start = $request->start;
        $data->end = $request->end;
        $data->title = $request->title;
        $data->room = $request->room;
        $data->personNum = $request->personNum;
        $data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        //$data->status = $request->status;
        //$data->save();
        Auth::user()->requests()->save($data);
        return redirect()->route('admin.dashboard.index')->with('alert-success','Request has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//    public function show($id)
//    {
//        $blog = TbBlog::find($id);
//        return view('site.show',compact('admin.dashboard'))->renderSections()['content'];
//    }

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
        $data->start = $request->start;
        $data->end = $request->end;
        $data->title = $request->title;
        $data->room = $request->room;
        $data->personNum = $request->personNum;
        $data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.dashboard.index')->with('alert-success','Change has been done successfully!');
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
        return redirect()->route('admin-dashboard.index')->with('alert-success','Request has been deleted!');
    }
}
