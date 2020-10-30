@include('layouts.topmenupage')

	<section class="overlape">
		<div class="block no-padding gray">
			<div class="container ">
				<div class="row">

						<div className="col-lg-12">
							<div className="inner2">
								<div className="inner-title2">
									<h3>Postulez à cette offre</h3> <br><br>
								</div>
							
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
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
				 				<div class="job-title2"><h3>{{$offre->titre}}</h3><span class="job-is ft">{{$offre->type_contrat}}</span><i class="la la-heart-o"></i></div>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i> {{$offre->ville}}, {{$offre->pays}}</li>
				 					<li><i class="la la-money"></i> Salaire mensuel : <span>{{$offre->salaire_min}} - {{$offre->salaire_max}}</span></li>
									 <li><i class="la la-calendar-o"></i> Posté le : {{$offre->created_at->format('d/m/Y')}} </li>
									 
				 				</ul>
				 				{{-- <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span> --}}
							 </div><!-- Job Head -->
							 
							 @if (session('ok'))
								<div class="alert alert-success">
									<ul>
										<li>{{ session('ok') }}</li>
										
									</ul>
								</div>
							@endif


				 			<div class="job-details">
				 				<h3>Description de l'offre</h3>
								 
								<p>{{$offre->description}}</p>
								
								 <h3>Compétences et connaissances requises</h3>
				 					<p>{{$offre->competence_requise}}</p>
								 


				 				<h3>Profil recherché</h3>
				 				<p>{{$offre->description_profil}}</p>
				 			</div>
				 			
				 			<div class="share-bar">
				 				<span>Partager</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
				 			</div>
				 		</div>
					 </div>
					 


				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"> <img src="http://placehold.it/124x124" alt="" /> </div>
			 				<div class="job-head-info">
					
							 <h4> {{$offre->user->nom}}</h4>
			 					{{-- <span>274 Seven Sisters Road, London, N4 2HY</span> --}}
			 					<p><i class="la la-unlink"></i>{{$offre->user->site_web}}</p>
			 					<p><i class="la la-phone"></i> {{$offre->user->contact}}</p>
			 					<p><i class="la la-envelope-o"></i>{{$offre->user->email}}</p>
			 				</div>
			 				<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Postuler</a>
			 				<a href="{{ route('offres_emplois') }}" title="" class="viewall-jobs">Consulter les offres</a>
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

	
	@include('layouts.footer')