<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Location de salle... WF3 - Ash">

    <title>@yield( 'title', '') | {{ $appName }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @yield('head')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">{{ $appName }}</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="{{ Request::is('*admin/rooms*') ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#rooms"><i class="fa fa-fw fa-inbox"></i> Salles <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="rooms" class="collapse {{ Request::is('*admin/rooms*') ? 'in' : '' }}">
                            <li>
                                <a href="{{ route('admin::rooms::home') }}">Lister</a>
                            </li>
                            <li>
                                <a href="{{ route('admin::rooms::add') }}">Ajouter</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('*admin/products*') ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#products"><i class="glyphicon glyphicon-flash"></i> Produits <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="products" class="collapse {{ Request::is('*products*') ? 'in' : '' }}">
                            <li>
                                <a href="{{ route('admin::products::home') }}">Lister</a>
                            </li>
                            <li>
                                <a href="{{ route('admin::products::add') }}">Ajouter</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('*admin/members*') ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#members"><i class="fa fa-fw fa-user"></i> Membres <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="members" class="collapse {{ Request::is('*members*') ? 'in' : '' }}">
                            <li>
                                <a href="#">Lister</a>
                            </li>
                            <li>
                                <a href="#">Ajouter</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('*admin/reviews*') ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#reviews"><i class="fa fa-fw fa-comment"></i> Avis <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="reviews" class="collapse {{ Request::is('*reviews*') ? 'in' : '' }}">
                            <li>
                                <a href="#">Lister</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('*admin/orders*') ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#orders"><i class="glyphicon glyphicon-list"></i> Commandes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="orders" class="collapse {{ Request::is('*orders*') ? 'in' : '' }}">
                            <li>
                                <a href="#">Lister</a>
                            </li>
                            <li>
                                <a href="#">Ajouter</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-remove-sign"></i> Déconnexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            @yield( 'title', '' )
                        </h1>
                        <ol class="breadcrumb">
                            @yield( 'breadcrumb' )
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @yield( 'content' )

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    {{--<script src="/js/plugins/morris/raphael.min.js"></script>--}}
    {{--<script src="/js/plugins/morris/morris.min.js"></script>--}}
    {{--<script src="/js/plugins/morris/morris-data.js"></script>--}}

    @yield('footer')

</body>

</html>
