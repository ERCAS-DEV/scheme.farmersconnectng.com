
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="description" content="Dolce Entertainment-The Most Beautiful Girl in Abuja">
        <meta name="author" content="Dolce Entertainment">
        <meta name="robots" content="index/follow">
        <meta name="keyword" content="MBGA 2014,MBGA 2015,MBGA 2016,peagent,dolce,Entertainment">

        <title>{{$title}}</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="{{ asset('css/modern-business.css')}}" rel="stylesheet">
        <link href="{{ asset('css/style1.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
                  <style>
            body {
                background: url(../image/DSC_0142.JPG) no-repeat center fixed;
                background-size: cover;

            }
        </style>

    </head>

    <body>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76469133-1', 'auto');
  ga('send', 'pageview');

</script>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-sm hidden-xs" href="{{action('RegisterController@index')}}"><img src='{{ asset('image/logo1.png')}}' height="80"  /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{action('RegisterController@index')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{action('RegisterController@about')}}">About</a>
                        </li>
                        <li>
                            <a href="{{action('RegisterController@contact')}}">Contact</a>
                        </li>
                        <li>
                            <a href="{{action('RegisterController@gallery')}}">Gallery</a>
                        </li>
                         <li>
                            <a href="{{action('RegisterController@mbga')}}">MBGA Nigeria</a>
                        </li>
                        <li>
                            <?php if (Session::get('key')): ?>
                            <li>
                                <a href="{{action('RegisterController@create')}}">Form</a>
                            </li>
                            <li>
                                <a href="{{action('RegisterController@success')}}">Print Form</a>
                            </li>
                            <li>
                                <a href="{{action('RegisterController@logout')}}">Logout</a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="{{action('RegisterController@show')}}">Register</a>
                            </li>
                             <li>
                            <img src='{{ asset('image/logo.png')}}'  />
                        </li>
                        <?php endif; ?>
                       

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div style="height: 50px;"></div>
        <!-- Header Carousel -->
        <div class="container body-colour1">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Success
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{action('RegisterController@index')}}">Home</a>
                        </li>
                        <li class="active">Success</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Intro Content -->

            <!-- /.row -->

            <!-- Team Members -->
            <div class="row">
                <div class="col-md-12">
                    @include('include.message')
                    @include('include.warning')
                </div>
            </div>
            @if (!Session::has('warning'))
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8 table-responsive">
                                <table class="table">
                                    <tr><td>Identification Number:</td><td>{{$user->transaction_id}}</td></tr>
                                    <tr><td>Name:</td><td>{{ucwords($user->surname)}} {{ucwords($user->first_name)}}</td></tr>
                                    <tr><td>Date of Birth:</td><td>{{$user->date_of_birth}}</td></tr>
                                    <tr><td>Place of Birth:</td><td>{{ucwords($user->place_of_birth)}}</td></tr>
                                    <tr><td>State of Origin:</td><td>{{ucwords($user->state_of_birth)}}</td></tr>
                                    <tr><td>Contact Address:</td><td>{{ucwords($user->contact_address)}}</td></tr>
                                    <tr><td>Email:</td><td>{{$user->email}}</td></tr>
                                    <tr><td>Contact Phone:</td><td>{{$user->contact_phone}}</td></tr>
                                </table>
                            </div>
                            <div class="col-md-4">

                                <div class="col-md-12">
                                    <img src="{{asset("uploads/".$user->images['filename'])}}" height="200px" width="170px" alt="" />
                                </div>


                                <div class="col-md-12 ">

                                    <button type="button" class="btn btn-success" onClick="window.print()">Print this page</button>                                   

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                @endif
                <!-- /.row -->

                <!-- Our Customers -->

                <!-- /.row -->

                <hr>

                <!-- Footer -->
                <div class="col-md-12">
                    <footer>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Copyright &copy; Dolce Entertainment 2016</p>
                            </div>
                        </div>
                    </footer>
                </div>

            </div>
            <!-- /.container -->

          <!-- jQuery -->
        <script src="{{ asset('js/jquery.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    </body>

</html>
