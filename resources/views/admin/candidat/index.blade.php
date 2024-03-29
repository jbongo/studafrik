@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Candidats</h1>
                  <hr>
                      {{-- <a href="{{route('admin.candidat.create')}}" class="btn btn-success btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Ajouter un candidat</span>
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
                            <h6 class="m-0 font-weight-bold text-primary">Liste des candidats ({{sizeof($candidats)}})</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  id="example0" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         
                                            <th>Email</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
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
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Présentation</th>
                                            <th>Poste</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Date d'inscription</th>
                                            <th>Création profil</th>
                                            <th>Email Comfirmée</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($candidats as $candidat )
                                        <tr>
                                          
                                            <td>{{$candidat->email}}</td>
                                            <td>{{$candidat->nom}}</td>
                                            <td>{{$candidat->prenom}}</td>
                                            <td>{{$candidat->description}}</td>
                                            <td>{{$candidat->poste}}</td>
                                            <td>{{$candidat->pays}}</td>
                                            <td>{{$candidat->ville}}</td>
                                            <td> {{$candidat->created_at->format('d/m/Y')}} </td>
                                            <td> @if($candidat->profile_complete == true) <a type="button" class="btn btn-success"> terminée</a>  @else <button type="button" class="btn btn-danger">non terminée</button>  @endif</td>
                                            <td> @if($candidat->email_verified_at != null) <a type="button" class="btn btn-outline-success"> OUI</a>  @else <button type="button" class="btn btn-outline-danger">NON</button>  @endif</td>
                                            
                                            <td>    
                                              {{-- <a href="{{route('mes_candidats.show', $candidat->slug)}}" target="_blank" class="btn btn-primary btn-circle btn-sm  update" ><i class="fas fa-eye"></i></a>      --}}
                                                <a href="" class="btn btn-success btn-circle btn-sm  update" ><i class="fas fa-edit"></i></a>     

                                                <a href="" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td> 
                                            
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


    // ######### supprimer un candidat
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
           
           
           
            swal({
                title: "Voulez-vous supprimer cet candidat ?",
                // text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                //     showCancelButton: true,
            //     confirmButtonColor: '#DD6B55',
            //     confirmButtonText: '@lang('Oui')',
            //     cancelButtonText: '@lang('Non')',
                buttons: true,
                cancel:'true',
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({                        
                            url: that.attr('href'),
                            type: 'POST',
                            data: {"_token": "{{ csrf_token() }}"},
                            success: function(data){
                        document.location.reload();
                        },
                        error : function(data){
                            console.log(data);
                        }
                        })
                        .done(function () {
                                that.parents('tr').remove()
                        })



                    swal("Le candidat a été supprimé !", {
                    icon: "success",
                    });

                } else {
                    swal("Suppression annulée");
                }
                });


                })
            })
</script>


@endsection
