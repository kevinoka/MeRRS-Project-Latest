<?php

namespace MeRRS\Http\Controllers\Member;

use Illuminate\Support\Facades\Auth;
use MeRRS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use MeRRS\RequestPage;

class RequestPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $allrequests = RequestPage::where('user_id',$userId)->get();
        return view('member.requestpage', compact('allrequests'));

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
        return view('member.edit_request',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
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
        $data = RequestPage::where('id',$id)->first();
        $data->start = $request->start;
        $data->end = $request->end;
        $data->title = $request->title;
        $data->room = $request->room;
        $data->personNum = $request->personNum;
        //$data->frequency = $request->frequency;
        $data->description = $request->description;
        $data->requestedBy = $request->requestedBy;
        //$data->status = $request->status;
        Auth::user()->requests()->save($data);
        return redirect()->route('member.requestpage.index')->with('alert-success','Change has been done successfully!');
    }


    public function pending()
    {
        $data = RequestPage::where('status',0)->get();
        return view('member.requestpage',compact('data'));
    }

    public function approval($id)
    {
        $data = RequestPage::find($id);
        if($data->status == 0)
        {
            $data->status = 1;
            $data->save();
        } else {
            Session::get('info');
        }
        return redirect()->back()->with('alert-success','Request has been approved');
    }

    public function declines($id)
    {
        $data = RequestPage::find($id);
        if($data->status == 0)
        {
            $data->status = 2;
            $data->save();
        } else {
            Session::get('info');
        }
        return redirect()->back()->with('alert-danger','Request has been declined');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //unused
    public function destroy($id)
    {
        //
        $data = RequestPage::where('id',$id)->first();
        $data->forceDelete();
        return redirect()->route('member.requestpage.index')->with('alert-success','Request has been deleted!');
    }

    //soft delete
    public function deletos($id)
    {
    	$data = RequestPage::find($id);
    	$data->delete();

    	return redirect()->back()->with('alert-danger','Request has been deleted!');
    }

}
