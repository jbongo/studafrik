@section('title') 
{{$offre->titre}}
@endsection


@section('jobposting') 




<script type="application/ld+json">
    {
      "@context" : "https://schema.org/",
      "@type" : "JobPosting",
      "title" : "{{$offre->titre}}",
      
      "experienceRequirements" : {
        "@type" : "OccupationalExperienceRequirements",
        "monthsOfExperience" : "unavailable"
      },
      "description" : "{{$offre->description}}",
      "identifier": {
        "@type": "PropertyValue",
        "name": "{{$offre->nom_entreprise}}",
        "value": "{{$offre->id}}"
      },
      "datePosted" : "{{$offre->created_at->format('Y-m-d')}}",
      "validThrough" : @if($offre->date_expiration != null) "{{$offre->date_expiration->format('Y-m-d')}}" @else  "unavailable" @endif,
      "employmentType" : "{{$offre->type_contrat}}",
      "hiringOrganization" : {
        "@type" : "Organization",
        "name" : "{{$offre->nom_entreprise}}",
        "sameAs" : "studafrik.com",
        "logo" : "{{asset('images/logo1.png')}}"
      },
      "jobLocation": {
        "@type": "Place",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{$offre->ville}}", 
        "addressLocality": "{{$offre->ville}}",
        "addressRegion": "{{$offre->ville}}",
        "postalCode": "unavailable", 
        "addressCountry": "{{$offre->pays}}"
        }
      }

     ,
"baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "{{$offre->devise_salaire != null ? $offre->devise_salaire : 'unavailable' }}",
        "value": {
          "@type": "QuantitativeValue",
          "value": {{$offre->salaire != null ? $offre->salaire : 'unavailable' }},
          "unitText": "MONTH"
        }
      }

    }
    </script>
@endsection



@include('layouts.topmenupage')

	<section class="overlape">
		<div class="block no-padding gray">
			<div class="container ">
				<div class="row">

						<div class="col-lg-12">
							<div class="inner2" style="text-align: center; ">
								<div class="inner-title2">
									<h4 style="color:#EE6E49; font-weight:bold">Postulez à cette offre</h4> <br><br>
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
										<h4>{{$offre->titre}}</h4>
									 
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
				 				<h3 style="color:#EE6E49">Description de l'offre</h3>
								 
								<p>{!! $offre->description !!}</p>
								
								 <h3 style="color:#EE6E49">Profil et compétences recherchés</h3>
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
			 				<div class="job-thumbx" style="margin-bottom: 35px"> 
								@if($offre->photo_recruteur != null )
                                    
								<img src="{{ asset('images/photo_recruteur/'.$offre->photo_recruteur) }}" width="250px" height="250px"  title="{{$offre->slug}}"  alt="{{$offre->slug}}" /> </div>

								@else 
								<img height="250px" width="250px" src="{{($offre->user->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. $offre->user->photo_profile) }}" alt="@lang('Photo de profil')" /> </div>
								@endif
							 <h5> @if($offre->nom_entreprise != null) {{$offre->nom_entreprise}} @else {{$offre->user->nom}} @endif</h5> <br>
							 @if($offre->user->site_web != null)
							 <p><i class="la la-unlink"></i>{{$offre->user->site_web}}</p>
							 @endif
						
								@if($offre->date_expiration != null && $offre->date_expiration->format('Y-m-d') < date("Y-m-d"))
								
											@if($deja_postuler == true )
												<span style="color:#d60004; font-size:16px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif
											
											
									<br> <span style="color:#d60004; font-size:16px;">L'offre a expiré</span> <br>
								@else 
									@if(Auth::check())
										@if(Auth::user()->role == "candidat") 
											@if($deja_postuler == false )
										
													<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 150px;" class="apply-job-btn">Postuler</a>
											
											
											@elseif($deja_postuler == true )
												<span style="color:#d60004; font-size:16px;">Vous avez déjà postulé à cette offre</span> <br>
											@endif

										@endif
									@else 
												<a href="{{ route('postuler.create', Crypt::encrypt($offre->id)) }}" title="" style="width: 150px;" class="apply-job-btn">Postuler</a>
									
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
										<a style="background: #EE6E49; width: 190px"  class="viewall-jobs" href="#"  title=""><i class="la la-check"></i> Offre sauvegardée</a>
										@endif
									@endif
								 {{-- </p> --}}
							 {{-- </div> --}}
							 
							

							@if($offre->user->role == "recruteur")
			 				 <br> <a href="{{ route('user.bibliotheque.show',Crypt::encrypt($offre->user->id) ) }}" title="" style="background: #323232; width: 190px"  class="viewall-jobs">Découvrir l'entreprise</a> <br>
							@endif
						
			 		</div><!-- Job Head -->




				 	</div>



					 <div class="row">
						 <div class="col-lg-8">
							 
						 <div class="recent-jobs">
							



							<div class="job-details">
								<h3 style="color:#EE6E49">Offres du même pays</h3>
								
							  
							</div>





							<div class="job-list-modern">

								@foreach ($offrescategories as $offrecat)

								<div class="job-listings-sec no-border">
								   <div class="job-listing wtabs">
									   <div class="job-title-sec">
										   <div class="c-logo"> 
											@if($offrecat->photo_recruteur != null )
												
												<img  src="{{ asset('images/photo_recruteur/'.$offrecat->photo_recruteur) }}" width="110px" height="100px"  title="{{$offrecat->slug}}"  alt="{{$offrecat->slug}}" /> </div>
										
												@else 
										
													<img src="{{ ($offrecat->user->photo_profile != null) ? asset('images/photo_profil/'.$offrecat->user->photo_profile) : asset('images/profil/profil_entreprise.png') }}" width="110px" height="100px"  title="{{$offrecat->slug}}"  alt="{{$offrecat->slug}}" /> </div>
										
												@endif

											<h3><a href="{{route('mes_offres.show', $offrecat->slug )}}" title="">{{$offrecat->titre}}</a></h3>
										   
										   <div class="job-lctn"><i class="la la-map-marker"></i>{{ $offrecat->ville }}, {{ $offrecat->pays }}</div>
									   </div>
									   <div class="job-style-bx">
										   
										   <span class="job-is ft">{{ $offrecat->type_contrat }}</span>
										  
											   @php 
												$duree = date_diff(date_create(date('Y-m-d')) ,date_create($offrecat->created_at->format('Y-m-d')) ); 
											@endphp 
									
									
											@if($duree->days == 0)
												<i>Publiée Aujourd'hui </i>
											@elseif($duree->days == 1)
												<i>Publiée Hier </i>
											@else 
												<i>Publiée Il y'a {{$duree->days}} jours</i>
									
											@endif

									   </div>
								   </div>
							</div>
								   @endforeach
							
							   </div>
						 </div>
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

