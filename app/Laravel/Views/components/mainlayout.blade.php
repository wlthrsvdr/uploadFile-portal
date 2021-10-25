<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FileUpload Portal </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href={{ asset('assets/css/bootstrap-datepicker.min.css') }}>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style type="text/css">
        .input-daterange input {
            background: #fff !important;
        }

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-power-off"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"></span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">
                            <button type="submit" class="btn btn-danger btn-sm btn-lg" style="width:100%"><i
                                    class="fa fa-power-off"></i> Logout</button>
                        </a>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light">
                    <h5 align="center"><strong>FileUpload Portal</strong></h5>
                </span>

            </a>


            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('frontend.index') }}"
                                class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('frontend.portal.create') }}"
                                class="{{ request()->is('portal/create') ? 'nav-link active' : 'nav-link' }}">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>
                                    Upload
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">

                    @yield('content')


                </div>
            </section>

        </div>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>

    <script type="text/javascript" src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>


    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/uploadfile.js') }}"> </script>

    <script type="text/javascript" src="/assets/js/Role.js"></script>

    <script type="text/javascript" src="/assets/js/ExpenseCategory.js"></script>





    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>


    <script type="text/javascript" src={{ asset('assets/js/bootstrap-datepicker.min.js') }}>
    </script>

    <script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="/assets/plugins/sparklines/sparkline.js"></script>

    <script type="text/javascript" src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="/assets/plugins/moment/moment.min.js"></script>

    <script type="text/javascript" src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <script type="text/javascript" src="/assets/plugins/summernote/summernote-bs4.min.js"></script>

    <script type="text/javascript" src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script type="text/javascript" src="/assets/dist/js/adminlte.js"></script>

    <script type="text/javascript" src="/assets/dist/js/pages/dashboard.js"></script>

    <script type="text/javascript" src="/assets/dist/js/demo.js"></script>



</body>

</html>
