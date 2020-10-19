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
                        <div class="padding-left">

                            <form method="POST" action="{{ route('user.store') }}">

                                @csrf
                            <div class="profile-title">
                                <h3>Mon profile</h3>
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
                                            <span class="pf-title">Nom</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder=" TUFAN" name="nom" value="{{old('nom')}}"  class="form-control"/>
                                                @if ($errors->has('nom'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('nom')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Prénom (s)</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="Ali" name="prenom" value="{{old('prenom')}}"  class="form-control"/>
                                                @if ($errors->has('prenom'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('prenom')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Poste</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="UX / UI Designer" value="{{old('poste')}}" name="poste"class="form-control" />
                                                @if ($errors->has('poste'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('poste')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-6">
                                            <span class="pf-title">Expérience</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Allow In Search" class="chosen form-control" value="{{old('experience')}}" name="experience">
                                                   <option>0-2 ans</option>
                                                   <option>2-4 ans</option>
                                                   <option> Sup à 4 ans</option>
                                               </select>

                                               @if ($errors->has('experience'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('experience')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <span class="pf-title">Âge</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="25" class="form-control" value="{{old('date_naissance')}}" name="date_naissance"/>
                                                @if ($errors->has('date_naissance'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('date_naissance')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    
                                
                                        <div class="col-lg-6">
                                            <span class="pf-title">Pays</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism" class="chosen form-control" value="{{old('pays')}}" name="pays">
                                                   <option>Gabon</option>
                                                   <option>Mali</option>
                                               </select>
                                               @if ($errors->has('pays'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('pays')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Ville</span>
                                            <div class="pf-field">
                                            <input type="text" placeholder="" value="{{old('ville')}}" name="ville" class="form-control"/>
                                            @if ($errors->has('ville'))
                                                <br>
                                                <div class="alert alert-warning ">
                                                    <strong>{{$errors->first('ville')}}</strong> 
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <span class="pf-title">Description</span>
                                            <div class="pf-field">
                                                <textarea class="form-control" value="{{old('description')}}" name="description"></textarea>
                                                @if ($errors->has('description'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('description')}}</strong> 
                                                    </div>
                                                @endif
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
                                                <input type="text" placeholder="www.facebook.com/SG" value="{{old('facebook')}}" name="facebook" class="form-control"/>
                                                <i class="la la-facebook"></i>
                                                @if ($errors->has('facebook'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('facebook')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Twitter</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.twitter.com/SG" value="{{old('twitter')}}" name="twitter" class="form-control"/>
                                                <i class="la la-twitter"></i>
                                                @if ($errors->has('twitter'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('twitter')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Instagram</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.insta.com/SG" value="{{old('instagram')}}" name="instagram" class="form-control"/>
                                                <i class="la la-instagram"></i>
                                                @if ($errors->has('instagram'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('instagram')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Linkedin</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="www.Linkedin.com/SG" value="{{old('linkedin')}}" name="linkedin" class="form-control"/>
                                                <i class="la la-linkedin"></i>
                                                @if ($errors->has('linkedin'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('linkedin')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                            <div class="contact-edit">
                                <h3>Contact</h3>
                                
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span class="pf-title">Numéro de téléphone</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="+290 538 963 " value="{{old('contact1')}}" name="contact1" class="form-control"/>
                                                @if ($errors->has('contact1'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('contact1')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <span class="pf-title">Email</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="demo@jobhunt.com" value="{{old('contact2')}}" name="contact2" class="form-control"/>
                                                @if ($errors->has('contact2'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('contact2')}}</strong> 
                                                    </div>
                                                @endif
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
                                                     @if ($errors->has('xxxxxx'))
                                                        <br>
                                                        <div class="alert alert-warning ">
                                                            <strong>{{$errors->first('xxxxxx')}}</strong> 
                                                        </div>
                                                    @endif
                                                </div>
                                                <span class="pf-title">Nouveau mot de passe</span>
                                                <div class="pf-field">
                                                    <input type="password" class="form-control"/>
                                                     @if ($errors->has('xxxxxx'))
                                                        <br>
                                                        <div class="alert alert-warning ">
                                                            <strong>{{$errors->first('xxxxxx')}}</strong> 
                                                        </div>
                                                    @endif
                                                </div>
                                                <span class="pf-title">Confirmez le mot de passe</span>
                                                <div class="pf-field">
                                                    <input type="password" class="form-control"/>
                                                     @if ($errors->has('xxxxxx'))
                                                        <br>
                                                        <div class="alert alert-warning ">
                                                            <strong>{{$errors->first('xxxxxx')}}</strong> 
                                                        </div>
                                                    @endif
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