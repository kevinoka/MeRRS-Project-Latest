<?php

namespace MeRRS\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use MeRRS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use MeRRS\Notifications\UserApprovedRequest;
use MeRRS\Notifications\UserDeclinedRequest;
use MeRRS\RequestPage;
use MeRRS\Subscriber;

class RequestPageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $allrequests = RequestPage::orderBy('id', 'ASC')->get();
        return view('admin.requestpage',compact('allrequests'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $data = RequestPage::where('id',$id)->get();
        return view('admin.edit_request',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
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
        //$data->save();
        return redirect()->route('admin.requestpage.index')->with('alert-success','Change has been done successfully!');
    }

    public function pending()
    {
        $data = RequestPage::where('status',0)->get();
        return view('admin.requestpage',compact('data'));
    }

    public function approval($id)
    {
        $data = RequestPage::find($id);
        if($data->status == 0)
        {
            $data->status = 1;
            $data->save();
            //For sending an email
            $data->user->notify(new UserApprovedRequest($data));
            //For sending an email to Aswin
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new UserApprovedRequest($data));
            }
        } else {
            Session::get('info');
        }
        return redirect()->back()->with('alert-success','Request has been approved');

    }

    public function declination($id)
    {
        $data = RequestPage::find($id);
        if($data->status == 0)
        {
            $data->status = 2;
            $data->save();
            //For sending an email
            $data->user->notify(new UserDeclinedRequest($data));
            //For sending an email to Aswin
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new UserDeclinedRequest($data));
            }
        } else {
            Session::get('info');
        }
        return redirect()->back()->with('alert-danger','Request has been declined');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    //unused
    public function destroy($id)
    {
        //
        $data = RequestPage::where('id',$id)->first();
        if($data->status == 0)
        {
            $data->status = 4;
            $data->forceDelete();
        } else {
            $data->forceDelete();
        }
        return redirect()->route('requestpage.index')->with('alert-success','Request has been deleted!');
    }

    //soft delete
    public function deletos($id)
    {
    	$data = RequestPage::find($id);
    	$data->delete();

    	return redirect()->back()->with('alert-danger','Request has been deleted!');
    }

}
