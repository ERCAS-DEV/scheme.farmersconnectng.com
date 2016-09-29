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
							Role Page
							<small>Manage Role on the platform</small>
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
									<th>Permission</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@if($roles)
									@foreach($roles as $role)
								<tr>
									<th scope="row">{{$i}}</th>
									<td>{{ucfirst($role->name)}}</td>
									<td>
										@foreach($role->permissions as $permission)
												{{$permission['name']}}&nbsp;
										@endforeach
									</td>
									<td>{{ucfirst($role->description)}}</td>
									<td style="width:13%">
										<span class='pull-left'>
											<a href='#' class='btn btn-default sm-btn' role='button'><span class="glyphicon glyphicon-edit"></span> </a>
										</span>
										@level(4)
										<span class='pull-right'>
										<form class="delete" action='/role/{{$role->id}}' method='POST'>
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-default waves-effect">
											    <span class="glyphicon glyphicon-remove"></span>
											</button>
										</form>
										</span>
										@endlevel
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
							Create Role <small>Enter Role Name, Slug. Description and select Permission</small>
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
						<form method="POST" action='/role'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="text" class="form-control" name="name" required>
							        <label class="form-label">Name</label>
							    </div>
							</div>
<!-- 							<div class="form-group form-float">
							    <div class="form-line">
							        <input type="text" class="form-control" name="slug" required>
							        <label class="form-label">Slug</label>
							    </div>
							</div> -->
							<div class="form-group form-float">
							    <div class="form-line">
							        <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
							        <label class="form-label">Description</label>
							    </div>
							</div>
							@level(2)
							<div class="form-group">
								<label class="form-label">Select Level</label>
								<select name='level' class="form-control show-tick">
								    <option value='1'>1</option>
								    <option value='2'>2</option>
								    <option value='3'>3</option>
								    @level(4)
								    <option value='4'>4</option>
								    <option value='5'>5</option>
								    @endlevel
								</select>
							</div>
							@endlevel
							<div class="form-group">
								<label class="form-label">Select Permission</label>
								<select name='permission[]' class="form-control show-tick" multiple required>
									@if($permissions)
										@foreach($permissions as $permission)
								    <option value='{{$permission->id}}'>{{$permission->name}}</option>
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
