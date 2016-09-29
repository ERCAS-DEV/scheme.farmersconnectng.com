@extends('layout')
@section('content')

<section id="features" class="parallax">
  <div class="container">

  </div>
</section><!--/#features-->


<section>
  <div class="container-fluid">
  	<div class='col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3'>
  @if(Session::has('mistake')|| Session::has('message'))
      @include('include.message')
      @include('include.erorr1')
  @else

  		<div class="stepwizard">
  		    <div class="stepwizard-row setup-panel">
  		        <div class="stepwizard-step">
  		            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
  		            <p>Step 1</p>
  		        </div>
  		        <div class="stepwizard-step">
  		            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
  		            <p>Step 2</p>
  		        </div>
  		        <div class="stepwizard-step">
  		            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
  		            <p>Step 3</p>
  		        </div>
  		    </div>
  		</div>
  		<br />
  		<br />
  		<h2 class='text-center'>Agro Dealer Billing</h2>
      @include('include.warning')
      @include('include.error')
  		<form role="form" action="/billing" method="POST">
  		    <div class="row setup-content" id="step-1">
  		        <div class="col-xs-12">
  		            <div class="col-md-12">
  		            	<br />
  		            	<br />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  		                <input name="id" type="hidden" value='{{$dealer->id}}' />
                    <div class="form-group">
                        <label class="control-label">Unit Price</label>
                        <input maxlength="100" name="price" type="text" class="form-control" placeholder="Unit Price" />
                    </div>

  		                <button class="btn btn-warning nextBtn btn-lg pull-right" type="button" >Next</button>
  		            </div>
  		        </div>
  		    </div>
  		    <div class="row setup-content" id="step-2">
  		        <div class="col-xs-12">
  		            <div class="col-md-12">
                      <br />
  		                <br />
                      <div class="form-group">
                          <label class="control-label">BVN</label>
                          <input maxlength="100" name="bvn" type="text" class="form-control" placeholder="Enter BVN" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Bank Account Number</label>
                          <input maxlength="100" name="account_number" type="text" class="form-control" placeholder="Enter Bank Account Number" />
                      </div>

  		                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
  		            </div>
  		        </div>
  		    </div>
  		    <div class="row setup-content" id="step-3">
  		        <div class="col-xs-12">
  		            <div class="col-md-12">
                      <br />
  		                <br />
                      <div class="form-group">
                          <label class="control-label">Account Name</label>
                          <input maxlength="100" type="text" name="account_name" class="form-control" placeholder="Enter Account Name" />
                      </div>
  		                <button class="btn btn-warning btn-lg pull-right" type="submit">Finish!</button>
  		            </div>
  		        </div>
  		    </div>
  		</form>
      @endif
  	</div>
  </div>
</section><!--/#features-->
@stop