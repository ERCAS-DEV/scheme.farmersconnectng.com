<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Hash;
use Input;
use Redirect;
use Session;
use App\User;
use App\Worker;
use App\Farmer;
use App\Scheme;
use App\Http\Requests;
use App\Http\Requests\WorkerRequest;
use Bican\Roles\Models\Role;
use App\Http\Controllers\Controller;

class WorkerController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => [
             'create','store','emailConfirm'
         ]]);

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
        $title = "Farmers Connect: Worker Page";
        return view('worker.index',compact('title','scheme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        //
        //check if email
        $check_worker = Worker::where('email',$request->input('email'))->first();
        if ($check_worker) {
            Session::flash('warning','Failed! Email already exist.');
            return Redirect::back();
        }
        //generate key
        $request['key'] = str_random(20);
        //generate password
        $password = str_random(6);
        $password_hash = Hash::make($password);
        $token = str_random(64);
        $request['token'] = $token;

        //insert into user table
        $user = $this->insertUser($request, $password_hash);
        //insert into workers table
        $worker = Worker::create($request->all());

        if ( ! $worker) {
          Session::flash('warning','Failed! Unable to create user');
          return Redirect::back();
        }
        
        if ($user) {
            //send email
            $this->sendMail($worker, $password, $token);
            Session::flash('message','Successful! Please check your email to activate your account.');
            return Redirect::back();
        }
        Session::flash('warning','Failed! Unable to register on the platform.');
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
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
        $title = 'Farmers Connect: Worker Details';
        $worker = Worker::where('key',$id)->first();
        //dd($farmer);
        if ($worker) {
               return view('worker.show',compact('title','worker','scheme'));
        }
        Session::flash('warning','Error! 404 Error.');
        return Redirect::back();
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
        echo "edit method";
        die;
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
        echo "update method";
        die;
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
 //
         $worker = Worker::where('id',$id)->first();
         if ($worker) {
             //File::delete(public_path().'/uploads/logo/'.$worker->logo,public_path().'/uploads/worker/'.$worker->image);
             /*unlink(public_path().'/uploads/logo'.$worker->logo);
             unlink(public_path().'/uploads/worker'.$worker->image);*/
             $worker->delete($id);

             $user = User::where('email',$worker->email)->first();
             $user->delete($user->id);

             Session::flash('message','Successful! You have deleted a Scheme');
             return Redirect::to('/work');
         }
         Session::flash('warning','Failed! Unable to delete Scheme');
         return Redirect::back();
    }

    //inserting into user table
    private function insertUser($request, $password_hash)
    {
        //check if email exist
        $check_user = User::where('email',$request->input('email'))->first();
        if ($check_user) {
            return false;
        }
        
        //create email
        $user = User::create([
            'name' => $request->input('first_name'),
            'email'=> $request->input('email'),
            'password' => $password_hash
            ]);
    //attaching role to user
        if ($user) {
            $role = Role::where('slug','worker')->first();
            $user->attachRole($role->id);

            return true;
        }
        return false;
    }

    //send email to worker
    private function sendMail($register, $password, $token) {
        Mail::send('email.success', ['user' => $register, 'password'=>$password, 'token'=>$token], function ($m) use ($register) {
            $m->from('oparannabueze@gmail.com', 'Farmers Connect Registration');
            $m->to($register->email, $register->first_name)->subject('Farmers Connect Registration Successful!');
        });
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Farmer::query())->with('crops')->addColumn('action', function ($id) {
            return '<a href="farmers/' . $id->id . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
            <button class="btn-delete btn btn-default" data-remote="/farmers/' . $id->id . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
        })->make(true);
    }

    //workers email confirmation
    public function emailConfirm($token, $id, $email)
    {

        //check if user exist
        $worker = Worker::where('token', $token)->first();
        //update user status

        if ($worker->token == $token && $worker->status == 'pending') {
            $worker->status = 'active';
            $worker->save();

            $user = User::where('email',$email)->first();
            $user->status = 'active';
            $user->save();

            Session::flash('message','Successful! Please login ');
            return Redirect::to('/admin');
        }
        Session::flash('warning','Failed! Token Mismatch ');
        return Redirect::to('/admin');
    }

    //suspending and activating worker
    public function action(Request $request)
    {
        $worker = Worker::find($request->input('id'));
        switch($request->input('status')){
            case 'active':
                $worker->status = 'suspend';
                $worker->save();
                break;
            default:
                $worker->status = 'active';
                $worker->save();


        }
    }
}
