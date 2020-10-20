{{-- 
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Welcome Ali TUFAN</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">



                    @include('layouts.leftmenu')


                    <div class="col-lg-9 column">

                        @if (session('ok'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ session('ok') }}</strong>
                        </div>
                        @endif
                        <div class="padding-left">

                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                            <div class="profile-title">
                                @if(Auth::user()->profile_complete == true)
                                    <h3>Mon profile</h3>
                                @else 
                                <h2>Veuillez compléter votre profile pour continuer</h2>

                                @endif
                                <div class="upload-img-bar">
                                    <span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
                                    <div class="upload-info">
                                        <a href="#" title="">Téléverser</a>
					 					<span>Photo de couverture .jpg & .png</span>
                                    </div>
                                </div>
                                <div class="upload-img-bar">
                                    <span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
                                    <div class="upload-info">
                                        <a href="#" title="">Téléverser</a>
					 					<span>Photo de couverture .jpg & .png</span>
                                    </div>
                                </div>
                            </div>

                          
                            <div class="profile-form-edit">
                               
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Nom de l'entreprise</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="TOTAL GABON" value="{{ old('nom_entreprise') ? old('nom_entreprise') : Auth::user()->nom_entreprise  }}" name="nom_entreprise" class="form-control"/>
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-3">
                                        <span class="pf-title">Date de création</span>
                                        <div class="pf-field">
                                            <input type="date" placeholder="1991" value="{{ old('date_creation_entreprise') ? old('date_creation_entreprise') : Auth::user()->date_creation_entreprise  }}" name="date_creation_entreprise" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="pf-title">Nombre de salariés</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="100 - 201" value="{{ old('nb_salarie') ? old('nb_salarie') : Auth::user()->nb_salarie  }}" name="nb_salarie" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <span class="pf-title">Categories</span>
                                        <div class="pf-field">
                                            <textarea type="catégorie" class="form-control" value="{{ old('catégorie') ? old('catégorie') : Auth::user()->catégorie  }}" name="catégorie"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea type="description" class="form-control" value="{{ old('description') ? old('description') : Auth::user()->description  }}" name="description"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="social-edit">
                                <h3>Réseaux sociaux</h3>
                               
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span class="pf-title">Facebook</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.facebook.com/SG" value="{{ old('facebook') ? old('facebook') : Auth::user()->facebook  }}" name="facebook" class="form-control"/>
                                                <i class="la la-facebook"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Twitter</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.twitter.com/SG" value="{{ old('twitter') ? old('twitter') : Auth::user()->twitter  }}" name="twitter" class="form-control"/>
                                                <i class="la la-twitter"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Instagram</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.insta.com/SG" value="{{ old('instagram') ? old('instagram') : Auth::user()->instagram  }}" name="instagram" class="form-control"/>
                                                <i class="la la-instagram"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Linkedin</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.Linkedin.com/SG" value="{{ old('linkedin') ? old('linkedin') : Auth::user()->linkedin  }}" name="linkedin" class="form-control"/>
                                                <i class="la la-linkedin"></i>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                            <div class="contact-edit">
                                <h3>Contact</h3>
                                
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span class="pf-title">Numéro de téléphone</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="+290 538 963 " value="{{ old('contact1') ? old('contact1') : Auth::user()->contact1  }}" name="contact1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Email</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="demo@total.com" value="{{ old('contact2') ? old('contact2') : Auth::user()->contact2  }}" name="contact2" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span class="pf-title">Site web</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.total.com" class="form-control" value="{{ old('site_web') ? old('site_web') : Auth::user()->site_web  }}" name="site_web"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Pays</span>
                                            <div class="pf-field">
                                                <select data-placeholder="" class="chosen form-control" value="{{ old('pays') ? old('pays') : Auth::user()->pays  }}" name="pays">
                                                   <option>Gabon</option>
                                                   <option>Côte d'Ivoire</option>
                                                   <option>Ghana</option>
                                                   
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit">Enregistrer</button>
                                        </div>
                                    </div>
                                
                            </div>
                        </form>
                            <div class="contact-edit" id="pi">
                                <h3>Changement du mot de passe</h3>
                                <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Ancien mot de passe</span>
                                                <div class="pf-field">
                                                    <input type="password" class="form-control"/>
                                                </div>
                                                <span class="pf-title">Nouveau mot de passe</span>
                                                <div class="pf-field">
                                                    <input type="password" class="form-control"/>
                                                </div>
                                                <span class="pf-title">Confirmez le mot de passe</span>
                                                <div class="pf-field">
                                                    <input type="password" class="form-control"/>
                                                </div>
                                                <button type="submit">Modifier</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <i class="la la-key big-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                   </div>

                   
				 </div>
			</div>
		</div>
	</section>

	

</div>