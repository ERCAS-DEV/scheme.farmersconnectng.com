<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$title}}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Datatable-->
    <link href="{{ asset ('/AdminTemplate/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset ('/AdminTemplate/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset ('/AdminTemplate/plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <link href="{{ asset ('/AdminTemplate/plugins/waitme/waitMe.css') }}" rel="stylesheet" />
    <link href="{{ asset ('/AdminTemplate/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset ('/AdminTemplate/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="{{ asset ('/AdminTemplate/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet" />
    
    <!-- Dropzone Css -->
    <link href="{{ asset ('/AdminTemplate/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    
    <!-- Morris Chart Css-->
    <link href="{{ asset ('/AdminTemplate/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset ('/AdminTemplate/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset ('/AdminTemplate/css/themes/theme-red.css') }}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">SCHEME - {{ucwords($scheme->name_of_scheme)}}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->

                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

<!-- including right and Left bar menu -->
            @include('include.sidebar')
<!-- including right and Left bar menu ENDS-->

<!-- including content -->
            @yield('content')
<!-- including content Ends -->



    <!-- Datatable -->
    <script src="{{ asset ('/AdminTemplate/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/jquery.dataTables.min.js') }}"></script>
    @stack('scripts')

    <!-- Bootstrap Core Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-countto/jquery.countTo.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset ('/AdminTemplate/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.time.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/waitme/waitMe.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/bootstrap-filestyle.min.js') }}"></script>
    

    <!-- JQuery Steps Plugin Js -->
    


    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
    


    <!-- Custom Js -->
    <script src="{{ asset ('/AdminTemplate/js/admin.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/bootbox.min.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/cards/basic.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/index.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/forms/basic-form-elements.js') }}"></script>
    <!-- Dropzone Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/dropzone/dropzone.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset ('/AdminTemplate/js/demo.js') }}"></script>
    <script>
        $('.delete').submit(function(e) {
            e.preventDefault();
            var currentForm = this;
            bootbox.confirm("Are you sure you want to delete this?", function(result) {
                if (result) {
                    currentForm.submit();
                }
            });
        });
    
    </script>
</body>

</html>


