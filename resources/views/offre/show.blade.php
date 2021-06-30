@section('title') 
{{$offre->titre}}
@endsection
@include('layouts.topmenupage')

	<section class="overlape">
		<div class="block no-padding gray">
			<div class="container ">
				<div class="row">

						<div class="col-lg-12">
							<div class="inner2" style="text-align: center; ">
								<div class="inner-title2">
									<h3>Postulez à cette offre</h3> <br><br>
								</div>
							
							</div>
						</div>
				
				</div>
			</div>
		</div>
	</section>


	<section style="margin-top: 20px">
		<div class="block">
	
			<div class="container">
				<div class="row"  style="margin-bottom: 20px;  ">
					<div class="col-10">
					<p> <a  href="{{route('offres_emplois')}}"  style=" color:rgb(82, 4, 108); ">  << Retour aux offres</a> </p> 

					</div>
				</div>
				<div class="row">
					
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
								 <div class="job-title2">
								 
								 <div class="row">
									 <div class="col-12">
										<h3>{{$offre->titre}}</h3>
									 
									 </div>
									 
									 <div class="col-12">
										<span class="job-is fl">{{$offre->type_contrat}}</span> 
									 
									 </div>
								 </div>
									 
									 
									
								</div>
							
							
								<br>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i> {{$offre->ville}}, {{$offre->pays}}</li>
								@if($offre->experience != null)	<li><i class="la la-money"></i> Expérience requise: <span> {{$offre->experience}} ans</span></li> @endif
				 				@if($offre->salaire != null)	<li><i class="la la-money"></i> Salaire: <span>{{$offre->salaire}} - {{$offre->devise_salaire}}</span></li> @endif
									 <li><i class="la la-calendar-o"></i> Posté le {{$offre->created_at->format('d/m/Y')}} </li>
								@if($offre->date_expiration != null)	 <li><i class="la la-calendar-o"></i> date d'expiration: {{$offre->date_expiration->format('d/m/Y')}} </li> @endif
									 
				 				</ul>
				 				{{-- <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span> --}}
							 </div><!-- Job Head -->
							 
							 {{-- @if (session('ok'))
								<div class="alert alert-success">
									<ul>
										<li>{{ session('ok') }}</li>
										
									</ul>
								</div>
							@endif --}}


				 			<div class="job-details">
				 				<h3>Description de l'offre</h3>
								 
								<p>{!! $offre->description !!}</p>
								
								 <h3>Profil et compétences recherchés</h3>
				 					<p>{!! $offre->description_profil!!}</p>
								 


				 				{{-- <h3>Profil recherché</h3>
				 				<p>{!! $offre->description_profil!!}</p> --}}
				 			</div>
				 			
				 			<div class="share-bar">
				 				{{-- <span>Partager</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a> --}}
				 			</div>
				 		</div>
					 </div>
					 


				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb" style="margin-bottom: 35px"> 
								@if($offre->photo_recruteur != null )
                                    
								<img src="{{ asset('images/photo_recruteur/'.$offre->photo_recruteur) }}" width="250px" height="250px"  title="{{$offre->slug}}"  alt="{{$offre->slug}}" /> </div>

								@else 
								<img height="250px" width="250px" src="{{($offre->user->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. $offre->user->photo_profile) }}" alt="@lang('Photo de profil')" /> </div>
								@endif
							 <h4> @if($offre->nom_entreprise != null) {{$offre->nom_entreprise}} @else {{$offre->user->nom}} @endif</h4> <br>
							 @if($offre->user->site_web != null)
							 <p><i class="la la-unlink"></i>{{$offre->user->site_web}}</p>
							 @endif
						
								@if($offre->date_expiration->format('Y-m-d') < date("Y-m-d"))
								
											@if($deja_postuler == true )
												<span style="color:#d60004; font-size:18px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif
											
											
									<br> <span style="color:#d60004; font-size:18px;">L'offre a expiré</span> <br>
								@else 
									@if(Auth::check())
										@if(Auth::user()->role == "candidat") 
											@if($deja_postuler == false )
										
													<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
											
											
											@elseif($deja_postuler == true )
												<span style="color:#d60004; font-size:18px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif

										@endif
									@else 
												<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
									
									@endif

								@endif



							
							 {{-- <div class="job-head-info "> --}}
					
								 {{-- <span>274 Seven Sisters Road, London, N4 2HY</span> --}}
								
			 					{{-- <p><i class="la la-phone"></i> {{$offre->user->contact}}</p>
			 					<p><i class="la la-envelope-o"></i>{{$offre->user->email}}</p> --}}
			 					<br>
								 {{-- <p> --}}
									@if($est_candidat == true)
										@if($est_favoris == false)
										<a   href="{{route('favoris.offre',[Auth::user()->id, $offre->id])}}" style="background: #323232; width: 190px"  class="viewall-jobs"><i class="la la-paper-plane"></i> Sauvegarder cette offre</a>

										@else 
										<a class=" btn btn-warning"  href="#" style="color:rgb(58, 3, 3); font-size:17px; width: 190px" title=""><i class="la la-check"></i> Offre sauvegardée</a>
										@endif
									@endif
								 {{-- </p> --}}
							 {{-- </div> --}}
							 
							

							@if($offre->user->role == "recruteur")
			 				 <br> <a href="{{ route('user.bibliotheque.show',Crypt::encrypt($offre->user->id) ) }}" title="" style="background: #323232; width: 190px"  class="viewall-jobs">Découvrir l'entreprise</a> <br>
							 
						@endif
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

	@section('js-content')
	<script>
		function rtn() {
		   window.history.back();
		}
		</script>
	@endsection
	@include('layouts.footer')

