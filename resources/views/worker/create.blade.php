@extends('layout')
@section('content')

<section id="features" class="parallax">
  <div class="container">

  </div>
</section><!--/#features-->


<section>
  <div class="container-fluid">
  	<div class='col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3'>
  @if(Session::has('message'))
      @include('include.message')
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
  		<h2 class='text-center'>Agro Worker Registration</h2>
      @include('include.warning')
      @include('include.error')
  		<form role="form" action="/worker" method="POST">
  		    <div class="row setup-content" id="step-1">
  		        <div class="col-xs-12">
  		            <div class="col-md-12">
  		            	<br />
  		            	<br />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  		                <div class="form-group">
  		                    <label class="control-label">First Name</label>
  		                    <input  maxlength="100" type="text" name="first_name" class="form-control" placeholder="Enter First Name"  />
  		                </div>
                      <div class="form-group">
                          <label class="control-label">Middle Name</label>
                          <input  maxlength="100" type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name"  />
                      </div>
  		                <div class="form-group">
  		                    <label class="control-label">Last Name</label>
  		                    <input maxlength="100" type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />
  		                </div>
                      <div class="form-group">
                        <label class="control-label">Date of Birth</label>
                          <div class='input-group date' id='datetimepicker1'>
                              <input type='text' name="date_of_birth" class="form-control" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                          <option>Select Gender</option>
                          <option value='m'>Male</option>
                          <option value='f'>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Email</label>
                          <input maxlength="100" type="text" name="email" class="form-control" placeholder="Enter Email address" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Phone</label>
                          <input maxlength="100" type="text" name="phone" class="form-control" placeholder="Enter Phone number" />
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
                          <label class="control-label">Type of Residence</label>
                          <input maxlength="200" type="text" name="type_of_residence" class="form-control" placeholder="Enter Type of Residence"  />
                      </div>
                      <div class="form-group">
                        <label for="gender">Marital Status</label>
                        <select class="form-control" name="marital_status" id="gender">
                          <option>Select Marital Status</option>
                          <option value='Single'>Single</option>
                          <option value='Married'>Married</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="gender">Level of Education</label>
                        <select class="form-control" name="education" id="gender">
                          <option>Select Level of Education</option>
                          <option value='SSCE'>SSCE</option>
                          <option value='BTech/Bsc'>BTech/Bsc</option>
                          <option value='MSc'>MSc</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="gender">Employment Status</label>
                        <select class="form-control" name="employment" id="gender">
                          <option>Select Employment Status</option>
                          <option value='Unemployed'>Unemployed</option>
                          <option value='Employed'>Employed</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleTextarea">Address</label>
                        <textarea class="form-control" name="address" id="exampleTextarea" rows="3" placeholder="Enter Address"></textarea>
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
                          <label class="control-label">LGA</label>
                          <input maxlength="200" type="text" name="lga" class="form-control" placeholder="Enter LGA"  />
                      </div>
                      <div class="form-group">
                        <label for="gender">State</label>
                        <select class="form-control" name="state" id="gender">
                          <option>Select State</option>
                          <option value='Unemployed'>Unemployed</option>
                          <option value='Employed'>Employed</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label class="control-label">BVN</label>
                          <input maxlength="100" name="bvn" type="text" class="form-control" placeholder="Enter BVN" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Bank Account Number</label>
                          <input maxlength="100" name="account_number" type="text" class="form-control" placeholder="Enter Bank Account Number" />
                      </div>
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