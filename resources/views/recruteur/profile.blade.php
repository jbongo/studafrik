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

                            <form method="POST" action="{{ route('user.store') }}"  enctype="multipart/form-data">
                                @csrf
                            <div class="profile-title">
                                @if(Auth::user()->profile_complete == true)
                                    <h3>Mon profil</h3>
                                @else 
                                <h2>Veuillez compléter votre profil pour continuer</h2>

                                @endif
                                <div class="row">
                                    <div class="col-6">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay" style="object-fit: cover; width: 225px; height: 225px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{(Auth::user()->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. Auth::user()->photo_profile) }}" alt="@lang('Photo de profil')">
        
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


                                    <div class="col-6">
                                        <div class="upload-img-bar">
                                            <img class="img-responsive" id="photodisplay2" style="object-fit: cover; width: 525px; height: 225px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{ (Auth::user()->photo_couverture == null ) ? asset('images/photo_couverture/couverture.jpg') :asset('images/photo_couverture/'. Auth::user()->photo_couverture) }}" alt="@lang('Photo de couverture')">
        <br>
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

                                    </div>
                                </div>
                               





                            </div>

                            <div class="profile-form-edit">
                                <br>
                                <hr>
                               <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Nom de l'entreprise</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="" value="{{ old('nom_entreprise') ? old('nom_entreprise') : Auth::user()->nom  }}" name="nom_entreprise" class="form-control"/>
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-3">
                                        <span class="pf-title">Date de création</span>
                                        <div class="pf-field">
                                            <input type="date" placeholder="" value="{{ old('date_creation_entreprise') ? old('date_creation_entreprise') : Auth::user()->date_creation_entreprise  }}" name="date_creation_entreprise" class="form-control"/>
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
                                    
                                    <div class="col-lg-12">
                                        <span class="pf-title">Secteur d'activité</span>
                                        <div class="pf-field">
                                            {{-- <textarea type="catégorie" class="form-control"  name="catégorie">{{ old('catégorie') ? old('catégorie') : Auth::user()->categorie  }}</textarea> --}}
                                            <select name="categorie" id="categorie" class="form-control">
                                              
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
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea type="description" class="form-control" value="" name="description">{{ old('description') ? old('description') : Auth::user()->description  }}</textarea>
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
                                        {{-- <div class="col-lg-6">
                                            <span class="pf-title">Email</span>
                                            <div class="pf-field">
                                                <input type="text" placeholder="demo@total.com" value="{{ old('contact2') ? old('contact2') : Auth::user()->contact2  }}" name="contact2" class="form-control"/>
                                            </div>
                                        </div> --}}

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
                                                   
                                                    @foreach ($pays as $pay )
                                                        <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                                        
                                                    @endforeach
                                                   
                                                   
                                                   
                                               </select>
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


<script src="https://cdn.tiny.cloud/1/t0hcdz1jd4wxffu3295e02d08y41e807gaxas0gefdz7kcb4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src='https://cdn.tiny.cloud/1/t0hcdz1jd4wxffu3295e02d08y41e807gaxas0gefdz7kcb4/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
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