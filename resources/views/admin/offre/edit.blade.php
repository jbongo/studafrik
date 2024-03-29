
@include('admin.layout.topmenu')

              
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Offre</h1>
  <hr>
      <a href="{{route('admin.offres.index')}}" class="btn btn-warning btn-icon-split" >
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Liste des offres</span>
    </a>
  <hr>
  @if (session('ok'))
  <div class="alert alert-success ">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong> {{ session('ok') }}</strong>
  </div>
  @endif 

  
  @if ($errors->has('nom'))
  <br>
  <div class="alert alert-warning ">
     <strong>{{$errors->first('nom')}}</strong> 
  </div>
  @endif
  <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier l'offre </h6>
        </div>
        <div class="card-body">
            


        <form method="POST"  action="{{route('admin.offre.update', Crypt::encrypt($offre->id))}}" enctype="multipart/form-data">
                    
                    @csrf
                   

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span class="pf-title">Nom de l'entreprise</span>
                            <div class="pf-field">
                                <input type="text"  name="nom_entreprise" value="{{ old('nom_entreprise') ? old('nom_entreprise') : $offre->nom_entreprise }}" class="form-control" placeholder=""required  /> 
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="upload-img-bar">
                            <span class="pf-title">Photo de l'entreprise</span>

                                @if($offre->photo_recruteur != null)
                                <img class="img-responsive" id="photodisplay" style="object-fit: cover;  width: 100px; height: 100px; border: 5px solid #142f3c; border-style: solid; border-radius: 20px; padding: 3px;" src="{{asset('images/photo_recruteur/'. $offre->photo_recruteur) }}" >
                               
                               
                                @endif


                                <input type="file"  name="photo_recruteur"  class="form-control" placeholder="" id="photo_recruteur" accept="image/png, image/jpeg" />

                      
                            
                        </div>

                    </div>
                        
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <span class="pf-title">Titre de l'offre</span>
                            <div class="pf-field">
                                <input type="text"  name="titre" value="{{ old('titre') ? old('titre') : $offre->titre }}" class="form-control" placeholder=""required  />
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    
                    
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <span class="pf-title">Description de l'offre</span>
                            <div class="pf-field">
                                <textarea name="description"  >{{ old('description') ? old('description') : $offre->description }}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <span class="pf-title">Description du profil recherché</span>
                            <div class="pf-field">
                                <textarea name="description_profil" >{{ old('description_profil') ? old('description_profil') : $offre->description_profil }}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    
                    <div class="row">
                    
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <span class="pf-title">Compétences réquises</span>
                            <div class="pf-field">
                                <textarea name="competence_requise" id="" cols="30" rows="5">{{ old('comptence_requise') ? old('comptence_requise') : $offre->comptence_requise }}</textarea>
                           </div>
                        </div>
                    </div>
                    
                    <br>
                    
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span class="pf-title">Catégorie de l'emploi</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="categorieoffre_id" class="form-control chosen">
                                   
                                   

                                    <option value="{{$offre->categorieoffre->id}}">{{$offre->categorieoffre->nom}}</option>   
                                               
                                    @foreach ($categories as $categorie )
                                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>   
                                    @endforeach
                                   
                               </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span class="pf-title">Type de contrat</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="type_contrat" class="form-control chosen">
                                   
                                    @if($offre->type_contrat)
                                    <option value="{{$offre->type_contrat}}">{{$offre->type_contrat}}</option>
                                    @endif
                                   
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
                        
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span  htmlFor="customRange1" class="pf-title">Salaire </span>
                            <div class="pf-field">
                               <input type="number"  name="salaire" value="{{ old('salaire') ? old('salaire') : $offre->salaire }}" class="form-control " />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span  htmlFor="" class="pf-title">Devise du Salaire </span>
                            <div class="pf-field">
                                <select data-placeholder="" required  name="devise_salaire" class="form-control chosen">
                                    <option value="{{$offre->devise_salaire}}">{{$offre->devise_salaire}}</option>
                                    <option value="FCFA">FCFA</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <span class="pf-title"  htmlFor="customRange2">Expérience requise</span>
                            <div class="pf-field">
                               <select data-placeholder="experience" required  name="experience" class="form-control chosen">
                                    <option value="{{$offre->experience}}">{{$offre->experience}} ans</option>

                                    <option value="<1">moins de 1 an </option>
                                    <option value="1-2">1 à 2 ans</option>
                                    <option value="2-3">2 à 3 ans</option>
                                </select>
                            </div>
                        </div>
                       
            
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <span class="pf-title">Date d'expiration de l'offre</span>
                            <div class="pf-field">
                                <input type="date"   name="date_expiration" value="{{ old('date_expiration') ? old('date_expiration') : ($offre->date_expiration != null ? $offre->date_expiration->format('Y-m-d') : null ) }}" class="form-control datepicker" required />
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <span class="pf-title">Pays de l'offre</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="pays" class=" form-control chosen">
                                   
                                    @if($offre->pays)
                                    <option value="{{$offre->pays}}">{{$offre->pays}}</option>
                                    @endif

                                    @foreach ($pays as $pay )
                                        <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                        
                                    @endforeach

                                   
                               </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <span class="pf-title">Ville de l'offre</span>
                            <div class="pf-field">
                                <input type="text"  name="ville" class="form-control" value="{{ old('ville') ? old('ville') : $offre->ville }}" placeholder="" required  />
                            </div>
                        </div>

                    </div>
                        
                        
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <span style="background-color:#aeec; color:red" class="pf-title">Message aux candidats postuler</span>
                            <div class="pf-field">
                                <textarea  name="message_candidature" >{{ old('message_candidature') ? old('message_candidature') : $offre->message_candidature}}</textarea>
                            </div>
                        </div>
                    </div>

           
                    <br>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="div_candidater_lien">
                            <span  htmlFor="customRange1" class="pf-title">Candidater par lien ? </span>
                            <div class="pf-field">
                              
                               <select data-placeholder="" required id="candidater_lien"  name="candidater_lien" class="form-control chosen">
                                @if($offre->candidater_lien != null)
                                    <option value="{{$offre->candidater_lien}}">{{$offre->candidater_lien}}</option>
                                @endif
                                    <option value="Non">Non</option>
                                    <option value="Oui">Oui</option>
                                
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="div_url_candidature">
                            <span  htmlFor="customRange1" class="pf-title">Lien de candidature  </span>
                            <div class="pf-field">
                               <input type="url" id="url_candidature" name="url_candidature" value="{{$offre->url_candidature}}" class="form-control"  />
                            </div>
                        </div>
                        
                    </div>
                    <br><br>
                
                
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <input type="submit" class="btn btn-success" id="Ajouter" value="Modifier">
                </div>

                </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->




@extends('admin.layout.footer')


@section('js-content')

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


<script>

var lien_cand = "{{$offre->candidater_lien}}";
    if(lien_cand == "Non"){
    $('#div_url_candidature').hide();

    }


    
    $('#candidater_lien').on('change',function(){

        var val = $('#candidater_lien').val();
        
        if(val == "Non"){
            $('#div_url_candidature').hide();
            $('#url_candidature').removeAttr('required');

        }else{
            $('#div_url_candidature').show();
            $('#url_candidature').attr('required',true);


        }
   

    })

</script>


@endsection