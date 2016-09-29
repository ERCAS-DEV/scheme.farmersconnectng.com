@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>{{$title}}</h2>
		</div>



		<!-- Exportable Table -->
		<div class="row clearfix">
		    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		    	@include('include.message')
		    	@include('include.warning')
		    	@include('include.error')
		        <div class="card">
		            <div class="header">
		                <h2>
		                    Farmers Details
		                </h2>
		                <ul class="header-dropdown m-r--5">
		                    <li class="dropdown">
		                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                            <i class="material-icons">more_vert</i>
		                        </a>
		                        <ul class="dropdown-menu pull-right">
		                            <li><a href="javascript:void(0);">Action</a></li>
		                            <li><a href="javascript:void(0);">Another action</a></li>
		                            <li><a href="javascript:void(0);">Something else here</a></li>
		                        </ul>
		                    </li>
		                </ul>
		            </div>
		            <div class="body">
		                <table class="table table-bordered table-striped table-hover">

		                    @if($worker)
		                    	
		                    <tbody>
		                    	<tr>
		                    		<td><b>Worker ID</b></td>
		                    		<td>{{$worker->key}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Name</b></td>
		                    		<td>{{ucwords($worker->first_name)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Middle Name</b></td>
		                    		<td>{{ucwords($worker->middle_name)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Last Name</b></td>
		                    		<td>{{ucwords($worker->last_name)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Gender</b></td>
		                    		<td>{{ucwords($worker->gender)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Email</b></td>
		                    		<td>{{$worker->email}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Phone</b></td>
		                    		<td>{{$worker->phone}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>State</b></td>
		                    		<td>{{ucwords($worker->state)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>LGA</b></td>
		                    		<td>{{ucwords($worker->lga)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>village</b></td>
		                    		<td>{{ucwords($worker->village)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Type of Residence</b></td>
		                    		<td>{{ucwords($worker->type_of_residence)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Marital Status</b></td>
		                    		<td>{{ucwords($worker->marital_status)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Education</b></td>
		                    		<td>{{ucwords($worker->education)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Employment</b></td>
		                    		<td>{{ucwords($worker->employment)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Address</b></td>
		                    		<td>{{ucwords($worker->address)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>State</b></td>
		                    		<td>{{ucwords($worker->state)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>LGA</b></td>
		                    		<td>{{ucwords($worker->lga)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>BVN</b></td>
		                    		<td>{{ucwords($worker->bvn)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Bank</b></td>
		                    		<td>{{ucwords($worker->account_name)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Account Number</b></td>
		                    		<td>{{ucwords($worker->account_number)}}</td>
		                    	</tr>
		                    </tbody>
		                    
		                    @endif
		                </table>
		                <span><a href='{{URL::to('/work')}}' class='btn btn-default'>BACK</a>|
		                	@if($worker->status == 'active')
		                	<form action='action' method='POST'>
		                		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                		<input type="hidden" name="status" value="{{ $worker->status }}">
		                		<input type="hidden" name="id" value="{{ $worker->id }}">
		                		<button type="submit" class="btn btn-default waves-effect">
		                		    SUSPEND</span>
		                		</button>
		                	</form>
		                	@endif
		                	@if($worker->status == 'suspend')
		                	<form action='action' method='POST'>
		                		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                		<input type="hidden" name="status" value="{{ $worker->status }}">
		                		<input type="hidden" name="id" value="{{ $worker->id }}">
		                		<button type="submit" class="btn btn-default waves-effect">
		                		    ACTIVATE</span>
		                		</button>
		                	</form>
		                	@endif
		                </span>
		                <span class='pull-right'>
		                	<form class="delete" action='/worker/{{$worker->id}}' method='POST'>
		                		<input type="hidden" name="_method" value="DELETE">
		                		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                		<button type="submit" class="btn btn-default waves-effect">
		                		    DELETE</span>
		                		</button>
		                	</form>
		                </span>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- #END# Exportable Table -->
	</div>
</section>
@stop


