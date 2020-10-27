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
				 			<div class="job-details">
                         
                                
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
			 				<a href="{{ route('offres_emplois') }}" title="" class="viewall-jobs">Consulter les offres</a>
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>

	
	@include('layouts.footer')