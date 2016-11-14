<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Mail;
use Session;
use Redirect;
use Validator;
use App\Scheme;
use App\Worker;
use App\User;
use App\Group;
use App\Farmer;
use App\Dealer;
use App\Quotation;
use App\Http\Requests;
use App\Http\Requests\QuotationRequest;

class DashboardController extends Controller
{
	public function __construct()
	{

		$this->middleware('auth', ['except' => [
     'logout','billing'
     ]]);

	}
    //Display dashboard information

  public function index()
  {

    if (Auth::user()->scheme_id) {
      $scheme = Scheme::where('id',Auth::user()->scheme_id)->with('farmers','groups','dealers','workers')->first();
      $dealers = Dealer::all();
      $farmers = Farmer::all();
      $workers = Worker::all();
      $groups = Group::all();
      $title = "Farmers Connect: Dashboard Page";
      return view('dashboard.index', compact('title','scheme'));
    }else{
      return Redirect::to('admin/logout');
    }

  }

    //create an admin test user
  public function user(Request $request)
  {
   $request['password'] = Hash::make($request['password']);
   $register = User::create($request->all());
   Session::flash('message', 'You have sucessfully created an account. Please login to continue');
   return Redirect::back();
 }

    //grouping scheme farmer
 public function farmers_grouping(Request $request)
 {

        //checking if farmer is selected
  if (count($request->input('box')) < 1) {
    Session::flash('warning','Failed! Select farmers to assign');
    return Redirect::back();
  }

        //check if group request is empty
  if (!$request->input('group')) {
    Session::flash('warning','Failed! Select Group ');
    return Redirect::back();
  }

        //geting group details
  if ($group = Group::find($request->input('group'))) {
    $group->farmers()->attach($request->input('box'));
    $group->save();

            //updating farmers group coloum
    foreach ($request->input('box') as $value) {
      $farmer = Farmer::find($value);
      $farmer->group = 1;
      $farmer->save();
    }
    Session::flash('message','Successful! You have assaigned farmers to group');
    return Redirect::back();
  }

  Session::flash('warning','Failed! Unable to assaign farmers to Group');
  return Redirect::back();
}

    //assigning farmer to scheme
public function assign(Request $request)
{

        //select scheme
  $scheme = Scheme::where('id',Auth::user()->scheme_id)->first();
  if (count($request->input('box')) < 1) {
    Session::flash('warning','Failed! Select farmers to assign');
    return Redirect::back();
  }

        //check if group request is empty
  if (!$request->input('group')) {
    Session::flash('warning','Failed! Select Group ');
    return Redirect::back();
  }


  if ($scheme) {
            //geting group details
    $group = Group::find($request->input('group'));

            //checking if farmer has been assign to scheme already, if not attach farmer.
    $this->check_farmer_scheme($request, $scheme, $group);

    Session::flash('message','Successful! You have assaigned farmers to scheme');
    return Redirect::back();
  }
  Session::flash('warning','Failed! Unable to assaign farmers to scheme');
  return Redirect::back();
}    

    //assigning workers
public function assignWorker(Request $request)
{
/*        echo "<pre>";
        print_r(count($request->input('box')));
        die;*/
        
        if (count($request->input('box')) < 1) {

          Session::flash('warning','Failed! Select workers to assign');
          return Redirect::back();
        }

        $scheme = Scheme::where('id',$request->input('scheme'))->with('groups')->first();
        if ($scheme) {

            //attach worker
          $scheme->workers()->attach($request->input('box'));
          $scheme->save();
          foreach($request->input('box') as $value){
            $worker = Worker::where('id',$value)->first();

                //updating scheme id in users table
            $user = User::where('email', $worker->email)->first();

            $user->scheme_id = $scheme->id;
            $user->save();

                //updating the assign parameter
            $worker->update([
              'assign'=>1,
              'scheme_id'=>$scheme->id
              ]);

                //attaching worker to group
            $group = Group::find($request->input('group'));
            $group->workers()->attach($value);
            $group->save();
          }

          Session::flash('message','Successful! You have assaigned workers to scheme');
          return Redirect::back();
        }
        Session::flash('warning','Failed! Unable to assaign workers to scheme');
        return Redirect::back();
      }

    //assign dealer
      public function assignDealer(Request $request)
      {
 /*       echo "<pre>";
        print_r($request->all());
        die;*/
        $scheme = Scheme::where('id',$request->input('scheme'))->with('activities')->first();

        if (count($request->input('box')) < 1) {

          Session::flash('warning','Failed! Select dealer to assign');
          return Redirect::back();
        }

        //check if activity is selected
        if (count($request->input('activity')) < 1 && empty($request->input('activity'))) {
          Session::flash('warning','Failed! Select dealers activity');
          return Redirect::back();
        }
        if ($scheme) {
            //check if activity is in line with scheme activity
          $checkActivity = $this->checkActivity($scheme, $request);
          if ( ! $checkActivity) {
            Session::flash('warning','Failed! Activity selected is not assigned to scheme');
            return Redirect::back();
          }

            //check if dealer has been assigned before, if no
          $this->check_dealer_scheme($request, $scheme);

            //attach activity to dealer
          $this->attachActivity($request, $scheme);

          Session::flash('message','Successful! You have assaigned dealers to scheme');
          return Redirect::back();
        }
        Session::flash('warning','Failed! Unable to assaign dealers to scheme');
        return Redirect::back();

      }

    //Sending Quotation to Dealers
      public function quotation(QuotationRequest $request)
      {

      //check if dealer is dselected
        if (count($request->input('box')) < 1) {

          Session::flash('warning','Failed! Select dealer to send quootation');
          return Redirect::back();
        }

      //check if the activity is selected
        if ( ! $request->input('activity')) {
          Session::flash('warning','Failed! Select activity');
          return Redirect::back();
        }

        //generate random key
        $request['key'] = str_random(20);

        $scheme = Scheme::find($request->input('scheme'));
        
      //creating Quotation and attaching quotation to scheme
        $quotation = Quotation::create($request->all());

        if ($quotation) {
          $scheme->quotation()->save($quotation);


            //send quotation
          foreach($request->input('box') as $value){
            $dealer = Dealer::find($value);

            $this->sendMail($dealer, $scheme, $request);

          }
          Session::flash('message','Successful! Quotation sent to '.count($request->input('box')).' Dealer');
          return Redirect::to('quotation');
        }

        Session::flash('warning','Failed! Unable to send quotation');
        return Redirect::back();


      }

    //Displaying biling form for dealers
      public function billing($quotation_key, $scheme_key, $dealer_key)
      {
        $dealer = Dealer::where('key',$dealer_key)->first();
        $scheme = Scheme::where('key',$scheme_key)->first();
        $quotation = Quotation::where('key',$quotation_key)->first();
        if ($dealer && $scheme && $quotation) {

          return view('billing.index',compact('dealer','scheme','quotation'));
        }
        Session::flash('mistake','Error! 400 erorr occured');
        return view('billing.index');
      }

    //logout from the system
      public function logout()
      {
       if (Auth::check()) {
         Auth::logout();
         return redirect('/admin');
       } else {
         return redirect('/admin');
       }
     }

    //checking if activity is equal to scheme activity
     private function checkActivity($scheme, $request)
     {

      $scheme_activity = array();
      $activities = $scheme->activities->toArray();

      foreach ($activities as $value) {

            //$scheme_activity[] = $value['id'];
        array_push($scheme_activity, $value['id']);
      }

      foreach($request->input('activity') as $check){

        if (in_array($check, $scheme_activity)) {

         return true;
       }
     }
     return false;
   }

    //attaching activity to each dealer
   private function attachActivity($request, $scheme)
   {

    foreach ($request->input('box') as $value) {
      $dealer = Dealer::find($value);
      $dealer->activities()->attach($request->input('activity'));
      $dealer->save();

      //updating dealers table
      $dealer->assign = 1;
      $dealer->save();

      //attaching dealer to group
      $group = Group::find($request->input('group'));
      $group->dealers()->attach($value);
      $group->save();

      //updating dealers scheme id in user table
      $user = User::where('email',$dealer->company_email)->first();
      $user->scheme_id = $request->input('scheme');
      $user->save();


     //send billing email to dealer
     // $this->sendMail($dealer, $scheme);
    }
  }

    //send email to worker
  private function sendMail($register, $scheme, $param) {
    Mail::send('email.billing', ['dealer' => $register, 'scheme'=>$scheme, 'param'=>$param], function ($m) use ($register) {
      $m->from('oparannabueze@gmail.com', 'Farmers Connect Product Enquiry');
      $m->to($register->company_email, $register->name_of_company)->subject('Farmers Connect Product Enquiry!');
    });
  }

    //check if farmer is already assigned to scheme
  private function check_farmer_scheme($request, $scheme, $group)
  {
    $scheme_array = array();
    $schemeArray = $scheme->farmers->toArray();

    foreach ($schemeArray  as $value) {

            //$scheme_activity[] = $value['id'];
      array_push($scheme_array, $value['id']);
    }
    foreach ($request->input('box') as $value) {

      if ( ! in_array($value, $scheme_array)) {
        $scheme->farmers()->attach($value);
        $scheme->save();

              //attaching farmer to group
        $group->farmers()->attach($value);
        $group->save();

              //updating farmers assign colum
        $farmer = Farmer::find($value);
        $farmer->assign = 1;
        $farmer->save();

              //updating farmers group coloum
        $farmer->group = 1;
        $farmer->save();

      }
    }
  }

    //check if dealer is already assigned to scheme
  private function check_dealer_scheme($request, $scheme)
  {
    $scheme_array = array();
    $schemeArray = $scheme->dealers->toArray();

    foreach ($schemeArray  as $value) {

            //$scheme_activity[] = $value['id'];
      array_push($scheme_array, $value['id']);
    }
    foreach ($request->input('box') as $value) {

      if ( ! in_array($value, $scheme_array)) {

                 //attach dealer
       $scheme->dealers()->attach($value);
       $scheme->save();

              //updating farmers assign colum
       $dealer = Dealer::find($value);
       $dealer->assign = 1;
       $dealer->save();
     }
   }
 }
}
