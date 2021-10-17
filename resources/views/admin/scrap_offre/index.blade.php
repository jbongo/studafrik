@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">offres scrappées</h1>
                  <hr>
                      <a href="{{route('admin.offre.create')}}" class="btn btn-success btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        {{-- <span class="text">Ajouter une offre</span> --}}
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
                                <table class="table table-bordered"  id="example0" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                                                                    
                                            <th>Site</th>
                                            <th>Titre</th>
                                            <th>Annonce</th>
                                          
                                            <th>Nom entreprise</th>
                                            <th>Logo</th>
                                            <th>Pays</th>
                                            <th>Url de l'offre</th>
                                            
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>Site</th>
                                            <th>Titre</th>
                                            <th>Annonce</th>
                                         
                                            <th>Nom entreprise</th>
                                            <th>Logo</th>
                                            <th>Pays</th>
                                            <th>Url de l'offre</th>
                                            

                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($offres as $offre )
                                        <tr>
                                          
                                            <td><label class="text-danger"> {{$offre->site}} </label></td>
                                            <td>{!! substr($offre->titre,0,150) !!}...</td>
                                            <td>{!! substr($offre->annonce, 0, 50) !!}...</td>
                                            <td>{{$offre->nom_entreprise}}</td>
                                            <td>  <img src="{{$offre->logo_entreprise}}"  height="" alt=""> </td>
                                            <td>{{$offre->pays}}</td>
                                            <td>  <a href="{{$offre->url}}"><i class="fas fa-eye"></i></a> </td>
                                           

                                            <td>    
                                                <a href="{{route('admin.scrap_offre.show', $offre->id)}}" class="btn btn-success btn-circle btn-sm  update" title="Voir l'offre" ><i class="fas fa-eye"></i></a>     
                                                <a href="{{route('admin.offre.create', $offre->id)}}"  class="btn btn-primary btn-sm  " title="Créer l'offre" ><i class="fas fa-plus"></i> </a>     
                                                {{-- 
                                                <a href="{{route('admin.offre.a rchiver', $offre->id)}}" class="btn btn-warning btn-circle btn-sm archiver" title="Archiver cette offre"><i class="fas fa-archive"></i></a> --}}
                                                <a href="{{route('admin.scrap_offre.delete', $offre->id )}}" class="btn btn-danger btn-circle btn-sm supprimer" title="Supprimer cette offre" ><i class="fas fa-trash"></i></a> 
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

    // ######### archiver un offre
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.archiver',function(e) {
            let that = $(this)
            e.preventDefault()
           
           
           
            swal({
                title: "Voulez-vous archiver cette offre ?",
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



                    swal("Le offre a été archivé !", {
                    icon: "success",
                    });

                } else {
                    swal("Archive annulée");
                }
                });


                })
            })
</script>


@endsection
