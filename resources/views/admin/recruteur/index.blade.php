@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">recruteurs</h1>
                  <hr>
                      {{-- <a href="{{route('admin.recruteur.create')}}" class="btn btn-success btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Ajouter un recruteur</span>
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
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des recruteurs ({{sizeof($recruteurs)}})</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  id="example0" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         
                                            <th>Email</th>
                                            <th>Raison sociale</th>
                                            <th>Présentation</th>
                                            <th>Poste</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Date d'inscription</th>
                                            <th>Création profil</th>
                                            <th>Email Comfirmée</th>

                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email</th>
                                            <th>Raison sociale</th>
                                          
                                            <th>Présentation</th>
                                            <th>catégorie</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Date d'inscription</th>
                                            <th>Création profil</th>
                                            <th>Email Comfirmée</th>

                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($recruteurs as $recruteur )
                                        <tr>
                                          
                                            <td>{{$recruteur->email}}</td>
                                            <td>{{$recruteur->nom}}</td>
                                   
                                            <td>{{$recruteur->description}}</td>
                                            <td>{{$recruteur->poste}}</td>
                                            <td>{{$recruteur->pays}}</td>
                                            <td>{{$recruteur->ville}}</td>
                                            <td> {{$recruteur->created_at->format('d/m/Y')}} </td>
                                            <td> @if($recruteur->profile_complete == true) <a type="button" class="btn btn-success"> terminée</a>  @else <button type="button" class="btn btn-danger">non terminée</button>  @endif</td>
                                            <td> @if($recruteur->email_verified_at != null) <a type="button" class="btn btn-outline-success"> OUI</a>  @else <button type="button" class="btn btn-outline-danger">NON</button>  @endif</td>
                                            <td>    
                                              {{-- <a href="{{route('mes_recruteurs.show', $recruteur->slug)}}" target="_blank" class="btn btn-primary btn-circle btn-sm  update" ><i class="fas fa-eye"></i></a>      --}}
                                                <a href="" class="btn btn-success btn-circle btn-sm  update" ><i class="fas fa-edit"></i></a>     

                                                <a data-href="{{route('admin.recruteur.delete', $recruteur->id)}}" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td> 
                                            
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


// ######### supprimer un recruteur

<script>
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
       
        
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
            const swalWithBootstrapButtons = swal.mixin({   
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
                 })
            swalWithBootstrapButtons({
                title: '@lang('Voulez-vous supprimer ce recruteur ?')',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: '@lang('Oui')',
                cancelButtonText: '@lang('Non')',
                
            }).then((result) => {
                if (result.value) {
                    
                        
        
                    $.ajax({
                        type: "POST",                       
                        url: that.attr('data-href'),
                        data: {"_token": "{{ csrf_token() }}"},
                       
                        // data: data,
                        success: function(data) {
                            
                            swal(
                                    'Supprimé',
                                    'Le recruteur a été supprimé \n ',
                                    'success'
                                )
                                
                                that.parents('tr').remove()
                            
                              
                        },
                        error: function(data) {
                            console.log(data);
                            
                            swal(
                                'Echec',
                                'Le recruteur n\'a pas été supprimé :)',
                                'error'
                            );
                        }
                    })
                    .done(function () {
                               that.parents('tr').remove()
                            })
                    ;
                    
                  
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                    'Annulé',
                    'Le recruteur n\'a pas été supprimé :)',
                    'error'
                    )
                }
            })
         })
    })
</script>



   


@endsection
