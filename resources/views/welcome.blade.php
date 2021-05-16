
@include('layouts.topmenuhome')

<style>
	h2 {
        font-family: 'Montserrat';
		color: #EB586C;
    }
</style>
<div class="page-loading">
	<img src="images/loader1.gif" alt="" />
	<span>passer le chargement</span>
</div>
	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideDashboard"><img src="{{asset("images/header/sud'afrik recherche d'emploi.png")}}" alt="" /></li>
								{{-- <li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li>
								<li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li> --}}
							</ul>
							<div class="job-search-sec" style="margin-bottom: ">
								<div class="job-search style2">
									<h1 style="color: #ffffff;float: left;width: 100%;font-family: Quicksand;font-size: 40px;font-weight: bold;letter-spacing: 0px;text-align: center;line-height: 39px;margin-bottom: 13px;">Etudiant(e) ou jeune diplômé(e): trouve ton job en Afrique !</h1>
									{{-- <span>Find Jobs, Employment & Career Opportunities</span> --}}
									<div class="search-job2">	
										<form action="{{ route('recherche_emplois') }}" method="get">

											@csrf
											<div class="row no-gape">
												<div class="col-lg-4 col-md-3 col-sm-4">
													<div class="job-field">
														<input type="text" name="poste" placeholder="Mots clés" />
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-4">
													<div class="job-field">
														<select data-placeholder="Tous les pays" name="pays" class="chosen-city">
															<option value="">Tous les pays</option>															
															@foreach ($pays as $pay )
																<option value="{{$pay->nom}}">{{$pay->nom}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-4">
													<div class="job-field">
														<select data-placeholder="Toutes les catégories" name="categorie" class="chosen-city">
															<option value="">Toutes les catégories</option>
														
		
															@foreach ($categories as $categorie )
																<option value="{{$categorie->id}}">{{$categorie->nom}}</option>
															@endforeach
															
														</select>
													</div>
												</div>
												<div class="col-lg-2  col-md-3 col-sm-12">
													<button type="submit"> Rechercher<i class="la la-search"></i></button>
												</div>
											</div>
										</form>
									</div><!-- Job Search 2 -->


									<div class="quick-select-sec">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="/recherche-emplois?&poste=&categorie=17" title="">
														<i class="la la-bullhorn"></i>
														<span>   Publicité / Marketing / Agence  </span>
														<p>({{$nb_offre_pub}} offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="/recherche-emplois?&poste=&categorie=9" title="">
														<i class="la la-graduation-cap"></i>
														<span>   Education / Formation / Recrutement  </span>
														<p>({{$nb_offre_education}} offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="/recherche-emplois?&poste=&categorie=5" title="">
														<i class="la la-line-chart "></i>
														<span>   Banques / Assurances / Finance </span>
														<p>({{$nb_offre_banque}} offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="/recherche-emplois?&poste=&categorie=13" title="">
														<i class="la la-users"></i>
														<span>Industrie</span>
														<p>({{$nb_offre_industrie}} offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
										</div>
									</div>
									

								</div>
							
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray">
			<div class="container">
				<br>
								<br>
								<br>
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2 style=" font-family: 'Montserrat">Offres récentes</h2>
							{{-- <span>Leading Employers already using job and talent.</span> --}}
						</div><!-- Heading -->
						<div class="job-grid-sec">
							<div class="row">
							@foreach ($offres as $offre )
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="job-grid">
										<div class="job-title-sec">
											<a  href="{{route('mes_offres.show', $offre->slug )}}" title="">
												<div class="c-logo"> 
												@if($offre->photo_recruteur != null )
								
												<img src="{{ asset('images/photo_recruteur/'.$offre->photo_recruteur) }}" width="115px" height="120px"  title="{{$offre->slug}}"  alt="{{$offre->slug}}" /> </div>
			
												@else 
												<img src="{{asset(($offre->user->photo_profile != null) ? asset('images/photo_profil/'.$offre->user->photo_profile) : asset('images/profil/profil_entreprise.png'))}}" width="115px" height="120px" title="{{$offre->slug}}"  alt="{{$offre->slug}}" /> </div>
												
												@endif
													<h3 style="color:#323232 ">{{ $offre->titre }}</h3>
												
												<h3><a href="{{route('mes_offres.show', $offre->slug )}}" >{{$offre->poste}}</a></h3>
												<span><a href="{{route('mes_offres.show', $offre->slug )}}" >{{$offre->nom_entreprise == null ? $offre->user->nom : $offre->nom_entreprise}} &nbsp; </a></span>
												<span class="fav-job"><i class="la la-heart-o"></i></span>
											</a>
										</div>
										<span class="job-lctn"><a  href="{{route('mes_offres.show', $offre->slug )}}" title="">{{$offre->ville}}, {{$offre->pays}}</a></span>
									<a  href="{{route('postuler.create', $offre->slug)}}" title="">POSTULER</a>
									</div><!-- JOB Grid -->
								</div>
							@endforeach
								
								
								
							
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="{{route('offres_emplois')}}" title="" class="style2">Voir toutes les offres</a>
						</div>
					</div>
				</div>
				
				<br>
				<br>
				<br>

			</div>
		</div>
	</section>


	
	<section >
		<div class="block" >
			<div data-velocity="-.1" style="background-color:#323232" class="parallax scrolly-invisible  color "></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row" style="margin-bottom: 100px">
					<div class="col-lg-12">
						<div class="heading light">
							<br><br>
							<h2>Nos derniers articles</h2>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews-carousel">

							@php 
								$mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
							@endphp
		
							@foreach ($articles as $article )

							<div class="col-lg-4 col-md-4 col-sm-3">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title=""><img src="{{asset($article->image)}}" height="250px" title="{{$article->slug}}"  alt="{{$article->slug}}" /></a>
										<div class="blog-date">
											<a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title="">{{$article->created_at->format('Y')}} <i>{{$article->created_at->format('d')}} {{$mois[$article->created_at->format('m') * 1]}}</i></a>
										</div>
									</div>
									@php  
										$description = strip_tags($article->description) ;
									@endphp
									<div class="blog-details">
										<h3><a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title="">{{$article->titre}}</a></h3>
										{!! substr($description,0,100) !!} ...
										<a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title="">lire la suite<i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>

							
							
							@endforeach
							
					
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>


	
	<section style="margin-top: 100px">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Ils recrutent</h2>
							{{-- <span>Certaines des entreprises que nous avons aidé à recruter d'excellents candidats.</span> --}}
						</div><!-- Heading -->
						<div class="comp-sec" style="margin-top: 50px">
							<div class="company-img col-lg-3 col-sm-12 col-xs-12">
								<a href="#" title=""><img src="{{asset('images/entreprise/logo-total.png')}}" width="60%" height="80px" alt="total" /></a>
							</div><!-- Client  -->
							<div class="company-img col-lg-3 col-sm-12 col-xs-12">
								<a href="#" title=""><img src="{{asset('images/entreprise/perenco.jpg')}}" width="60%" height="80px" alt="perenco" /></a>
							</div><!-- Client  -->
							<div class="company-img col-lg-3 col-sm-12 col-xs-12">
								<a href="#" title=""><img src="{{asset('images/entreprise/intelcia.jpg')}}" width="60%" height="80px" alt="intelcia" /></a>
							</div><!-- Client  -->
							<div class="company-img col-lg-3 col-sm-12 col-xs-12">
								<a href="#" title=""><img src="{{asset('images/entreprise/societe.png')}}" width="60%" height="80px" alt="societe" /></a>
							</div><!-- Client  -->
							
							<div class="company-img col-lg-3 col-sm-12 col-xs-12">
								<a href="#" title=""><img src="{{asset('images/entreprise/canal.jpg')}}" width="60%" height="80px" alt="canal-plus" /></a>
							</div><!-- Clientx  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section style="margin-top: 100px">
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="subscription-sec"><br>
							<br>
							<br>
							<div class="row">
								
								<div class="col-lg-6">
									<h3>Souscrivez à notre Newsletter</h3>
									<span>Laissez nous votre adresse mail</span>
								</div>
								<div class="col-lg-6">
									<form>
										<input type="text" placeholder="Entrez votre email" />
										<button type="submit"><i class="la la-paper-plane"></i></button>
									</form>
								</div>
							</div>
							<br>
								<br>
								<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="social-links">
							<br><br>
							<a href="https://www.facebook.com/Studafrik/" title="" class="fb-colorx"><i class="fa fa-facebook"></i> Facebook</a>
							<a href="https://twitter.com/studafrik?lang=fr" title="" class="tw-colorx"><i class="fa fa-twitter"></i> Twitter</a>
							<a href="https://www.instagram.com/studafrik/?hl=fr" title="" class="in-colorx"><i class="la la-instagram"></i> Instagram</a>
							<a href="https://www.linkedin.com/company/stud-afrik/" title="" class="lk-colorx"><i class="la la-linkedin"></i> Linkedin</a>
<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@include('layouts/footer')

