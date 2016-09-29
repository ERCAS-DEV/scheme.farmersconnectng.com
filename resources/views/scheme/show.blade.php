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
							SCHEME DETAILS
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

							@if($scheme)

							<tbody>
								<tr>
									<td><b>schemes ID</b></td>
									<td>{{$scheme->key}}</td>
								</tr>
								<tr>
									<td><b>Name of Scheme</b></td>
									<td>{{ucwords($scheme->name_of_scheme)}}</td>
								</tr>
								<tr>
									<td><b>Facilitator of Scheme</b></td>
									<td>{{ucwords($scheme->facilitator_of_scheme)}}</td>
								</tr>
								<tr>
									<td><b>Discription of scheme</b></td>
									<td>{{ucwords($scheme->discription_of_scheme)}}</td>
								</tr>
								<tr>
									<td><b>Facilitator Name</b></td>
									<td>{{$scheme->facilitator_name}}</td>
								</tr>
								<tr>
									<td><b>Address</b></td>
									<td>{{ucwords($scheme->address)}}</td>
								</tr>
								<tr>
									<td><b>BVN</b></td>
									<td>{{ucwords($scheme->bvn)}}</td>
								</tr>
								<tr>
									<td><b>TIN</b></td>
									<td>{{ucwords($scheme->tin)}}</td>
								</tr>
								<tr>
									<td><b>Nature of Bussiness</b></td>
									<td>{{ucwords($scheme->nature_of_bussiness)}}</td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td>{{ucwords($scheme->email)}}</td>
								</tr>
								<tr>
									<td><b>Phone</b></td>
									<td>{{ucwords($scheme->phone)}}</td>
								</tr>
								<tr>
									<td><b>Objective of Scheme</b></td>
									<td>{{ucwords($scheme->objective_of_scheme)}}</td>
								</tr>
								<tr>
									<td><b>Partner of Scheme</b></td>
									<td>{{ucwords($scheme->partners_of_scheme)}}</td>
								</tr>
							</tbody>

							@endif
						</table>
						<span><a href='{{URL::to('/viewscheme')}}' class='btn btn-default'>BACK</a>|<a class='btn btn-default'>EDIT</a></span>
						<span class='pull-right'>
							<form class="delete" action='/scheme/{{$scheme->id}}' method='POST'>
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
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							SCHEME IMAGES <small>Faciliatator picture and Scheme logo</small>
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
									<td><b>Facilitator Picture</b></td>
									<td><img src="{{asset('uploads/scheme/'.$scheme->image)}}" class="img-responsive"></td>
								</tr>
								<tr>
									<td><b>Scheme Logo</b></td>
									<td><img src="{{asset('uploads/logo/'.$scheme->logo)}}" class="img-responsive"></td>
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


