
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
            <h6 class="m-0 font-weight-bold text-primary">Ajouter une offre </h6>
        </div>
        <div class="card-body">
            


        <form method="POST"  action="{{route('admin.offre.store')}}" enctype="multipart/form-data">
                    
                    @csrf
                   

                    <div class="row">
                        <div class="col-6">
                            <span class="pf-title">Nom de l'entreprise</span>
                            <div class="pf-field">
                                <input type="text"  name="nom_entreprise" class="form-control" placeholder=""required  />
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="pf-title">Photo l'entreprise</span>
                            <div class="pf-field">
                                <input type="file"  name="photo_recruteur" class="form-control" accept="image/png, image/jpeg"  />
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-9">
                            <span class="pf-title">Titre de l'offre</span>
                            <div class="pf-field">
                                <input type="text"  name="titre" class="form-control" placeholder=""required  />
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    
                    <div class="row">
                        <div class="col-9">
                            <span class="pf-title">Description de l'offre</span>
                            <div class="pf-field">
                                <textarea name="description"  ></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-9">
                            <span class="pf-title">Profil et compétences recherchés</span>
                            <div class="pf-field">
                                <textarea name="description_profil" ></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    
                    {{-- <div class="row">
                    
                        <div class="col-9">
                            <span class="pf-title">Compétences réquises</span>
                            <div class="pf-field">
                                <textarea name="competence_requise" id="" cols="30" rows="5"></textarea>
                           </div>
                        </div>
                    </div> --}}
                    
                    <br><br>
                    
                    
                    <div class="row">
                        <div class="col-6">
                            <span class="pf-title">Catégorie de l'emploi</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="categorieoffre_id" class="form-control chosen">
                                               
                                    @foreach ($categories as $categorie )
                                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>   
                                    @endforeach
                                   
                               </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <span class="pf-title">Type de contrat</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="type_contrat" class="form-control chosen">
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
                    
                    <br><br>
                    
                    <div class="row">
                        <div class="col-6">
                            <span  htmlFor="customRange1" class="pf-title">Salaire </span>
                            <div class="pf-field">
                               <input type="number"  name="salaire" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <span  htmlFor="customRange1" class="pf-title">Devise du Salaire  </span>
                            <div class="pf-field">
                              
                                <select data-placeholder="" required  name="devise_salaire" class="form-control chosen">
                                    <option value="FCFA">FCFA</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    
                    <div class="row">
                       
                        <div class="col-6">
                            <span class="pf-title"  htmlFor="customRange2">Expérience requise </span>
                            <div class="pf-field">
                                <select data-placeholder="experience" required  name="experience" class="form-control chosen">
                                    <option value="<1">moins de 1 an </option>
                                    <option value="1-2">1 à 2 ans</option>
                                    <option value="2-3">2 à 3 ans</option>                                 
                               </select>
                                
                            </div>
                        </div>
            
                    </div>
                        <br><br>
                    <div class="row">
                        <div class="col-4">
                            <span class="pf-title">Date d'expiration de l'offre</span>
                            <div class="pf-field">
                                <input type="date"   name="date_expiration" class="form-control datepicker" required />
                            </div>
                        </div>
                       
                        <div class="col-4">
                            <span class="pf-title">Pays de l'offre</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="pays" class=" form-control chosen">
                                   
                                    @foreach ($pays as $pay )
                                        <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                        
                                    @endforeach

                                   
                               </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <span class="pf-title">Ville de l'offre</span>
                            <div class="pf-field">
                                <input type="text"  name="ville" class="form-control" placeholder="" required  />
                            </div>
                        </div>

                    </div>
                        
                        
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-9">
                            <span style="background-color:#aeec; color:red" class="pf-title">Message aux candidats postuler</span>
                            <div class="pf-field">
                                <textarea  name="message_candidature" ></textarea>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    
                    <div class="row">
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
                        
                    </div>
                    <br><br>

           
       <br><br>
                
                
           
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <input type="submit" class="btn btn-primary" id="Ajouter" value="Ajouter">
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

$('#div_url_candidature').hide();

    $('#candidater_lien').on('change',function(){

    var val = $('#candidater_lien').val();
    
    if(val == "Non"){
        $('#div_url_candidature').hide();
        $('#url_candidature').removeAttr('required')

    }else{
        $('#div_url_candidature').show();

        $('#url_candidature').attr('required',true);

        

    }
   

    })

</script>


@endsection