@include('admin.layout.topmenu')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Historiques</h1>
                  <hr>
                      {{-- <a href="{{route('admin.historique.create')}}" class="btn btn-success btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Ajouter un historique</span>
                    </a> --}}
                  <hr>
                  @if (session('ok'))
                  <div class="alert alert-success ">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> {{ session('ok') }}</strong>
                  </div>
                  @endif 

                  
    
                  <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  id="example0" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         
                                            <th>Utilisateur</th>
                                            <th>Type d'utilisateur</th>
                                            <th>Action</th>
                                            <th>Date et heure de l\'action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Type d'utilisateur</th>
                                            <th>Action</th>
                                            <th>Date et heure de l\'action</th>
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($historiques as $historique )
                                        <tr>
                                          
                                            <td>
                                                <a href="" data-toggle="tooltip" ">{{$historique->user->nom}} {{$historique->user->prenom}}</a> 
                                            </td>
                                            <td style="color: #121f24;">
                                                <strong>{{$historique->user->role}}</strong> 
                                                </td>
                                            <td style="color: #32ade1;">
                                            <strong>{{$historique->action}}</strong> 
                                            </td>
                                            <td style="color: #e05555;">
                                                <strong> {{$historique->created_at->format('d/m/Y')}} à {{$historique->created_at->timezone('Europe/Paris')->format('H:i')}}</strong> 
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                       

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->




    @extends('admin.layout.footer')

    
@section('js-content')


<script>
</script>


@endsection
