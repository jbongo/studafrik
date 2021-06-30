@include('layouts.topmenu_bo')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Candidatures</h1>
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
                    @if (session('ok'))
                    <div class="alert alert-success alert-dismissible ">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong> {{ session('ok') }}</strong>
                    </div>
                    @endif

                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3></h3>
                            <div class="extra-job-info" style="margin-bottom:25px">
                                <span style="font-weigth:bold"><i class="la la-clock-o"></i><strong></strong> Offre: {{$offre->titre}}</span>
                                <span><i class="la la-file-text"></i><strong>{{sizeof($candidatures)}}</strong> Candidatures</span>
                            </div>

                            
                            <table id="example" class="table table-striped table-bordered dt-responsive " style="width:100%; margin-top:25px">
                                
                                <thead>
                                    <tr style="color: #EB586C; font-weigth:bold">
                                        <td>Candidat</td>
                                        <td>Date de candidature</td>
                                        <td>CV du candidat</td>
                                        <td>Voir le profil du candidat</td>
                                        {{-- <td>Action</td> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- {{dd($candidatures)}} --}}
                                    @foreach ( $candidatures as $candidature )

                                    
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h6><a href="{{route('user.show_profil', Crypt::encrypt($candidature->id) )}}" target="_blank" style="color:#EE6E49" title="Voir le profil">{{$candidature->nom}} {{$candidature->prenom}}</a></h6>
                                            </div>
                                        </td>
                                        <td>
                                            {{$candidature->pivot->created_at->format('d/m/Y')}} 
                                        </td>
                                        <td>
                                            <span> @if($candidature->pivot->cv != null ) <a href="{{route('user.telecharger_cv', $candidature->id )}}" title="" class="btn btn-warning " style="background: #EE6E49" id="telechargercv">Télécharger le CV</a> @else <span style="color: #EB586C; font-weigth:bold"> Pas de CV </span> @endif</span>
                                        </td>
                                        <td>
                                            
                                           <a href="{{route('user.show_profil', Crypt::encrypt($candidature->id) )}}" target="_blank" title="Voir le profil"><span>Voir</span> <i class="la la-eye"></i></a>

                                        </td>
                                        {{-- <td> --}}
                                            {{-- <ul class="action_job"> --}}
                                            {{-- <li><span>Voir l'offre</span><a href="{{route('mes_offres.show', $candidature->slug )}}" title=""><i class="la la-eye"></i></a></li> --}}
                                                {{-- <li><span>Supprimer</span><a class="supprimer" href="#" title=""><i class="la la-trash-o"></i></a></li> --}}
                                                {{-- <li><span>Supprimer</span><a class="supprimer" href="{{route('mes_offres.delete', Crypt::encrypt($candidature->id) )}}" title=""><i class="la la-trash-o"></i></a></li> --}}
                                            {{-- </ul> --}}
                                        {{-- </td> --}}
                                    </tr>

                                    {{-- {{dd($candidature)}} --}}
                                    
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
