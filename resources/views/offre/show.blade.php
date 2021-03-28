@include('layouts.topmenupage')

	<section class="overlape">
		<div class="block no-padding gray">
			<div class="container ">
				<div class="row">

						<div class="col-lg-12">
							<div class="inner2" style="text-align: center; margin:-25px">
								<div class="inner-title2">
									<h3>Postulez à cette offre</h3> <br><br>
								</div>
							
							</div>
						</div>
				
				</div>
			</div>
		</div>
	</section>


	<section style="margin-top: 1px">
		<div class="block">
				<div class="row"  style="margin-bottom: 20px; margin-left: ">
					<div class="col-5">
					{{-- <p> <a  href="{{route('offres_emplois')}}"  style=" color:rgb(82, 4, 108); ">  << Retour aux offres</a> </p>  --}}

					</div>
				</div>
			<div class="container">
				<div class="row"  style="margin-bottom: 20px; margin-left: ">
					<div class="col-5">
					<p> <a  href="{{route('offres_emplois')}}"  style=" color:rgb(82, 4, 108); ">  << Retour aux offres</a> </p> 

					</div>
				</div>
				<div class="row">
					
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
								 <div class="job-title2">
									 <h3>{{$offre->titre}}</h3><span class="job-is fl">{{$offre->type_contrat}}</span> 
									
								</div>
							
							
								<br>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i> {{$offre->ville}}, {{$offre->pays}}</li>
				 					<li><i class="la la-money"></i> Salaire : <span>{{$offre->salaire}} - {{$offre->devise_salaire}}</span></li>
									 <li><i class="la la-calendar-o"></i> Posté le : {{$offre->created_at->format('d/m/Y')}} </li>
									 
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
			 				<div class="job-thumb" style="margin-bottom: 55px"> <img height="124px" width="124px" src="{{($offre->user->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. $offre->user->photo_profile) }}" alt="@lang('Photo de profil')" /> </div>
			 				
						
								@if($offre->date_expiration->format('Y-m-d') < date("Y-m-d"))
								
											@if($deja_postuler == true )
												<span style="color:#d60004; font-size:18px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif
											
											
									<br> <span style="color:#d60004; font-size:18px;">L'offre a expiré</span> <br>
								@else 
									@if(Auth::check())
										@if(Auth::user()->role == "candidat") 
											@if($deja_postuler == false )
												@if($offre->candidater_lien == "Non")
													<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
												@else

												<a href="{{$offre->url_candidature}}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>

												@endif
											
											@elseif($deja_postuler == true )
												<span style="color:#d60004; font-size:18px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif

										@endif
									@else 

											@if($offre->candidater_lien == "Non")
												<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
											@else
												<a href="{{$offre->url_candidature}}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
											@endif

									
									@endif

								@endif



							
							 <div class="job-head-info">
					
							 <h4> {{$offre->user->nom}}</h4>
								 {{-- <span>274 Seven Sisters Road, London, N4 2HY</span> --}}
								 @if($offre->user->site_web != null)
								 <p><i class="la la-unlink"></i>{{$offre->user->site_web}}</p>
								 @endif
			 					{{-- <p><i class="la la-phone"></i> {{$offre->user->contact}}</p>
			 					<p><i class="la la-envelope-o"></i>{{$offre->user->email}}</p> --}}
			 					<br>
								 <p>
									@if($est_candidat == true)
										@if($est_favoris == false)
										<a class="btn btn-success" style="width: 190px" href="{{route('favoris.offre',[Auth::user()->id, $offre->id])}}" title=""><i class="la la-paper-plane"></i> Sauvegarder cette offre</a>
										@else 
										<a class=" btn btn-warning"  href="#" style="color:rgb(58, 3, 3); font-size:17px; width: 190px" title=""><i class="la la-check"></i> Offre sauvegardée</a>
										@endif
									@endif
								 </p>
							 </div>
							 
							

					
			 				 <br> <a href="{{ route('user.bibliotheque.show',Crypt::encrypt($offre->user->id) ) }}" title="" style="background: #323232; width: 190px"  class="viewall-jobs">Découvrir l'entreprise</a> <br>
							 
						
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

