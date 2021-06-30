@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
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
                 <div class="col-10 column">

<br>
                    <form action="{{ route('cv.liste') }}" method="get" >
                        @csrf
                        <div class="emply-resume-sec">
                        <div class="row" >
                            <div class="col-lg-5">
                                <div class="job-fieldx">
                                    <input type="text" name="poste" class="form-control" placeholder="Entrez un mot clé" value="{{isset($_GET['poste']) ? $_GET['poste'] :""}}" />
                                    {{-- <i class="la la-keyboard-o"></i> --}}
                                </div>
                            </div>

                            <div class="col-lg-3">
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

                            <div class="col-lg-3">
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
<hr>


                    <div class="emply-resume-sec">
                      
                       @foreach ($candidats as $candidat )
                            <div class="emply-resume-list square col-lg-9" style="margin-top:100px">
                                <div class="emply-resume-thumb">
                                    <img width="150px" src="{{asset(($candidat->photo_profile != null) ? asset('images/photo_profil/'.$candidat->photo_profile) : asset('images/profil/profil.png'))}}" alt="" />
                                </div>
                                <div class="emply-resume-info">
                                    <h3><a href="#" title="">{{$candidat->prenom}} {{$candidat->nom}}</a></h3>
                                    <span><i>{{$candidat->poste}}</i> </span>
                                    <p><i class="la la-map-marker"></i>{{$candidat->ville}}- {{$candidat->pays}}</p>
                                </div>
                                <div class="shortlists">
                                    <a class="btn btn-warning" style="background: #EE6E49; color:#fff" target="_blank" href="{{route('user.show_profil', Crypt::encrypt($candidat->id))}}" title="">Voir profil <i class="la la-plus"></i></a>
                                </div>
                            </div><!-- Emply List -->
                       @endforeach
                        
                      
                       

                        {{-- <div class="pagination"> --}}

                           {{-- <ul>
                               <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Précédent</a></li>
                               <li><a href="">1</a></li>
                               <li class="active"><a href="">2</a></li>
                               <li><a href="">3</a></li>
                           <li class="next"><a href="">Suivant <i class="la la-long-arrow-right"></i></a></li>
                           </ul> --}}
                       {{-- </div><!-- Pagination --> --}}
                    </div>
                    <br>
                    {!!$candidats->links()!!}
                 
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