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
			<div class="container-fluid">
				 <div class="row no-gapex">

                 

                        @include('layouts.leftmenu')
                    
                  
<div class="row">
                    <div class="col-10 column">

                        @if (session('ok'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ session('ok') }}</strong>
                        </div>
                        @endif
                        <div class="padding-left">

                          
                            <div class="profile-title">
                                @if(Auth::user()->profile_complete == true)
                                    <h3>Mon profil</h3>
                                @else 
                                <h2>Veuillez compléter votre profil pour continuer</h2>

                                @endif
                                <div class="row">
                                    <div class="col-6">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay" style="object-fit: cover;  width: 150px; height: 150px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{(Auth::user()->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. Auth::user()->photo_profile) }}" alt="@lang('Photo de profil')">
                                     
                                  
                                        <div class="upload-info">
                                            @if(Auth::user()->photo_profile == null )
                                                <div class="user-send-message upload-info"> <a href="#" title="" class="btn " id="modifPhoto">Téléverser</a> </div>
                                            @else 
                                                <div class="user-send-message upload-info"> <a href="#" title="" class="btn btn-danger " style="color:white;" id="modifPhoto">Modifier la photo</a> </div>
                                            
                                            @endif
                                            
                                            <span>Photo de profil .jpg & .png</span>
                                            
                                            <form action="{{ route('user.photo_profil') }}" method="post" enctype="multipart/form-data">
                                                @csrf  
                                                <input class="form-control" id="photobtn" type="hidden" accept="image/png, image/jpeg"  name="photo_profil" >
                                                @if ($errors->has('photo_profil'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('photo_profil')}}</strong> 
                                                    </div>
                                                    @endif
                                                <input class="form-control btn-danger"  id="valider" value="Enregistrer" type="hidden" name="submit">
                                            </form>
                                        </div>  
                                    </div>

                                </div>
{{-- 
                                <div class="row">
                                    <div class="col-7">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay2" style="object-fit: cover; width: 525px; height: 225px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{ (Auth::user()->photo_couverture == null ) ? asset('images/photo_couverture/couverture.jpg') :asset('images/photo_couverture/'. Auth::user()->photo_couverture) }}" alt="@lang('Photo de couverture')">
        <br>
                                        </div>

                                    </div>

                                    <div class="col-2">
                                        <div class="upload-info">
                                        
                                            @if(Auth::user()->photo_profile == null )
                                            <div class="user-send-message upload-info"> <a href="#" title="" class="btn " id="modifPhoto2">Téléverser</a> </div>
                                                @else 
                                                    <div class="user-send-message upload-info"> <a href="#" title="" class="btn btn-danger " style="color:white;" id="modifPhoto2">Modifier la photo</a> </div>
                                                
                                                @endif
                                                
                                                
                                                    <span>Photo de couverture .jpg & .png</span>
                                                    
                                                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf  
                                                    <input class="form-control" id="photobtn2" accept="image/png, image/jpeg" type="hidden" name="photo_couverture">
                                                    @if ($errors->has('photo_couverture'))
                                                        <br>
                                                        <div class="alert alert-warning ">
                                                            <strong>{{$errors->first('photo_couverture')}}</strong> 
                                                        </div>
                                                    @endif
                                                    <input class="form-control btn-danger"  id="valider2" value="Enregistrer" type="hidden" name="submit">
                                                </form>
                                        </div>  
                                    </div>
                                </div> --}}
                               





                            </div>

                            <form method="POST" action="{{ route('user.store') }}"  enctype="multipart/form-data">
                            <div class="profile-form-edit" style="margin-left: 10px">
                                    @csrf
                                <br>
                                <hr>
                               <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Nom de l'entreprise <span class="text-danger">*</span> </span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="" value="{{ old('nom_entreprise') ? old('nom_entreprise') : Auth::user()->nom  }}" name="nom_entreprise" required class="form-control"/>
                                        </div>
                                    </div>
                            
                                 
                                    <div class="col-lg-3">
                                        <span class="pf-title">Nombre de salariés</span>
                                        <div class="pf-field">
                                            <div class="pf-field">
                                                <input type="number"  value="{{ old('nb_salarie') ? old('nb_salarie') : Auth::user()->nb_salarie  }}" name="nb_salarie" class="form-control"/>
                                            </div>
                                      
                                            {{-- <select name="nb_salarie" id="nb_salarie" class="form-control">
                                              
                                                

                                                <option value="0-50">0-50</option>
                                                <option value="51-100">51-100</option>
                                                <option value="101-500">101-500</option>
                                                <option value="501-1000">501-1000</option>
                                                <option value="+1000">+1000</option>

                                            </select> --}}

                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3"> 
                                        <span class="pf-title">Secteur d'activité <span class="text-danger">*</span> </span>
                                        <div class="pf-field">
                                            {{-- <textarea type="catégorie" class="form-control"  name="catégorie">{{ old('catégorie') ? old('catégorie') : Auth::user()->categorie  }}</textarea> --}}
                                            <select name="categorie" id="categorie" class="form-control" required>
                                              
                                                @if(Auth::user()->categorie != null)
                                                    <option value="{{Auth::user()->categorie}}">{{Auth::user()->categorie}}</option>
                                                @endif

                                                @foreach ($categories as $categorie )
                                                <option value="{{$categorie->nom}}">{{$categorie->nom}}</option>
                                                    
                                                @endforeach
                                               

                                            </select>
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Description de votre activité <span class="text-danger">*</span> </span>
                                        <div class="pf-field">
                                            <textarea type="description" class="form-control"  name="description">{{ old('description') ? old('description') : Auth::user()->description  }}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="social-edit" style="margin-left: 10px">
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
                            <div class="contact-edit" style="margin-left: 10px">
                                <h3>Contact</h3>
                                
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span class="pf-title">Numéro de téléphone</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="" value="{{ old('contact1') ? old('contact1') : Auth::user()->contact1  }}" name="contact1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Email</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="" value="{{ old('contact2') ? old('contact2') : Auth::user()->contact2  }}" name="contact2" class="form-control"/>
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
                                                   
                                                   @if(Auth::user()->pays != null)
                                                   <option value="{{Auth::user()->pays}}">{{Auth::user()->pays}}</option>

                                                   @endif
                                                   
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Algérie">Algérie</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Arménie">Arménie</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerbaïdjan">Azerbaïdjan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Bénin">Bénin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Bosnie">Bosnie</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brésil">Brésil</option>
                                                    <option value="Brunéi">Brunéi</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cap">Cap-Vert</option>
                                                    <option value="Îles Caïmans">Îles Caïmans</option>
                                                    <option value="République centrafricaine">République centrafricaine</option>
                                                    <option value="Tchad">Tchad</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Comores</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="République démocratique du Congo">République démocratique du Congo</option>
                                                    <option value="Costa">Costa Rica</option>
                                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="République tchèque">République tchèque</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="République dominicaine">République dominicaine</option>
                                                    <option value="Équateur">Équateur</option>
                                                    <option value="Égypte">Égypte</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Guinée équatoriale">Guinée équatoriale</option>
                                                    <option value="Érythrée">Érythrée</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="Éthiopie">Éthiopie</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="France">France</option>
                                                    <option value="Guyane">Guyane</option>
                                                    <option value="Polynésie française">Polynésie française</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="Géorgie">Géorgie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Grèce">Grèce</option>
                                                    <option value="Groenland">Groenland</option>
                                                    <option value="Grenade">Grenade</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernesey">Guernesey</option>
                                                    <option value="Guinée">Guinée</option>
                                                    <option value="Guinée-Bissau">Guinée-Bissau</option>
                                                    <option value="Guyane">Guyane</option>
                                                    <option value="Haïti">Haïti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="Islande">Islande</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indonésie">Indonésie</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Irak">Irak</option>
                                                    <option value="Irlande">Irlande</option>
                                                    <option value="Israël">Israël</option>
                                                    <option value="Italie">Italie</option>
                                                    <option value="Jamaïque">Jamaïque</option>
                                                    <option value="Japon">Japon</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordanie">Jordanie</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="République populaire démocratique de Corée">République populaire démocratique de Corée</option>
                                                    <option value="République de Corée">République de Corée</option>
                                                    <option value="Koweït">Koweït</option>
                                                    <option value="Kirghizistan">Kirghizistan</option>
                                                    <option value="Lettonie">Lettonie</option>
                                                    <option value="Liban">Liban</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libye">Libye</option>
                                                    <option value="Lituanie">Lituanie</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macédoine">Macédoine</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaisie">Malaisie</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malte">Malte</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritanie">Mauritanie</option>
                                                    <option value="Maurice">Maurice</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexique">Mexique</option>
                                                    <option value="Moldavie">Moldavie</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolie">Mongolie</option>
                                                    <option value="Monténégro">Monténégro</option>
                                                    <option value="Maroc">Maroc</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibie">Namibie</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Népal">Népal</option>
                                                    <option value="Pays-Bas">Pays-Bas</option>
                                                    <option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option>
                                                    <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigéria">Nigéria</option>
                                                    <option value="Niue">Niue</option>
                                                 
                                                    <option value="Norvège">Norvège</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Pérou">Pérou</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Pologne">Pologne</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Porto">Porto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Réunion">Réunion</option>
                                                    <option value="Roumanie">Roumanie</option>
                                                    <option value="Russie">Russie</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                   
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Saint-Marin">Saint-Marin</option>
                                                    <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
                                                    <option value="Arabie saoudite">Arabie saoudite</option>
                                                    <option value="Sénégal">Sénégal</option>
                                                    <option value="Serbie">Serbie</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapour">Singapour</option>
                                                    <option value="Slovaquie">Slovaquie</option>
                                                    <option value="Slovénie">Slovénie</option>
                                                    <option value="Somalie">Somalie</option>
                                                    <option value="Afrique du Sud">Afrique du Sud</option>
                                                    <option value="Soudan du Sud">Soudan du Sud</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Soudan">Soudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Suède">Suède</option>
                                                    <option value="Suisse">Suisse</option>
                                                    <option value="Taïwan">Taïwan</option>
                                                    <option value="Tadjikistan">Tadjikistan</option>
                                                    <option value="Tanzanie">Tanzanie</option>
                                                    <option value="Thaïlande">Thaïlande</option>
                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinité Trinité-et-Tobago">Trinité-et-Tobago</option>
                                                    <option value="Tunisie">Tunisie</option>
                                                    <option value="Turquie">Turquie</option>
                                                    <option value="Turkménistan">Turkménistan</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Ouganda">Ouganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="Émirats arabes unis">Émirats arabes unis</option>
                                                    <option value="Royaume-Uni">Royaume-Uni</option>
                                                    <option value="États">États-Unis</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Ouzbékistan">Ouzbékistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                   
                                                    <option value="Yémen">Yémen</option>
                                                    <option value="Zambie">Zambie</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                   
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="margin-top:50px">
                                            <button type="submit">Enregistrer</button>
                                            <br><br>
                                        </div>
                                    </div>
                                
                            </div>
                        </form>
                       
                            {{-- <div class="contact-edit" id="pi">
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
                            </div> --}}
                        </div>
                   </div>

                   
				 </div>
				 
                </div>
			</div>
		</div>
	</section>

	

</div>


@section('js-content')

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photodisplay').fadeIn();
                $('#photodisplay').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#modifPhoto').click(function(){
        $('#modifPhoto').fadeOut(500);
        $("#photobtn").attr('type','file');
    });

    $("#photobtn").change(function () {
        readURL(this);
        $('#valider').attr('type','submit');
    });

    
    

        // $.ajaxSetup({
        //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        // })

        

    // $('#valider').click(function(e){
    //     e.preventDefault()

    //    datda = _token:'{{csrf_token()}}',
    //             $.ajax({                        
    //                 url: 'user/photo_profil',
    //                 type: 'POST',
    //                 data: 
    //                 success: function(data){
    //                document.location.reload();
    //              },
    //              error : function(data){
    //                 console.log(data);
    //              }
    //             })
    // })
   
</script>


<script>
    function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#photodisplay2').fadeIn();
              $('#photodisplay2').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
$('#modifPhoto2').click(function(){
$('#modifPhoto2').fadeOut(500);
$("#photobtn2").attr('type','file');
});
  $("#photobtn2").change(function () {
      readURL2(this);
      $('#valider2').attr('type','submit');
  });
</script>


<script>
    // ######### supprimer une offre
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
            const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
})
    swalWithBootstrapButtons({
        title: 'Confirmez-vous la suppression de cette offre ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: '@lang('Oui')',
        cancelButtonText: '@lang('Non')',
        
    }).then((result) => {
        if (result.value) {
            $('[data-toggle="tooltip"]').tooltip('hide')
                $.ajax({                        
                    url: that.attr('href'),
                    type: 'GET',
                    success: function(data){
                   document.location.reload();
                 },
                 error : function(data){
                    console.log(data);
                 }
                })
                .done(function () {
                        that.parents('tr').remove()
                })
            swalWithBootstrapButtons(
            'Supprimée!',
            'L\'offre a bien été supprimée.',
            'success'
            )
            
            
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
            'Annulé',
            'L\'offre n\'a pas été supprimée.',
          
            'error'
            )
        }
    })
        })
    })
</script>

<script src="https://cdn.tiny.cloud/1/ieugu2pgq0vkrn7vrhnp69zprqpp5xfwh9iewe7v24gtdj8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks fullscreen',
    'insertdatetime media table paste help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  });
</script>


@endsection