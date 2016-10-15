@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>{{$title}}</h2>
		</div>

		<!-- Bordered Table -->

		<div class="row clearfix">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				@include('include.message')
				@include('include.warning')
				@include('include.error')
				<div class="card">
					<div class="header">
						<h2>
							Group Page
							<small>Manage farmers, workers and dealers on the platform by grouping</small>
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
					<div class="body table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>GROUP NAME</th>
									<th>SCHEME</th>
									<th>NO OF FARMERS</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i =1; ?>
								@if($scheme)
									@foreach($scheme->groups as $group )
								<tr>
									<th scope="row">{{$i}}</th>
									<td>
										{{ucwords($group->group_name)}}
									</td>
									<td>
										{{$scheme->name_of_scheme}}
									</td>
									<td>
										{{count($group->farmers)}}
									</td>
									<td style="width:18%">
										
										<span class='pull-left'>
											<!-- <a href='#' class='btn btn-default sm-btn' role='button'><span class="glyphicon glyphicon-edit"></span> </a> -->
										
											<form action='/group/{{$group->key}}/edit' method='get'>
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" value="">
												<button type="submit" class="btn btn-default waves-effect">
												    Edit
												</button>
											</form>
										
										</span>
									
										<span class='pull-right'>
										<form class="delete" action='/group/{{$group->key}}' method='POST'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-default waves-effect">
											    <span class="glyphicon glyphicon-remove"></span>
											</button>
										</form>
										</span>
									</td>
								</tr>
								<?php $i++;?>
									@endforeach
								@else
								<span class='text-center'>**No Group**</span>
								@endif
							</tbody>
						</table>
						<span class='pull-right'></span>
					</div>
				</div>
			</div><!-- End of First Colum -->

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Create Group <small>Enter Group Name</small>
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
						<form method="POST" action='/group'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="text" class="form-control" name="group_name" required>
							        <label class="form-label">Group Name</label>
							    </div>
							</div>

							<br>
							<button type="submit" class="btn btn-warning m-t-15 waves-effect">GROUP</button>
						</form>
					</div>
				</div><!-- End of second row -->
			</div>
			<!-- #END# Bordered Table -->
		</section>

		@stop
