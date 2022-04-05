@include('layouts.topmenu_bo')

<style>
    .btn-link:hover {
       color:white;
       text-decoration: none;
    }
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Gestion des offres d'emploi</h1>
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
                             
                            <div class="extra-job-info" style="margin-bottom:25px">
                                <span><i class="fas fa-clipboard-list"></i> &nbsp <strong>{{$nb_offres}}</strong> Offres</span>&nbsp &nbsp
                                <span><i class="fas fa-clipboard-list" style="color:#EE6E49"></i> &nbsp <strong>{{$nb_offres_actives}}</strong> Offres actives </span>&nbsp &nbsp
                                <span><i class="fas fa-list" style="color:#323232" ></i> &nbsp <strong>{{$nb_candidatures}}</strong> Candidatures</span>&nbsp &nbsp
                            </div>
                      
                        
                        
                        <table id="example" class="table table-striped table-bordered dt-responsive " style="width:100%; margin-top:25px">
                                
                                <thead>
                                    <tr style="color: #EB586C; font-weigth:bold">
                                        <td>Titre</td>
                                        <td>Candidatures</td>
                                        <td>Date de création et expiration</td>
                                        <td>Statut</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- {{dd($offres)}} --}}
                                    @foreach ( $offres as $offre )

                                    
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h6><a href="{{route('mes_offres.show', $offre->slug)}}" target="_blank" title="" style="color:#EE6E49">{{$offre->titre}}</a></h6>
                                                <span><i class="la la-map-marker"></i>{{$offre->ville}}, {{$offre->pays}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span style="font-size: 16px; font-weight:bold" class="applied-field">{{sizeof($offre->users)}}</span>&nbsp; <a href="{{route('candidatures.index_recruteur', $offre->slug )}}"  target="_blank" data-toggle="tooltip" title="Voir les candidatures"><i class="la la-eye"></i></a>
                                             
                                        </td>
                                        <td>
                                            <span>{{$offre->created_at->format('d/m/Y')}} -- </span>
                                            <span> @if($offre->date_expiration != null ) {{$offre->date_expiration->format('d/m/Y')}} @endif</span>
                                        </td>
                                        <td>
                                            @if($offre->active == true)
                                                <span class="status active">Active</span>
                                            @else
                                                <span class="status">inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <a href="{{route('mes_offres.show', $offre->slug)}}" target="_blank" title="Voir l'offre" data-toogle="tooltip" class="btn btn-primary btn-circle btn-sm  update" ><i class="fas fa-eye"></i></a>      
                                                <a href="{{route('mes_offres.edit', $offre->slug )}}" title="Modifier l'offre" class="btn btn-success btn-circle btn-sm  update" ><i class="fas fa-edit"></i></a>     
                                                <a href="{{route('mes_offres.delete', Crypt::encrypt($offre->id) )}}" title="Supprimer l'offre" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a>  
                                               
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
                <!-- /.container-fluid -->


  

    @extends('admin.layout.footer')

    
@section('js-content')



<script>



    // ######### supprimer une offre
    $(function() {

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        // $('[data-toggle="tooltip"]').tooltip()
        
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            console.log(that.attr('href'));
            e.preventDefault()

            const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
})
    swalWithBootstrapButtons({
        title: 'Confirmez-vous la suppression de cette offre ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: '@lang('Oui')',
        cancelButtonText: '@lang('Non')',
        
    }).then((result) => {
        if (result.value) {
            // $('[data-toggle="tooltip"]').tooltip('hide')
                $.ajax({                        
                    url: that.attr('href'),
                    type: 'GET',
                    success: function(data){
                //    document.location.reload();
                console.log(data);
                
                 },
                 error : function(data){
                    console.log(data);
                 }
                })
                .done(function () {
                        that.parents('tr').remove()
                })
            swalWithBootstrapButtons(
            'Supprimée!',
            'L\'offre a bien été supprimée.',
            'success'
            )
            
            
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
            'Annulé',
            'L\'offre n\'a pas été supprimée.',
          
            'error'
            )
        }
    })
        })
    })

</script>


@endsection
