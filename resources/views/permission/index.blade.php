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
							Permission Page
							<small>Manage permission on the platform</small>
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
									<th>NAME</th>
									<th>Right</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								@if($permissions)
									@foreach($permissions as $permission)
								<tr>
									<th scope="row">{{$i}}</th>
									<td>{{ucfirst($permission->name)}}</td>
									<td>{{$permission->slug}}</td>
									<td>{{ucfirst($permission->description)}}</td>
									<td style="width:13%">
										<span class='pull-left'>
											<a href='#' class='btn btn-default sm-btn' role='button'><span class="glyphicon glyphicon-edit"></span> </a>
										</span>
										<span class='pull-right'>
										<form class="delete" action='/permission/{{$permission->id}}' method='POST'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-default waves-effect">
											    <span class="glyphicon glyphicon-remove"></span>
											</button>
										</form>
										</span>
									</td>
								</tr>
								<?php $i++; ?>
									@endforeach
								@else
								<span class='text-center'>**No Permission**</span>
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
							Create Permission <small>Enter permission Name, Description and Slug</small>
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
						<form method="POST" action='/permission'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="text" class="form-control" name="name" required>
							        <label class="form-label">Name</label>
							    </div>
							</div>

							<div class="form-group form-float">
							    <div class="form-line">
							        <textarea name="description" cols="30" rows="5" class="form-control no-resize" ></textarea>
							        <label class="form-label">Description</label>
							    </div>
							</div>
							<div class="form-group">
								<label class="form-label">Select Right</label>
								<select name='slug' class="form-control show-tick" required>
							
									<option value=''>Select Right</option>
								
								    <option value='users.create'>create user</option>
								    <option value='users.destroy'>delete user</option>
								    <option value='user.show'>show user</option>
								    <option value='users.edit'>edit user</option>
								    <option value='role.show'>show role</option>
								    <option value='role.edit'>edit role</option>
								    <option value='role.create'>create role</option>
								    <option value='role.destroy'>delete role</option>
							
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-warning m-t-15 waves-effect">CREATE</button>
						</form>
					</div>
				</div><!-- End of second row -->
			</div>
			<!-- #END# Bordered Table -->
		</section>

		@stop
