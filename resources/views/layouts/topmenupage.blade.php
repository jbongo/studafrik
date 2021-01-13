<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Studafrik</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.css')}}" />
	<link rel="stylesheet" href="{{asset('css/icons.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/colors/colors.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}" />
	

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	

    
	
</head>
<body>

<div class="theme-layout" id="scrollup">
	<div class="responsive-header">
		<div class="responsive-menubar">
			<a href="{{ route('welcome')}}" title=""><img src="{{ asset('images/logo.png') }}" width="120px" height="80px" alt="" /></a>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="images/icon.png" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="images/icon2.png" alt="" /> Fermer
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
						<li class="menu-item-has-children">
							<a href="{{ route('welcome') }}" title="">Accueil</a>							
						</li>
						<li class="menu-item">
							<a href="{{ route('offres_emplois') }}" title="">Offres d'emplois</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('qui_sommes_nous') }}" title="">Qui sommes nous ?</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('blog.index') }}" title="">Blog</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('nous_contacter') }}" title="">Nous contacter</a>
						</li>
					
					</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="{{ route('welcome')}}" title=""><img src="{{ asset('images/logo.png') }}" width="120px" height="80px" alt="" /></a>
				</div><!-- Logo -->
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
							<a href="{{ route('offres_emplois') }}" title="">Offres d'emplois</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('qui_sommes_nous') }}" title="">Qui sommes nous ?</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('blog.index') }}" title="">Blog</a>
						</li>
						<li class="menu-item">
							<a href="{{ route('nous_contacter') }}" title="">Nous contacter</a>
						</li>
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>