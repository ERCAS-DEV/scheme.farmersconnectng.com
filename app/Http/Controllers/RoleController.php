<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RoleController extends Controller
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
        $scheme = Scheme::find($user);
        $permissions = Permission::all();
        $roles = Role::with('permissions')->paginate(13);
        $title = "Farmers Connect: Role Page";
        return view('role.index',compact('title', 'permissions','roles','scheme'));
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
    public function store(RoleRequest $request)
    {
        //

        $roles = Role::all();
        if ($roles) {
            foreach ($roles as $value) {
               if ($value['name'] == $request->input('name')) {
                 Session::flash('warning', 'Failed! Role already exist');
                 return Redirect::back();  
               }
            }
        }
        //dd($request->input('permission'));
        if (empty($request->input('permission'))) {
            Session::flash('warning', 'Failed! Select permission ');
            return Redirect::back();
        }
        $request['slug'] = str_replace(' ','',strtolower($request->input('name')));
        $role = Role::create($request->all());
        $role->attachPermission($request->input('permission'));

        Session::flash('message', 'Success! You have create a Role');
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
        $role = Role::find($id);
        if ($role->delete()) {
            Session::flash('message', 'Success! You have deleted a Role');
            return Redirect::back();
        }else{
            Session::flash('warning', 'Failed! Unable to delete a Role');
            return Redirect::back();
        }
    }
}
