@extends('layout')
@section('content')
<section>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Product Enquiry</h2>
        <p>Dear {{ucwords($dealer->name_of_company)}}</p><br />
        <p>You details have been reveiwed by {{ucwords($scheme->name_of_scheme)}} Scheme on Farmers Connect and you are required to quote with below details.</p>
        <p>Product: {{ucwords($param->activity)}}</p>
        <p>Quantity: {{$param->quantity}}</p>
        <p>Description: {{ucwords($param->description)}}</p>
        <p>Payable within: {{$param->payment_range}}</p>

        <p>Please <a href="{{URL::to('/billing/'.$param->key.'/'.$scheme->key.'/'.$dealer->key.'')}}"><strong>CLICK HERE</strong></a> 
            to fill your Quotation</p>
        <p><i>N/B:&nbsp;You are advice to quote per unity price also payment can be made to you within {{$param->payment_range}}</i></p>
    </div>
</div>
</section>
@stop