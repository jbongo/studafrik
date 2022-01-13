<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>
	<link rel="stylesheet" href="{{asset('css/icons.css')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
	<link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	
    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}" />
    @yield('css-content')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('layouts.leftmenu_bo')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color: #323232">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    {{-- <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{-- <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> --}}

                       


                        

                        
                        <li class="nav-item dropdown no-arrow mx-1 topmenu_bo_desktop">
                            <a class="nav-link dropdown-toggle" href="{{route('welcome')}}" target="_blank" id="alertsDropdown" role="button">
                                Accueil
                            </a>
                        </li>
                                                
                        <li class="nav-item dropdown no-arrow mx-1 topmenu_bo_desktop">
                            <a class="nav-link dropdown-toggle" href="{{ route('offres_emplois') }}" target="_blank" id="alertsDropdown" role="button">
                                Offres d'emploi
                            </a>
                        </li>

                                                
                        <li class="nav-item dropdown no-arrow mx-1 topmenu_bo_desktop">
                            <a class="nav-link dropdown-toggle" href="{{ route('qui_sommes_nous') }}" target="_blank" id="alertsDropdown" role="button">
                                Qui sommes nous ?
                            </a>
                        </li>


                                                
                        <li class="nav-item dropdown no-arrow mx-1 topmenu_bo_desktop">
                            <a class="nav-link dropdown-toggle" href="{{ route('blog.index') }}" target="_blank" id="alertsDropdown" role="button">
                                Articles
                            </a>
                        </li>


                                                
                        <li class="nav-item dropdown no-arrow mx-1 topmenu_bo_desktop">
                            <a class="nav-link dropdown-toggle" href="{{ route('user.bibliotheque.index') }}" target="_blank" id="alertsDropdown" role="button">
                                Entreprises
                            </a>
                        </li>

                                

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow topmenu_bo_mobile">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <button id="sidebarToggleTop" class="btn btn-link  " >
                                    <i class="fa fa-bars" style="color:#EE6E49"></i>
                                </button>
                            
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              

                                
                                <a class="dropdown-item" href="{{route('welcome')}}" target="_blank" title="">   <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Accueil</a>							
                          
                                <a class="dropdown-item"  href="{{ route('offres_emplois') }}" target="_blank">   <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Offres d'emploi</a>
                            
                        
                                <a class="dropdown-item"  href="{{ route('qui_sommes_nous') }}" target="_blank"  title="">   <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Qui sommes nous ?</a>
                          
                           
                                <a class="dropdown-item" href="{{ route('blog.index') }}" target="_blank" title="">   <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Articles</a>
                           
                         
                                {{-- <a class="dropdown-item" href="{{ route('user.bibliotheque.index') }}" target="_blank" title="">   <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Entreprises</a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->