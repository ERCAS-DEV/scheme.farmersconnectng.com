@extends('layout')
@section('content')
<section>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Registration Successful</h2>
        <p>Dear {{$dealer->name_of_company}}</p>
        <p>You details have been reveiwed and you have been assigned to {{ucwords($scheme->name_of_scheme)}} scheme on Farmers Connect</p>

        <p>Please <a href="{{ URL::route('billing', array('id' => $dealer->key)) }}"><strong>CLICK HERE</strong></a> 
            to fill your billing information</p>
        <p><i>N/B:&nbsp;You are advice to change your password..</i></p>
    </div>
</div>
</section>
@stop