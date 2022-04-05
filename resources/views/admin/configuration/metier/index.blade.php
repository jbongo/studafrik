@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste Métiers </h1>
                  <hr>
                      <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModalCenter">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Ajouter un Métier</span>
                    </a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Métier</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Métier</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Métier</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($metiers as $metier )
                                        <tr>
                                            <td>{{$metier->nom}}</td>
                                            <td>    
                                                <a data-toggle="modal" data-target="#exampleModalCenter2" href="#" url="{{route('admin.metier.update', Crypt::encrypt($metier->id))}}" class="btn btn-success btn-circle btn-sm  update" nom="{{$metier->nom}}"><i class="fas fa-edit"></i></a>     

                                            <a href="{{route('admin.metier.delete', Crypt::encrypt($metier->id))}}" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td>
                                            
                                        </tr>
                                        @endforeach
                                       

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Button trigger modal -->

  
  <!-- Ajout d'une Métier -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau Métier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('admin.metier.store')}}">

                @csrf
                <div class="form-group">
                  <label for="nom" class="col-form-label">Métier :</label>
                  <input type="text" name="nom" class="form-control" id="nom" required>
                  @if ($errors->has('nom'))
                  <br>
                  <div class="alert alert-warning ">
                     <strong>{{$errors->first('nom')}}</strong> 
                  </div>
                  @endif
                </div>
               
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <input type="submit" class="btn btn-primary" value="Ajouter">
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- fin modal --}}


    <!-- Modification d'un Métier -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle2">Modifier le Métier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formupdate" action="">
    
                    @csrf
                    <div class="form-group">
                      <label for="nomupdate" class="col-form-label">Métier :</label>
                      <input type="text" name="nom" class="form-control" id="nomupdate" required>
                      @if ($errors->has('nom'))
                      <br>
                      <div class="alert alert-warning ">
                         <strong>{{$errors->first('nom')}}</strong> 
                      </div>
                      @endif
                    </div>
                   
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <input type="submit" class="btn btn-primary" id="modifier" value="Modifier">
            </div>
        </form>
          </div>
        </div>
      </div>
      {{-- fin modal --}}

    @extends('admin.layout.footer')

    
@section('js-content')
<script>


    // ######### supprimer un Métier
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
           
           
           
            swal({
                title: "Voulez-vous supprimer cet Métier ?",
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



                    swal("Le Métier a été supprimé !", {
                    icon: "success",
                    });

                } else {
                    swal("Suppression annulée");
                }
                });


                })
            })
</script>

{{-- Modification d'un Métier --}}
<script>

$('.update').click(function(){

pay = $(this).attr('nom');
url = $(this).attr('url');

    $('#nomupdate').val(pay);
    $('#formupdate').attr('action', url);

})





</script>


@endsection
