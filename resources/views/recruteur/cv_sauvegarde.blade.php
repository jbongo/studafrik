@include('layouts.topmenu_bo')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Mes profils sauvegardés</h1>
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
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3></h3>
                            {{-- <div class="extra-job-info">
                                <span><i class="la la-clock-o"></i><strong>1</strong> Offres</span>
                                <span><i class="la la-file-text"></i><strong>0</strong> Candidatures</span>
                                <span><i class="la la-users"></i><strong>1</strong> Offres actives </span>
                            </div> --}}
                            @if (session('ok'))
                            <div class="alert alert-success ">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong> {{ session('ok') }}</strong>
                            </div>
                            @endif 
                            
                            <table class="table table-striped table-bordered dt-responsive " style="width:100%; margin-top:25px">
                                <thead>
                                    <tr>
                                        <td>Nom</td>
                                        <td>Poste</td>
                                        <td>Secteur d'activité</td>
                                        <td>Pays</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $candidats as $candidat )
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                {{-- <h3><a href="#" title="">{{$candidat->nom}}</a></h3> --}}
                                                <span><i class="la la-user"></i>{{$candidat->prenom}}, {{$candidat->nom}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">{{$candidat->poste}}</span>
                                        </td>
                                        <td>
                                            <span>{{$candidat->categorie}} </span>
                                            
                                        </td>
                                        <td>
                                            <span>{{$candidat->pays}} </span>
                                           
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                            <li><span>Voir le profil</span><a href="{{route('user.show_profil', Crypt::encrypt($candidat->id) )}}" title=""><i class="la la-eye"></i></a></li>
                                            <li><span>Supprimer comme favoris</span><a class="supprimerxx" href="{{route('favoris.cv.delete',[Auth::user()->id, $candidat->id])}}" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                   
                                   @endforeach
                                

                                </tbody>
                            </table>
                         </div>
                    </div>

 

                   
				 </div>
			</div>
		</div>
	</section>

	



    @extends('admin.layout.footer')

    
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


</script>
  

@endsection