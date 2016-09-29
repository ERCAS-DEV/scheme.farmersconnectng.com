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
					<div class="body table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>NAME</th>
									<th>Email</th>
									<th>Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								@if($users)
									@foreach($users as $user)
								<tr>
									<th scope="row">{{$i}}</th>
									<td>{{$user['name']}}</td>
									<td>
										{{$user['email']}}
									</td>
									<td>
									@foreach($user->roles as $role)
											{{ucwords($role['name'])}}&nbsp;
									@endforeach
									</td>
									<td style="width:18%">
										@level(4)
										<span class='pull-left'>
											<!-- <a href='#' class='btn btn-default sm-btn' role='button'><span class="glyphicon glyphicon-edit"></span> </a> -->
											@if($user['status'] == 'pending')
											<form action='/status' method='POST'>
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" value="{{ $user['id'] }}">
												<button type="submit" class="btn btn-default waves-effect">
												    Activate
												</button>
											</form>
											@endif
											@if($user['status'] == 'suspend')
											<form action='/status' method='POST'>
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" value="{{ $user['id'] }}">
												<button type="submit" class="btn btn-default waves-effect">
												    Activate
												</button>
											</form>
											@endif
											@if($user['status'] == 'active')
											<form action='/status' method='POST'>
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" value="{{ $user['id'] }}">
												<button type="submit" class="btn btn-default waves-effect">
												    Suspend
												</button>
											</form>
											@endif
										</span>
										@endlevel
										<span class='pull-right'>
										<form class="delete" action='/users/{{$user->id}}' method='POST'>
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
								<span class='text-center'>**No Role**</span>
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
							Create User <small>Enter Role Name, Email and Password</small>
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
						<form method="POST" action='/users'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="text" class="form-control" name="name" required>
							        <label class="form-label">Name</label>
							    </div>
							</div>
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="email" class="form-control" name="email" required>
							        <label class="form-label">Email</label>
							    </div>
							</div>
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="password" class="form-control" name="password" required>
							        <label class="form-label">Password</label>
							    </div>
							</div>
<!-- 							<div class="form-group form-float">
							    <div class="form-line">
							        <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
							        <label class="form-label">Description</label>
							    </div>
							</div> -->
							<div class="form-group">
								<label class="form-label">Select Role</label>
								<select name='role' class="form-control show-tick" required>
						
									<option value=''>Select role</option>
									@if($roles)
										@foreach($roles as $role)
								    <option value='{{$role->id}}'>{{$role->name}}</option>
								    	@endforeach
									@else
								    <option value=''>No Permission</option>
									@endif
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
