@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">

		<!-- Bordered Table -->

		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('include.message')
				@include('include.warning')
				@include('include.error')
				<div class="card">
					<div class="header">
						<h2>
							User Page
							<small>Manage User on the platform</small>
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
							<div class='row' id="print">
								<div class='col-xs-4 col-md-4'>
									<a href="javascript:void(0);" class="thumbnail">
									    <img src="{{asset('uploads/farmers/'.$farmer->image)}}" class="img-responsive">
									</a>
								</div>
								<div class='col-xs-4 col-md-4'>
									<table class="table">
									    
									    <tbody>
									        <tr>
									            <td>Name:</td>
									            <td>{{$farmer->fullname}}</td>
									        </tr>
									        <tr>
									            <td>Gender:</td>
									            <td>{{$farmer->gender}}</td>
									        </tr>
									        </tr>
									        <tr>
									            <td>State:</td>
									            <td>{{$farmer->state}}</td>
									        </tr>
									        <tr>
									            <td>Crop Type:</td>
									            <td>{{$farmer->crop}}</td>
									        </tr>


									    </tbody>
									</table>
								</div>
								<div class='col-xs-4 col-md-4'>
										<a href="javascript:void(0);" class="thumbnail">
										    {!! QrCode::size(100)->generate($farmer->key); !!}
										</a>
								</div>
							</div>
							<button type="button" class="btn btn-default waves-effect" onClick="window.print()"><i class="material-icons">print</i>&nbsp;Print</button>

					</div>
				</div>
			</div><!-- End of First Colum -->
		</div>

		</section>

		@stop