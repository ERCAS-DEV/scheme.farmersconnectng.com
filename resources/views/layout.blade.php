<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Farmers Connect</title>
  <link href="{{ asset('template3/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('template3/css/animate.min.css')}}" rel="stylesheet"> 
  <link href="{{ asset('template3/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('template3/css/lightbox.css')}}" rel="stylesheet">
  <link href="{{ asset('template3/css/main.css')}}" rel="stylesheet">
  <link id="css-preset" href="{{ asset('template3/css/presets/preset1.css')}}" rel="stylesheet">
  <link href="{{ asset('template3/css/responsive.css')}}" rel="stylesheet">
  <link href="{{ asset('template3/css/formwizard.css')}}" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="{{ asset('template3/images/favicon.ico')}}">
</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
         @yield('header')
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="/#home">Home</a></li>
            <li class="scroll"><a href="http://demo1.farmersconnectng.com/admin">Login</a></li>
            <li class="scroll"><a href="/#services">Service</a></li> 
            <li class="scroll"><a href="/#about-us">About Us</a></li>                     
            
            <!-- <li class="scroll"><a href="#team">Team</a></li> -->
          
            <li class="scroll"><a href="/#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

         @yield('content')




    <footer id="footer">
      <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container text-center">
          <div class="footer-logo">
            <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a>
          </div>
          <div class="social-icons">
            <ul>
              <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <p>&copy; 2016 Farmers Connect.</p>
            </div>
            <div class="col-sm-6">
              <p class="pull-right">Crafted by <a href="http://designscrazed.org/">Ercas Solution Limited</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="{{ asset('template3/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('template3/js/jquery.inview.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/mousescroll.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/jquery.countTo.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/lightbox.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template3/js/formwizard.js')}}"></script>
    <script src="{{ asset ('/AdminTemplate/js/bootstrap-filestyle.min.js') }}"></script>

  </body>
  </html>