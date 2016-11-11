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

		                    @if($farmer)
		                    	
		                    <tbody>
		                    	<tr>
		                    		<td><b>Farmers ID</b></td>
		                    		<td>{{$farmer->key}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Name</b></td>
		                    		<td>{{ucwords($farmer->fullname)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Gender</b></td>
		                    		<td>{{ucwords($farmer->gender)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Email</b></td>
		                    		<td>{{$farmer->email}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Phone</b></td>
		                    		<td>{{$farmer->phone}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>State</b></td>
		                    		<td>{{ucwords($farmer->state)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>LGA</b></td>
		                    		<td>{{ucwords($farmer->lga)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>village</b></td>
		                    		<td>{{ucwords($farmer->village)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Farm Size</b></td>
		                    		<td>{{ucwords($farmer->farm_size)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>No of Pack</b></td>
		                    		<td>{{ucwords($farmer->no_of_pack)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Used Before</b></td>
		                    		<td>{{ucwords($farmer->used_before)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Bank</b></td>
		                    		<td>{{ucwords($farmer->bank)}}</td>
		                    	</tr>
		                    	<tr>
		                    		<td><b>Account Number</b></td>
		                    		<td>{{ucwords($farmer->account_no)}}</td>
		                    	</tr>
		                    </tbody>
		                    
		                    @endif
		                </table>
		                    <br />
		                <span ><a href='{{URL::to("/farmers")}}' class='btn btn-success'>BACK</a>|<a class='btn btn-warning'>EDIT</a>|<a href='{{URL::to("/farmers/card/$farmer->key")}}' class='btn btn-primary'>CARD</a></span>
		                <span class="pull-right">
		                	<form class="delete" action='/farmers/{{$farmer->id}}' method='POST'>
		                		<input type="hidden" name="_method" value="DELETE">
		                		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                		<button type="submit" class="btn btn-orange waves-effect">
		                		    DELETE</span>
		                		</button>
		                	</form>

		                </span>
		            </div>
		        </div>
		    </div>


		    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		    	<div class="card">
		    		<div class="header">
		    			<h2>
		    				FARMER IMAGE <small>Farmer picture</small>
		    			</h2>
		    			<ul class="header-dropdown m-r--5">
		    				<li>
		    					<a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse">
		    						<i class="material-icons">loop</i>
		    					</a>
		    				</li>
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
		    			<table class="table">
		    				<tbody>
		    					<tr>
		    						<td><b>Farmer Picture</b></td>
		    						<td><img src="{{asset('uploads/farmers/'.$farmer->image)}}" class="img-responsive"></td>
		    					</tr>
		    				</tbody>
		    			</table>
		    		</div>
		    	</div>
		    </div>
		</div>
		<!-- #END# Exportable Table -->
	</div>
</section>
@stop


