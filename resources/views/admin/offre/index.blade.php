@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">offres</h1>
                  <hr>
                      <a href="{{route('admin.offre.create')}}" class="btn btn-success btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Ajouter une offre</span>
                    </a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Liste des offres</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Secteur d'activité</th>
                                            <th>Titre</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Type Contrat</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Date d'expiration</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Secteur d'activité</th>
                                            <th>Titre</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Type Contrat</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Date d'expiration</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($offres as $offre )
                                        <tr>
                                          
                                            <td>{{$offre->categorie}}</td>
                                            <td>{{$offre->titre}}</td>
                                            {{-- <td>{!! substr($offre->description, 0, 50) !!}...</td> --}}
                                            <td>{{$offre->type_contrat}}</td>
                                            <td>{{$offre->pays}}</td>
                                            <td>{{$offre->ville}}</td>
                                            <td>@if($offre->date_expiration != null ) {{$offre->date_expiration->format('d/m/Y')}} @endif</td>
                                            <td>    
                                                <a href="{{route('mes_offres.show', Crypt::encrypt($offre->id))}}" target="_blank" class="btn btn-primary btn-circle btn-sm  update" ><i class="fas fa-eye"></i></a>     
                                                <a href="{{route('admin.offre.edit', Crypt::encrypt($offre->id))}}" class="btn btn-success btn-circle btn-sm  update" ><i class="fas fa-edit"></i></a>     

                                                <a href="{{route('admin.offre.delete', Crypt::encrypt($offre->id))}}" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td>
                                            
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


    // ######### supprimer un offre
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
           
           
           
            swal({
                title: "Voulez-vous supprimer cet offre ?",
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



                    swal("Le offre a été supprimé !", {
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
