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


	<section style="margin-top: 55px">>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
				 				<div class="job-title2"><h3>{{$offre->titre}}</h3><span class="job-is ft">{{$offre->type_contrat}}</span></div>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i> {{$offre->ville}}, {{$offre->pays}}</li>
				 					<li><i class="la la-money"></i> Salaire  : <span>{{$offre->salaire}} - {{$offre->devise_salaire}}</span></li>
									 <li><i class="la la-calendar-o"></i> Postée le : {{$offre->created_at->format('d/m/Y')}} </li>
									 
				 				</ul>
				 				{{-- <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span> --}}
				 			</div><!-- Job Head -->
				 			<div class="job-details" style="margin-bottom: 50px">
                         
                            @if($offre->message_candidature == null )
                            
                                @if($offre->candidater_lien == "Non")
	                                <form enctype="multipart/form-data" action="{{ route('postuler.store',$offre->id ) }}" method="POST">
	
	                                    @csrf
	                                    <div class="row">
	                                        <div class="col-lg-12">
	                                            <span class="pf-title">Ajoutez votre CV *</span>
	                                            <div class="pf-field">
	                                                <input type="file"  name="cv_fichier" placeholder="" required/>
	                                            </div>
	                                        </div>
	
	
	                                        <div class="col-lg-12">
	                                            <input type="radio" id="cv_profil" name="cv_profil" value="true">
	                                            <label for="cv_profil">Ou postulez avec votre profil</label><br>
	                                        </div>
	                                     
	                                       
	                                        
	                                        
	
	                                        <div class="col-lg-12">
	                                            <span class="pf-title">Ajoutez votre lettre de motivation</span>
	                                            <div class="pf-field">
	                                                <textarea name="lettre_motivation" ></textarea>
	                                            </div>
	                                        </div>
	                                        
	
	
	                                        <div class="col-lg-12">
	                                            <button type="submit" class="apply-job-btn" > <i class="la la-paper-plane"></i>POSTULER</button>
	                                        </div>
	                                        
	
	                                    </div>
	
									</form>
									@endif
							@else 

							{!!$offre->message_candidature!!}

							@endif	
							
							
							
							@if($offre->candidater_lien == "Oui") 
							<a href="{{$offre->url_candidature}}" title="" style="width: 190px;" class="apply-job-btn">Postuler</a>
							
							
							@endif



				 			</div>
				 			
				 			<div class="share-bar">
				 				{{-- <span>Partager</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a> --}}
				 			</div>
				 			
				 		</div>
					 </div>
					 


				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"><img height="124px" width="124px" src="{{($offre->user->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. $offre->user->photo_profile) }}" alt="@lang('Photo de profil')" />  </div>
			 				<div class="job-head-info">
							 <h4> @if($offre->user->nom) {{$offre->user->nom}} @else {{$offre->nom_entreprise}} @endif</h4>
			 					{{-- <span>274 Seven Sisters Road, London, N4 2HY</span> --}}
			 					@if($offre->user->site_web)<p><i class="la la-unlink"></i>{{$offre->user->site_web}}</p>@endif
			 					@if($offre->user->contact)<p><i class="la la-phone"></i> {{$offre->user->contact}}</p>@endif
			 					@if($offre->user->email && $offre->user->role != "admin")<p><i class="la la-envelope-o"></i>{{$offre->user->email}}</p>@endif
			 				</div>
			 				<a href="{{ route('offres_emplois') }}" title="" class="viewall-jobs">Consulter les offres</a>
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

	
	@include('layouts.footer')