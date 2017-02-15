<!DOCTYPE html>
<html>
<head>
	@include('partials._head')
</head>
<body>
	
	@include('partials._header')
	@include('partials._nav')
	
	<!-- MAIN PANEL -->
	<div id="main" role="main">
		@include("partials._ribbon")
		<div id="content">
			<div class="row">
				@yield('content')
				
				
			</div>
		</div>		
	</div>
	@include('partials._footer')
	@include('partials._tiles')
	@include('partials._scripts')

</body>
</html>