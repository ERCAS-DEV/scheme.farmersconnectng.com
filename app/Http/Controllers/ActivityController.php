<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Auth;
use App\Scheme;
use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::with('activities')->find($user);
        $activity = Activity::all();
        $title = "Farmers Connect: Activity Page";
        return view('activity.index',compact('title','activity','scheme'));
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
    public function store(Request $request)
    {
        //
        $activity = Activity::where('name',$request->input('name'))->first();
        if ($activity) {
            Session::flash('warning','Failed! Activity already exist');
            return Redirect::back();
        }
        $request['key'] = str_random(20);
        $activity_1 = Activity::create($request->all());

        //attaching activities
        $scheme = Scheme::find(Auth::user()->scheme_id);
        $scheme->activities()->attach($activity_1->id);
        $scheme->save();

        Session::flash('message','Successful! You have add an activity');
        return Redirect::back();
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
    public function update(Request $request, $id)
    {
        //

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
        $activity = Activity::where('key',$id)->first();
        if ($activity) {
            $activity->delete($id);
            Session::flash('message','Successful! Record deleted.');
            return Redirect::back();
        }
        Session::flash('warning','Failed! Unable to delete a record.');
        return Redirect::back();
    }
}
