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
      <h2 class='text-center'>Agro Dealer Registration</h2>
      @include('include.warning')
      @include('include.error')
      <form role="form" action="/dealer" method="POST" enctype="multipart/form-data">
          <div class="row setup-content" id="step-1">
              <div class="col-xs-12">
                  <div class="col-md-12">
                    <br />
                    <br />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label class="control-label">Name of Company</label>
                          <input  maxlength="100" required type="text" name="name_of_company" class="form-control" placeholder="Enter Name of Company"  />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Company Email</label>
                          <input maxlength="100" required type="text" name="company_email" class="form-control" placeholder="Enter Company Email address" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Company Phone</label>
                          <input maxlength="100" required type="text" name="company_phone" class="form-control" placeholder="Enter Phone Number" />
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea">Address</label>
                        <textarea class="form-control" name="address" id="exampleTextarea" rows="3" placeholder="Enter Address"></textarea>
                      </div>
                      <div class="form-group form-float">
                        <label class="form-label">Company Logo*</label>
                          <div class="form-line">
                              <input type="file" name="file" class="filestyle" data-buttonBefore="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Website</label>
                          <input maxlength="200" type="text" name="website" class="form-control" placeholder="Enter Website"  />
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
                          <label class="control-label">Contact Person</label>
                          <input maxlength="100" type="text" required name="contact_person" class="form-control" placeholder="Enter Contact Person" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Phone Number</label>
                          <input maxlength="100" type="text" required name="person_phone" class="form-control" placeholder="Enter Phone Number" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Email Address</label>
                          <input maxlength="100" type="text" required name="person_email" class="form-control" placeholder="Enter Email Address" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Area of Agricultural Expertise</label>
                          <input maxlength="100" type="text" required name="agricultural_expertise" class="form-control" placeholder="Enter Area of Agricultural Expertise" />
                      </div>
                      <div class="form-group form-float">
                        <label class="form-label">Picture*</label>
                          <div class="form-line">
                              <input type="file" name="file1" class="filestyle" data-buttonBefore="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">No of years in Business</label>
                          <input maxlength="200" type="text" name="years_in_business" class="form-control" placeholder="Enter No of years in Business"  />
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
                          <label class="control-label">How many similar Project</label>
                          <input maxlength="200" type="text" name="similar_project" class="form-control" placeholder="Enter How many similar Project"  />
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea">List 5 with references</label>
                        <textarea class="form-control" name="references" id="exampleTextarea" rows="3" placeholder="List 5 with references"></textarea>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Company TIN</label>
                          <input maxlength="200" type="text" required name="company_tin" class="form-control" placeholder="Enter Company TIN"  />
                      </div>
                      <div class="form-group">
                          <label class="control-label">BVN</label>
                          <input maxlength="100" name="bvn" required type="text" class="form-control" placeholder="Enter BVN" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Company Bank Account number</label>
                          <input maxlength="100" required name="account_number" type="text" class="form-control" placeholder="Enter Company Bank Account number" />
                      </div>
                      <div class="form-group">
                          <label class="control-label">Account Name</label>
                          <input maxlength="100" required type="text" name="account_name" class="form-control" placeholder="Enter Account Name" />
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