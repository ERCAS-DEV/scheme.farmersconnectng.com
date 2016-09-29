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
                    <a class="navbar-brand hidden-sm hidden-xs" href="{{action('RegisterController@index')}}" ><img src='{{ asset('image/logo1.png')}}'  /></a>
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
        <div style="height: 50px;"></div>
        <!-- Header Carousel -->
        <div class="container body-colour1">
            <header id="myCarousel" class="carousel slide height-line">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner height-line">
                    <div class="item active">
                        <div class="fill" style="background-image:url('{{ asset('image/DSC_2100.JPG')}}');">                     
                        </div>
                        <div class="carousel-caption">
                           
                        </div>
                    </div>
                    <div class="item">
                        <div class="fill" style="background-image:url('{{ asset('image/DSC_1223.JPG')}}');"></div>
                        <div class="carousel-caption">
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="fill" style="background-image:url('{{ asset('image/DSC_0741.jpg')}}');"></div>
                        <div class="carousel-caption">
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="fill" style="background-image:url('{{ asset('image/DSC_0142.JPG')}}');"></div>
                        <div class="carousel-caption">
                            
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </header>

            <!-- Page Content -->


            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        Welcome to the Most Beautiful Girl in Abuja (MBGA) 2016
                    </h3>
                </div>
                <div class="col-md-12 text-justify">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="col-md-12">
                                <h3>About Us</h3>
                            </div>
                            <div class="col-md-4">
                                ‎<p>The MBGA is a beauty pageant organized annually by Dolce Entertainment Limited in the Federal Capital of Abuja. The pageant has been in existence for over Fifteen (15) years and has gained good reputation throughout the federation.</p>

                                ‎<p>This year’s edition shall be the 16th  and promises to be the most glamorous one of all. The objective of the pageant is to produce world class pageant and models who shall be the ambassadors of our great country Nigeria outside the shores of this country. Indeed  the  show  has  produced  many  of  such

                            </div>
                            <div class="col-md-4">
                                ‎  models  and  some  of  our previous winners/contestants have made stunning appearances at other pageants within and outside Nigeria.</p>

                                ‎<p>From the inception of the pageant to date, we have received collaboration and sponsorship from various corporate bodies including ERCAS INTEGRATED SOLUTIONS LIMITED, the Nigerian Breweries Plc (AMSTEL MALTA), CHIMA MOVIE EMPIRE U.S.A, Visafone,  Nafdac,  DAAR  Communications  Owners  of  AIT/Ray  Power
                                    100.5FM, NTA Plus, AM Express, ITV, DBN Television, Hot FM, Cool FM, Gem Electronic </p>

                                ‎
                            </div>
                            <div class="col-md-4">
                                <p>Board, The Sun Newspaper, This Day Newspaper, High  Society Magazine, Chapters  Digital, Arik  Air, Chanchangi-Airline,
                                    Transcorp Hilton, Abuja Sheraton Hotel & Towers, Sandralia Hotel, Top
                                    Rank Hotel Galaxy, 3J’s Hotel, Chida Hotels, Febson Hotel, Nicon Luxury, Nanet Suites, Studio 24, Mattson Creatives Studio, VODI Tailors, Shola
                                    Creative   Studio,   Bnatural,   Dreswel   Ventures   Limited,   I’AM,   Doxa, Eat.Com, Drumstix, Tetrazzini Foods Limited, Aqua Nite Club, Basement Nite Club, Cubana Lounge, Kryxtal Lounge, Denis Hotels, Agura Hotel,
                                    Chancellery Suites etc.
                                </p>
                                <a href="{{action('RegisterController@about')}}" class="btn btn-default">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->

            <!-- Portfolio Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Latest MBGA Photographs</h2>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_0662.jpg')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_0198.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_0326.JPG')}}" alt="">
                    </a>
                </div>
                
<!--                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_0346.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_1204.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_1210.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_1298.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_1706.JPG')}}" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img class="img-responsive img-portfolio img-hover" src="{{ asset('image/DSC_0326.JPG')}}" alt="">
                    </a>
                </div>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{action('RegisterController@gallery')}}" class="btn btn-default">View More</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- Features Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">2016 MOST BEAUTIFUL GIRL IN ABUJA</h2>
                </div>
                <div class="col-md-6">
                    <p>HOW TO APPLY:</p>
                    <ul>
                        <li>PAY 5K @ ANY BANK NATIONWIDE 
                        </li>
                        <li>ACC. NAME: DOLCE ENTERTAINMENT LTD. </li>
                        <li>login to www.mbga2016.com to register</li>
                        <li>also, fill & submit the form via www.mbga2016.com  </li>
                        <li>Please print out your submited form for verification. </li>

                    </ul>
                    <p>This automatically qualifies you to be screened in august; the winner represents nigeria at the all africa beauty pageant so is natiowide... so be one of the lucky contestants for the 2016 mbga grand finale october 29th   @transcorp hilton abuja nigeria. </p>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{{ asset('image/DSC_1722.JPG')}}" alt="">
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Call to Action Section -->
            <div class="well">
                <div class="row">
                    <div class="col-md-8">
                        <h3><strong>Contact:</strong></h3>
                        <p>Phone: 
                            08034523698, 08062243037, 08055610088... 
                        </p>
                        <p>WINNING: A brand new car+a trip to S.A. to represent naija at the all africa beauty pageant in south africa+nafdac ambassador+modeling
                            contracts+mbga rep at the mbgn & many more... hurry now, limited forms available!!!
                        </p>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Dolce Entertainment 2016</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>

        <!-- Script to Activate the Carousel -->
        <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})


        </script>

    </body>

</html>
