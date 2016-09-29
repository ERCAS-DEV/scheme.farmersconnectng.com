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
							DEALER DETAILS
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

							@if($dealer)

							<tbody>
								<tr>
									<td><b>Dealer ID</b></td>
									<td>{{$dealer->key}}</td>
								</tr>
								<tr>
									<td><b>Name of Company</b></td>
									<td>{{ucwords($dealer->name_of_company)}}</td>
								</tr>
								<tr>
									<td><b>Company Email</b></td>
									<td>{{ucwords($dealer->company_email)}}</td>
								</tr>
								<tr>
									<td><b>Company Phone</b></td>
									<td>{{ucwords($dealer->company_phone)}}</td>
								</tr>
								<tr>
									<td><b>Address</b></td>
									<td>{{$dealer->address}}</td>
								</tr>
								<tr>
									<td><b>Website</b></td>
									<td>{{ucwords($dealer->website)}}</td>
								</tr>
								<tr>
									<td><b>Contact Person</b></td>
									<td>{{ucwords($dealer->contact_person)}}</td>
								</tr>
								<tr>
									<td><b>Contact Phone</b></td>
									<td>{{ucwords($dealer->person_phone)}}</td>
								</tr>
								<tr>
									<td><b>Contact Email</b></td>
									<td>{{ucwords($dealer->person_email)}}</td>
								</tr>
								<tr>
									<td><b>Agricultural Expertise</b></td>
									<td>{{ucwords($dealer->agricultural_expertise)}}</td>
								</tr>
								<tr>
									<td><b>Years in bussiness</b></td>
									<td>{{ucwords($dealer->years_in_business)}}</td>
								</tr>
								<tr>
									<td><b>Similar Project</b></td>
									<td>{{ucwords($dealer->similar_project)}}</td>
								</tr>
								<tr>
									<td><b>References</b></td>
									<td>{{ucwords($dealer->references)}}</td>
								</tr>
								<tr>
									<td><b>Company Tin</b></td>
									<td>{{ucwords($dealer->company_tin)}}</td>
								</tr>								
								<tr>
									<td><b>Company BVN</b></td>
									<td>{{ucwords($dealer->bvn)}}</td>
								</tr>								
								<tr>
									<td><b>Company Account Number</b></td>
									<td>{{ucwords($dealer->account_number)}}</td>
								</tr>								
								<tr>
									<td><b>Company Account Name</b></td>
									<td>{{ucwords($dealer->account_name)}}</td>
								</tr>
							</tbody>
							@endif
						</table>
						<span><a href='{{URL::to('/viewdealer')}}' class='btn btn-default'>BACK</a>|
							@if($dealer->status == 'active')
							<form action='action1' method='POST'>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="status" value="{{ $worker->status }}">
								<input type="hidden" name="id" value="{{ $worker->id }}">
								<button type="submit" class="btn btn-default waves-effect">
								    SUSPEND</span>
								</button>
							</form>
							@endif
							@if($dealer == 'suspend')
							<form action='action1' method='POST'>
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
							<form class="delete" action='/dealer/{{$dealer->id}}' method='POST'>
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
							DEALER IMAGES <small>Faciliatator picture and dealer logo</small>
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
									<td><b>Contact Person Picture</b></td>
									<td><img src="{{asset('uploads/dealer/'.$dealer->image)}}" class="img-responsive"></td>
								</tr>
								<tr>
									<td><b>Dealer Logo</b></td>
									<td><img src="{{asset('uploads/logo/'.$dealer->logo)}}" class="img-responsive"></td>
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


