
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
								<li class="slideDashboard"><img src="{{asset('images/header/header03.png')}}" alt="" /></li>
								{{-- <li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li>
								<li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li> --}}
							</ul>
							<div class="job-search-sec" style="margin-bottom: ">
								<div class="job-search style2">
									<h3>Etudiant(e) ou jeune diplômé(e): trouve ton job en Afrique !</h3>
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
													<a href="#" title="">
														<i class="la la-bullhorn"></i>
														<span>Art & Multimédia</span>
														<p>(22 offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-graduation-cap"></i>
														<span>Informatique</span>
														<p>(06 offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-line-chart "></i>
														<span>Finance & Comptabilité</span>
														<p>(03 offres)</p>
													</a>
												</div><!-- Quick Select -->
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3">
												<div class="quick-select">
													<a href="#" title="">
														<i class="la la-users"></i>
														<span>Ressources humaines</span>
														<p>(03 offres)</p>
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
											<a  href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" title="">
												<div class="c-logo"> <img src="{{asset(($offre->user->photo_profile != null) ? asset('images/photo_profil/'.$offre->user->photo_profile) : asset('images/profil/profil_entreprise.png'))}}" width="115px" height="120px"  alt="" /> </div>
												<h3><a href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" >{{$offre->poste}}</a></h3>
												<span><a href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" >{{$offre->nom_entreprise == null ? $offre->user->nom : $offre->nom_entreprise}} &nbsp; </a></span>
												<span class="fav-job"><i class="la la-heart-o"></i></span>
											</a>
										</div>
										<span class="job-lctn"><a  href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" title="">{{$offre->ville}}, {{$offre->pays}}</a></span>
									<a  href="{{route('postuler.create', Crypt::encrypt($offre->id))}}" title="">POSTULER</a>
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

	<!--
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Comment ça marche ?</h2>
							{{-- <span>Each month, more than 7 million Jobhunt turn to website in their search for work, making over <br />160,000 applications every day. --}}
							</span>
						</div>
						<div class="how-to-sec">
							<div class="how-to">
								<span class="how-icon"><i class="la la-user"></i></span>
								<h3>Creéz votre compte</h3>
								{{-- <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p> --}}
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-file-archive-o"></i></span>
								<h3>Recherchez un emploi selon vos critères</h3>
								{{-- <p>Browse profiles, reviews, and proposals then interview top candidates. </p> --}}
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-list"></i></span>
								<h3>Postulez</h3>
								{{-- <p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
-->
	{{-- <section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Top entreprises qui nous font confiance</h2>
						</div><!-- Heading -->
						<div class="top-company-sec">
							<div class="row" id="companies-carousel">
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="https://equipagetraining.fr/wp-content/uploads/2018/03/logo-sg-c.jpg" alt="" />
										<h3><a href="#" title="">Société générale</a></h3>
										<span>Libreville, GABON</span>
										<a href="#" title="">5 offres</a>
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="https://equipagetraining.fr/wp-content/uploads/2018/03/logo-sg-c.jpg" alt="" />
										<h3><a href="#" title="">Société générale</a></h3>
										<span>Libreville, GABON</span>
										<a href="#" title="">5 offres</a>
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="https://equipagetraining.fr/wp-content/uploads/2018/03/logo-sg-c.jpg" alt="" />
										<h3><a href="#" title="">Société générale</a></h3>
										<span>Libreville, GABON</span>
										<a href="#" title="">5 offres</a>
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="https://equipagetraining.fr/wp-content/uploads/2018/03/logo-sg-c.jpg" alt="" />
										<h3><a href="#" title="">Société générale</a></h3>
										<span>Libreville, GABON</span>
										<a href="#" title="">5 offres</a>
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="https://equipagetraining.fr/wp-content/uploads/2018/03/logo-sg-c.jpg" alt="" />
										<h3><a href="#" title="">Société générale</a></h3>
										<span>Libreville, GABON</span>
										<a href="#" title="">5 offres</a>
									</div><!-- Top Company -->
								</div>
						
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section> --}}

	{{-- <section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1920x1000) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color red"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Nos Statistiques</h2>
						</div><!-- Heading -->
						<div class="stats-sec">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span>300</span>
										<h5>Offres postées</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span>700</span>
										<h5>Candidatures</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span>67</span>
										<h5>Entreprises</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span>92</span>
										<h5>Membres</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

	{{-- <section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Témoignages</h2>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews">
							<div class="col-lg-12">
								<div class="reviews style2">
									<img src="https://test-orientation.studyrama.com/img/profiles/etudiant.svg" alt="" />
									<h3>Thomas PONS <span>Web designer</span></h3>
									<p>J'ai trouvé un emplois grâce à studafrik. je suis très heureux</p>
								</div><!-- Reviews -->
							</div>

							<div class="col-lg-12">
								<div class="reviews style2">
									<img src="https://test-orientation.studyrama.com/img/profiles/etudiant.svg" alt="" />
									<h3>Thomas PONS <span>Web designer</span></h3>
									<p>J'ai trouvé un emplois grâce à studafrik. je suis très heureux</p>
								</div><!-- Reviews -->
							</div>
							<div class="col-lg-12">
								<div class="reviews style2">
									<img src="https://test-orientation.studyrama.com/img/profiles/etudiant.svg" alt="" />
									<h3>Thomas PONS <span>Web designer</span></h3>
									<p>J'ai trouvé un emplois grâce à studafrik. je suis très heureux</p>
								</div><!-- Reviews -->
							</div>
							<div class="col-lg-12">
								<div class="reviews style2">
									<img src="https://test-orientation.studyrama.com/img/profiles/etudiant.svg" alt="" />
									<h3>Thomas PONS <span>Web designer</span></h3>
									<p>J'ai trouvé un emplois grâce à studafrik. je suis très heureux</p>
								</div><!-- Reviews -->
							</div>
							
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section> --}}

	
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
										<a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title=""><img src="{{asset($article->image)}}" alt="" /></a>
										<div class="blog-date">
											<a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title="">{{$article->created_at->format('Y')}} <i>{{$article->created_at->format('d')}} {{$mois[$article->created_at->format('m') * 1]}}</i></a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="{{ route('article.show', Crypt::encrypt($article->id)) }}" title="">{{$article->titre}}</a></h3>
										{!! $article->description !!} ...
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
						<div class="comp-sec">
							<div class="company-img">
								<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
							</div><!-- Client  -->
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

