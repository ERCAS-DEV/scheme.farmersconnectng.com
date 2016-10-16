<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use Session;
use Redirect;
use App\Group;
use App\Scheme;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
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
      
        //$groups = Group::with('schemes','farmers')->get();
        $scheme = Scheme::where('id',Auth::user()->scheme_id)->with('groups.farmers')->first();

        $title = "Farmers Connect: Group Farmers Page";
        return view('group.index',compact('title','scheme'));
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
        //validate request
        $validator = Validator::make($request->all(),['group_name'=>'required']);
        if ($validator->fails()) {
            Session::flash('warning','Failed! enter group name');
            return Redirect::back();
        }

        //check if group name exist in scheme
        $scheme = Scheme::find(Auth::user()->scheme_id);
        if ($scheme) {
            foreach ($scheme->groups as $group) {
                if ($group->group_name == $request->input('group_name')) {
                    Session::flash('warning','Failed! Group name exist');
                    return Redirect::back();

                }
               
            }
        }

        //Generate random number and inserting group
        $request['key'] = str_random(20);
        if (!$group = Group::create($request->all())) {
            Session::flash('warning','Failed! Unable to create group');
            return Redirect::back();
        }

        //Attaching scheme to group
        $group->schemes()->attach(Auth::user()->scheme_id);
        $group->save();
        Session::flash('message','Successfull! Group created.');
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
    }
}
