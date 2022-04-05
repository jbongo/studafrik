@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Newsletters</h1>
                  <hr>
                     
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
                            <h6 class="m-0 font-weight-bold text-primary">Newsletters</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Email</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($newsletters as $newsletter )
                                        <tr>
                                            <td>{{$newsletter->email}}</td>
                                            <td>    
                                                {{-- <a data-toggle="modal" data-target="#exampleModalCenter2" href="#" url="" class="btn btn-success btn-circle btn-sm  update" nom="{{$newsletter->nom}}"><i class="fas fa-edit"></i></a>     

                                            <a href="{{route('admin.newsletter_offre.delete', Crypt::encrypt($newsletter->id))}}" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td>
                                             --}}
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

  

  {{-- fin modal --}}



    @extends('admin.layout.footer')

    
@section('js-content')
<script>


    // ######### supprimer une offre
    $(function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('body').on('click','a.supprimer',function(e) {
            let that = $(this)
            e.preventDefault()
           
           
           
            swal({
                title: "Voulez-vous supprimer cette catégorie ?",
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



                    swal("La catégorie a été supprimée !", {
                    icon: "success",
                    });

                } else {
                    swal("Suppression annulée");
                }
                });




           
            // const swalWithBootstrapButtons = swal.mixin({
            //     confirmButtonClass: 'btn btn-success',
            //     cancelButtonClass: 'btn btn-danger',
            //     buttonsStyling: false,
            //     })
            // swalWithBootstrapButtons({
            //     title: 'Confirmez-vous la suppression de cette offre ?',
            //     type: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#DD6B55',
            //     confirmButtonText: '@lang('Oui')',
            //     cancelButtonText: '@lang('Non')',
                
            // }).then((result) => {
            //     if (result.value) {
            //         $('[data-toggle="tooltip"]').tooltip('hide')
            //             $.ajax({                        
            //                 url: that.attr('href'),
            //                 type: 'GET',
            //                 success: function(data){
            //             document.location.reload();
            //             },
            //             error : function(data){
            //                 console.log(data);
            //             }
            //             })
            //             .done(function () {
            //                     that.parents('tr').remove()
            //             })
            //         swalWithBootstrapButtons(
            //         'Supprimée!',
            //         'L\'offre a bien été supprimée.',
            //         'success'
            //         )
                    
                    
            //     } else if (
            //         // Read more about handling dismissals
            //         result.dismiss === swal.DismissReason.cancel
            //     ) {
            //         swalWithBootstrapButtons(
            //         'Annulé',
            //         'L\'offre n\'a pas été supprimée.',
                
            //         'error'
            //         )
            //     }
            // })






                })
            })
</script>

{{-- Modification d'une offre --}}
<script>

$('.update').click(function(){

newsletter = $(this).attr('nom');
url = $(this).attr('url');

    $('#nomupdate').val(newsletter);


    $('#formupdate').attr('action', url);

})

</script>


@endsection
