<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/dist/css/AdminLTE.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/dist/css/skins/_all-skins.min.css')}}">
        <!-- AdminLTE wysiwyg -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <!-- Select 2 -->
        <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/plugins/select2/select2.min.css')}}">
        <!-- File input-->
        <link rel="stylesheet" href="{{asset('bower_components/bootstrap-fileinput/css/fileinput.min.css')}}">
        <!-- jQuery 2.2.3 -->
        <script src="{{asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script> 
        <script>
            window.csrf = "{!! csrf_token() !!}";
            window.baseurl= "{{ asset('/') }}";
            console.log(baseurl);
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Test</b>T</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Testare</b>Config</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">       
                            <!-- User Account: style can be found in dropdown.less -->
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="{{ url('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            @include('BO.sidebarmenu')

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                @yield('content')
              
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            

        
        </div>
        <!-- ./wrapper -->

        
        <!-- Bootstrap 3.3.6 -->
        <script src="{{asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('bower_components/AdminLTE/plugins/fastclick/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('bower_components/AdminLTE/dist/js/app.min.js')}}"></script>
        <!-- AdminLTE wysihtml -->
        <script src="{{asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- AdminLTE select2 -->
        <script src="{{asset('bower_components/AdminLTE/plugins/select2/select2.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('bower_components/AdminLTE/dist/js/demo.js')}}"></script>
        <!-- AdminLTE iCheck -->
        <script src="{{asset('bower_components/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
        <!-- Jquery UI -->
        <script src="{{asset('bower_components/AdminLTE/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
        <!-- File input -->
        <script src="{{asset('bower_components/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
        <!-- Script Custom -->
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>
