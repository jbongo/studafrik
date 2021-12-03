@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
@endsection

@include('layouts.topmenu_bo')



              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des profils</h1>
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
                            {{-- <h6 class="m-0 font-weight-bold text-primary">Liste des pays</h6> --}}
                        </div>
                        <div class="card-body">
                 <div class="col-12 column">

<br>
                    <form action="{{ route('cv.liste') }}" method="get" >
                        @csrf
                        <div class="emply-resume-sec">
                        <div class="row" >
                        
                        
                        
                           
                              
                            
                            <div class="col-lg-5 col-md-5">
                                <div class="job-fieldx">
                               
                                    {{-- <input type="text" name="poste" class="form-control" placeholder="Entrez un mot clé" value="{{isset($_GET['poste']) ? $_GET['poste'] :""}}" /> --}}
                                    {{-- <i class="la la-keyboard-o"></i> --}}
                                    <label for="">Chercher par coméptences</label>
                                    <select class="selectpicker col-lg-6"    data-live-search="true" multiple>
                                      @foreach ($competences as $competence)
                                          <option value="{{$competence}}">{{$competence}}</option>
                                      @endforeach
                                      </select>
                                </div>
                            </div>
                            
                            

                            <div class="col-lg-3 col-md-3">
                                <div class="job-field">
                                    <select name="secteur" class="chosen-city form-control">
                                        <option value="">Secteurs d'activités</option>
                                        @foreach ($categories as $categorie )
                                            <option value="{{$categorie->nom}}">{{$categorie->nom}}</option>
                                        @endforeach
                                        
                                    </select>
                                    {{-- <i class="la la-map-marker"></i> --}}
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="job-field">
                                    <select name="pays" class="chosen-city form-control">
                                        <option value="">Tous les pays</option>
                                        @foreach ($pays as $pay )
                                            <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                        @endforeach
                                        
                                    </select>
                                    {{-- <i class="la la-map-marker"></i> --}}
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-danger" style="background-color:#EE6E49"><i class="la la-search"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>




<section style="margin-bottom: 100px">
   
            <br>
                            <br>
                            <br>
            
                   
                    <div class="job-grid-sec">
                        <div class="row">
                        @foreach ($candidats as $candidat )
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="background: #f3f1f0">
                                <div class="job-grid">
                                    <div class="job-title-sec">
                                        <a  href="{{route('user.show_profil', Crypt::encrypt($candidat->id))}}" target="_blank" title="">
                                            <div class="c-logo"> 
                                          
                            
                                            <img src="{{asset(($candidat->photo_profile != null) ? asset('images/photo_profil/'.$candidat->photo_profile) : asset('images/profil/profil.png'))}}" width="115px" height="120px"  title="{{$candidat->nom}}"  alt="{{$candidat->nom}}" /> </div>
        
                                           
                                                <h3 style="color:#323232 ">{{$candidat->prenom}} {{$candidat->nom}}</h3>
                                            
                                            <h3><a href="" style="color: #EE6E49" >{{$candidat->poste}}</a></h3>
                                            {{-- <span class="fav-job"><i class="la la-heart-o"></i></span> --}}
                                        </a>
                                    </div>
                                    <span class="job-lctn"><a  href="" title="">{{$candidat->ville}}, {{$candidat->pays}}</a></span>
                                <a  href="{{route('user.show_profil', Crypt::encrypt($candidat->id))}}" target="_blank" title="">Voir profil</a>
                                </div><!-- JOB Grid -->
                            </div>
                        @endforeach
                            
                            
                            
                        
                        </div>
                    </div>
             
            
            <br>
            <br>
            <br>

</section>


                    <br>
                    {!!$candidats->links()!!}
                 
                  </div>
    </div>

</div>
<!-- /.container-fluid -->




@extends('admin.layout.footer')


@section('js-content')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-fr_FR.min.js"></script>


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

    $('#candidater_lien').on('change',function(){

    var val = $('#candidater_lien').val();
    
    if(val == "Non"){
        $('#div_url_candidature').hide();

    }else{
        $('#div_url_candidature').show();

    }
   

    })

</script>


@endsection