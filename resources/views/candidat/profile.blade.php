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

                           
                            <div class="profile-title">
                                @if(Auth::user()->profile_complete == true)
                                    <h3>Mon profil</h3>
                                @else 
                                <h2>Veuillez compléter votre profile pour continuer</h2>

                                @endif
                                <div class="row">
                                    <div class="col-6">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay" style="object-fit: cover; width: 225px; height: 225px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{(Auth::user()->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. Auth::user()->photo_profile) }}" alt="@lang('Photo de profil')">
        
                                            <div class="upload-info">
                                                <div class="user-send-message upload-info"> <a href="#" title="" class="btn " id="modifPhoto">Téléverser</a> </div>
                                                 <span>Photo de profil .jpg & .png</span>
                                                 
                                                 <form action="{{ route('user.photo_profil') }}" method="post" enctype="multipart/form-data">
                                                    @csrf  
                                                  <input class="form-control" id="photobtn" type="hidden" name="photo_profil">
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


                                    {{-- <div class="col-6">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay2" style="object-fit: cover; width: 525px; height: 225px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{ (Auth::user()->photo_couverture == null ) ? asset('images/photo_couverture/couverture.jpg') :asset('images/photo_couverture/'. Auth::user()->photo_couverture) }}" alt="@lang('Photo de couverture')">
        <br>
                                            <div class="upload-info">
                                                <div class="user-send-message upload-info"> <a href="#" title="" class="btn " id="modifPhoto2">Téléverser</a> </div>
                                                 <span>Photo de couverture .jpg & .png</span>
                                                 
                                                 <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf  
                                                  <input class="form-control" id="photobtn2" type="hidden" name="photo_couverture">
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
                            </div>

                          
                            <div class="profile-form-edit">
                                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span class="pf-title">Nom</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder=" " name="nom" value="{{old('nom') ? old('nom') : Auth::user()->nom}}"  class="form-control" required/>
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
                                                <input type="text" placeholder="" name="prenom" value="{{old('prenom') ? old('prenom') : Auth::user()->prenom}}"  class="form-control" required/>
                                                @if ($errors->has('prenom'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('prenom')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Poste</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="UX / UI Designer" value="{{old('poste') ? old('poste') : Auth::user()->poste}}" name="poste"class="form-control" required/>
                                                @if ($errors->has('poste'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('poste')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <span class="pf-title">Ajoutez votre CV</span>
                                            <div class="pf-field">
                                                <input type="file" value="{{old('cv') ? old('cv') : Auth::user()->cv}}" name="cv"class="form-control" required/>
                                                @if ($errors->has('cv'))
                                                    <br>
                                                    <div class="alert alert-warning ">
                                                        <strong>{{$errors->first('cv')}}</strong> 
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <span class="pf-title">Expérience</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Allow In Search" class="chosen form-control" value="{{old('experience') ? old('experience') : Auth::user()->experience}}" name="experience">
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
                                            <span class="pf-title">Date de naissance</span>
                                            <div class="pf-field">
                                                <input type="date" placeholder="25" class="form-control" value="{{old('date_naissance') ? old('date_naissance') : Auth::user()->date_naissance}}" name="date_naissance"/>
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
                                                <select data-placeholder="Please Select Specialism" class="chosen form-control" value="{{old('pays') ? old('pays') : Auth::user()->pays}}" name="pays">
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
                                            <input type="text" placeholder="" value="{{old('ville') ? old('ville') : Auth::user()->ville}}" name="ville" class="form-control"/>
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
                                                <textarea class="form-control" value="{{old('description') ? old('description') : Auth::user()->description}}" name="description"></textarea>
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
                                                <input type="text" placeholder="www.facebook.com/SG" value="{{old('facebook') ? old('facebook') : Auth::user()->facebook}}" name="facebook" class="form-control"/>
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
                                                <input type="text" placeholder="www.twitter.com/SG" value="{{old('twitter') ? old('twitter') : Auth::user()->twitter}}" name="twitter" class="form-control"/>
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
                                                <input type="text" placeholder="www.insta.com/SG" value="{{old('instagram') ? old('instagram') : Auth::user()->instagram}}" name="instagram" class="form-control"/>
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
                                                <input type="text" placeholder="www.Linkedin.com/SG" value="{{old('linkedin') ? old('linkedin') : Auth::user()->linkedin}}" name="linkedin" class="form-control"/>
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
                                                <input type="text" placeholder="+290 538 963 " value="{{old('contact1') ? old('contact1') : Auth::user()->contact1}}" name="contact1" class="form-control"/>
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
                                                <input type="text" placeholder="demo@jobhunt.com" value="{{old('contact2') ? old('contact2') : Auth::user()->contact2}}" name="contact2" class="form-control"/>
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
                            {{-- <div class="contact-edit" id="pi">
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
                            </div> --}}
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

@endsection