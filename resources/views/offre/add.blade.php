
 @include('layouts.topmenupage')


	{{-- <section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
                        <h3>{{Auth::user()->nom }} </h3>
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
                   
    
                     <div class="col-10 column">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Ajouter une offre</h3>
                        
                            </div>
                            <div class="profile-form-edit">

                                
                            <form method="POST" action="{{route('mes_offres.store')}}" >
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="pf-title">Titre de l'offre <span class="text-danger">*</span> </span>
                                            <div class="pf-field">
                                                <input type="text"  name="titre" placeholder="" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Catégorie de l'emploi <span class="text-danger">*</span> </span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism" required  name="categorieoffre_id" class="form-control chosen">
                                                   
                                                   
                                                    {{-- @if(Auth::user()->categorie != null)
                                                        <option value="{{Auth::user()->categorie}}">{{Auth::user()->categorie}}</option>
                                                    @endif --}}

                                                    @foreach ($categories as $categorie )
                                                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>   
                                                    @endforeach
                                               
                                                   
                                               </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <span class="pf-title">Description <span class="text-danger">*</span> </span>
                                            <div class="pf-field">
                                                <textarea name="description"   ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Profil et compétences recherchés <span class="text-danger">*</span></span>
                                            <div class="pf-field">
                                                <textarea name="description_profil" ></textarea>
                                            </div>
                                        </div>



                                        <div class="col-lg-4">
                                            <span class="pf-title">Type de contrat <span class="text-danger">*</span> </span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism" required  name="type_contrat" class="form-control chosen">
                                                    <option value="CDI">CDI</option>
                                                    <option value="CDD">CDD</option>
                                                    <option value="STAGE">STAGE</option>
                                                    <option value="JOB ETUDIANT">JOB ETUDIANT</option>
                                                    <option value="VIE">VIE</option>
                                                    <option value="INTERIM">INTERIM</option>
                                                    <option value="BENEVOLAT">BENEVOLAT</option>

                                                   
                                               </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <span  htmlFor="customRange1" class="pf-title">Salaire </span>
                                            <div class="pf-field">
                                               <input type="number"  name="salaire" class="custom-range" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <span  htmlFor="" class="pf-title">Devise du Salaire </span>
                                            <div class="pf-field">
                                                <select data-placeholder="" required  name="devise_salaire" class="form-control chosen">
                                                    <option value="FCFA">FCFA</option>
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        
                                        
                            
                                     
                                        
                                        
                                        <div class="col-lg-6">
                                            <span class="pf-title">Date d'expiration de l'offre</span>
                                            <div class="pf-field">
                                                <input type="date"   name="date_expiration" class="form-control datepicker" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span class="pf-title"  htmlFor="customRange2">Expérience requise </span>
                                            <div class="pf-field">
                                               <select data-placeholder="experience" required  name="experience" class="form-control chosen">
                                                <option value="<1">moins de 1 an </option>
                                                <option value="1-2">1 à 2 ans</option>
                                                <option value="2-3">2 à 3 ans</option>
                                                
                                               
                                           </select>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-6">
                                            <span class="pf-title">Pays de l'offre</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism"  name="pays" class=" form-control chosen">
                                                   
                                                    @foreach ($pays as $pay )
                                                        <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                                        
                                                    @endforeach

                                                   
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Ville de l'offre</span>
                                            <div class="pf-field">
                                                <input type="text"  name="ville" placeholder="" />
                                            </div>
                                        </div>

                                        {{-- <div class="row"> --}}
                                            <div class="col-6">
                                                <span  htmlFor="customRange1" class="pf-title">Candidater par lien ? </span>
                                                <div class="pf-field">
                                                  
                                                   <select data-placeholder="" id="candidater_lien" required  name="candidater_lien" class="form-control chosen">
                                                    <option value="Non">Non</option>
                                                    <option value="Oui">Oui</option>
                                                    
                                                </select>
                                                </div>
                                            </div>
                    
                                            <div class="col-6" id="div_url_candidature">
                                                <span  htmlFor="customRange1" class="pf-title">Lien de candidature  </span>
                                                <div class="pf-field">
                                                   <input type="url" id="url_candidature" name="url_candidature" class="form-control"  />
                                                </div>
                                            </div>
                                            
                                        {{-- </div> --}}
                                        <div class="col-lg-12">
                                            <button type="submit" >Ajouter</button>
                                        </div>
                                        
                                    </div>
<br><br><br>

                                </form>
                            </div>
       
                        </div>
                   </div>
                   
				 </div>
			</div>
        </div>
        
	</section>


</div>


@section('js-content')

<script src="https://cdn.tiny.cloud/1/ieugu2pgq0vkrn7vrhnp69zprqpp5xfwh9iewe7v24gtdj8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>


tinymce.init({
    selector: 'textarea',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: false
  });
  </script>
  
  <script>

$('#div_url_candidature').hide();
   

    
    $('#candidater_lien').on('change',function(){

    var val = $('#candidater_lien').val();
    
    if(val == "Non"){
        $('#div_url_candidature').hide();

    }else{
        $('#div_url_candidature').show();
        $('#url_candidature').attr('required')

    }
   

    })


</script>
@endsection
@include('layouts.footer')

