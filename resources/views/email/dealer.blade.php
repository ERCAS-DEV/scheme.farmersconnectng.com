@extends('layout')
@section('content')
<section>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Registration Successful</h2>
        <p>Dear {{$user->name_of_company}}</p>
        <p>You have successfully registered as Farmers Connect Dealer, Please find below your details.</p>
        <p>Email: {{$user->company_email}}</p>
        <p>Password: {{$password}}</p>
        <p>Phone: {{$user->company_phone}}</p>
        <p>Please<a href="{{ URL::route('emaildealer', array('token' => $token,'id'=>$user->id, 'email'=>$user->company_email)) }}"><strong>CLICK HERE</strong></a> to activate your account</p>
        <p><i>N/B:&nbsp;You are advice to change your password..</i></p>
    </div>
</div>
</section>
@stop