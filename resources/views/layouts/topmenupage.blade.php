<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		@yield('title')
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.css')}}" />
	<link rel="stylesheet" href="{{asset('css/icons.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
	<link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/colors/colors.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}" />
	
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
	<link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	{{-- <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet"> --}}
	<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
	
	@yield('jobposting')

</head>
<body>

	<style>
		a {
			color: #EE6E49;
		}
		a:hover {
    color: #EE6E49;
		}
	</style>
<div class="theme-layout" id="scrollup">
	<div class="responsive-header">
		<div class="responsive-menubar">
			<a href="{{ route('welcome')}}" title=""><img src="{{ asset('images/logo1.png') }}" width="150px" alt="" /></a>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="/images/icon.png" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="/images/icon2.png" alt="" /> Fermer
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				{{-- <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Ajouter une offre</a> --}}
				<ul class="account-btns">
					@if(Auth::check())
					<li >	<a title="" href="{{route('dashboard')}}"><i class="la la-user"></i> Mon compte</a></li>
					
					@else
					<li >	<a title="" href="{{route('register')}}"><i class="la la-key"></i> S'inscrire</a></li>
					<li ><a title="" href="{{route('login')}}"><i class="la la-external-link-square"></i> Se connecter</a></li>
					@endif
				</ul>
			</div><!-- Btn Extras -->
			{{-- <form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form> --}}
			<div class="responsivemenu">
				<ul>
						<li class="menu-item">
							<a href="{{ route('welcome') }}" title="">Accueil</a>							
						</li>
						<li class="menu-item">
							<a href="{{ route('offres_emplois') }}" title="">Offres d'emploi</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('qui_sommes_nous') }}" title="">Qui sommes nous ?</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('blog.index') }}" title="">Articles</a>
						</li>
						{{-- <li class="menu-item">
							<a href="{{ route('user.bibliotheque.index') }}" title="">Entreprises</a>
						</li> --}}
					
					</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="logo" style="margin-left:60px">
				<a href="{{ route('welcome')}}" title=""><img src="{{ asset('images/logo1.png') }}" width="150px"  alt="" /></a>
			</div>
			<div class="container">
				
				
				<!-- Logo -->
				<div class="btn-extars">
					{{-- <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Ajouter une offre</a> --}}
					<ul class="account-btns">
						@if(Auth::check())
						<li >	<a title="" href="{{route('dashboard')}}"><i class="la la-user"></i> Mon compte</a></li>
						
						@else
						<li >	<a title="" href="{{route('register')}}"><i class="la la-key"></i> S'inscrire</a></li>
						<li ><a title="" href="{{route('login')}}"><i class="la la-external-link-square"></i> Se connecter</a></li>
						@endif
					</ul>
				</div><!-- Btn Extras -->
				<nav>
			        <ul>
						<li class="menu-item">
							<a href="{{ route('welcome') }}" title="">Accueil</a>							
						</li>
						<li class="menu-item">
							<a href="{{ route('offres_emplois') }}" title="">Offres d'emploi</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('qui_sommes_nous') }}" title="">Qui sommes nous ?</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('blog.index') }}" title="">Articles</a>
						</li>
						{{-- <li class="menu-item">
							<a href="{{ route('user.bibliotheque.index') }}" title="">Entreprises</a>
						</li> --}}
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>