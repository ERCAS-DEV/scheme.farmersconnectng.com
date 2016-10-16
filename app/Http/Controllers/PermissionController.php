<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use Bican\Roles\Models\Permission;

class PermissionController extends Controller
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
        //list permission
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
        $permissions = Permission::all();
        $title = "Farmers Connect: Permission Page";
        return view('permission.index', compact('title','permissions','scheme'));
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
    public function store(PermissionRequest $request)
    {
        //creating permission
        
/*        $slug = array();
        foreach ($request->input('slug') as $value) {
           
            $slug[$value] = true;
        }
        $request['slug'] = $slug;
      */
        $permission = new Permission();
        $permUser = $permission->create($request->all());
        if ($permUser) {
            Session::flash('message', 'Success! You have Created Permission');
            return Redirect::back();
        }else{
            Session::flash('warning', 'Failed! Unable to create permission');
            return Redirect::back();
        }

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
        $delPermission = Permission::find($id);
        if ($delPermission->delete()) {
            Session::flash('message', 'Success! You have deleted Permission');
            return Redirect::back();
        }else{
            Session::flash('warning', 'Failed! Unable to deleted Permission');
            return Redirect::back();
        }
    }
}
