<?php

namespace MeRRS\Http\Controllers\Member;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MeRRS\Home;
use MeRRS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MeRRS\RequestPage;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Home::all();
        return view('member.dashboard',compact('data'));
    }

//    public static function counting()
//    {
//        $userId = Auth::user()->id;
//        //$results = RequestPage::where('user_id',$userId)->get();
//        $results = DB::table('request')//->select('room')->count();
//        ->select(DB::raw('count(*) as status'))
//            ->where('user_id',$userId)
//            ->where('status', '=', 0)
//            ->whereNull('deleted_at')
//            ->get();
//        return view('admin.dashboard',compact('results'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('member.dashboard');
    }

    /**
     * Store a newly created resource in storage.
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
       // $data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        //$data->status = $request->status;
        Auth::user()->requests()->save($data);
        //$data->save();
        return redirect()->route('member.dashboard.index')->with('alert-success','Request has been submitted!');
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
        return redirect()->route('member.dashboard.index')->with('alert-success','Change has been done successfully!');
    }

}
