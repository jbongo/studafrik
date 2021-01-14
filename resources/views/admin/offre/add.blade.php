
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
                        <div class="col-9">
                            <span class="pf-title">Nom de l'entreprise</span>
                            <div class="pf-field">
                                <input type="text"  name="nom_entreprise" class="form-control" placeholder=""required  />
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
                            <span class="pf-title">Description du profil recherché</span>
                            <div class="pf-field">
                                <textarea name="description_profil" ></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    
                    <div class="row">
                    
                        <div class="col-9">
                            <span class="pf-title">Compétences réquises</span>
                            <div class="pf-field">
                                <textarea name="competence_requise" id="" cols="30" rows="5"></textarea>
                           </div>
                        </div>
                    </div>
                    
                    <br><br>
                    
                    
                    <div class="row">
                        <div class="col-6">
                            <span class="pf-title">Catégorie de l'emploi</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="categorie_offre_id" class="form-control chosen">
                                   <option value="1">Marketing</option>
                                   <option value="2">Informatique</option>
                                   <option value="3">Art & Culture</option>
                                   
                               </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <span class="pf-title">Type de contrat</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism"  name="type_contrat" class="form-control chosen">
                                   <option value="CDI">CDI</option>
                                   <option value="CDD">CDD</option>
                                   <option value="INTERIM">INTERIM</option>
                                 
                                   
                               </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <br><br>
                    
                    <div class="row">
                        <div class="col-6">
                            <span  htmlFor="customRange1" class="pf-title">Salaire Min </span>
                            <div class="pf-field">
                               <input type="number"  name="salaire_min" class="form-control custom-range" />
                            </div>
                        </div>
                        <div class="col-6">
                            <span  htmlFor="customRange1" class="pf-title">Salaire Max </span>
                            <div class="pf-field">
                               <input type="number"  name="salaire_max" class="form-control custom-range" />
                            </div>
                        </div>
                    </div>
                    <br><br>
                    
                    <div class="row">
                        <div class="col-6">
                            <span class="pf-title"  htmlFor="customRange2">Expérience réquise Min (mois)</span>
                            <div class="pf-field">
                               <input type="number"  name="experience_min" class="form-control custom-range" />
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="pf-title"  htmlFor="customRange2">Expérience réquise Max (mois)</span>
                            <div class="pf-field">
                               <input type="number"  name="experience_max" class="form-control custom-range" />
                                
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