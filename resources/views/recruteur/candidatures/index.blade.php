
 @include('layouts.topmenupage')


 {{-- <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3>{{Auth::user()->nom }} </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section> --}}





 <section>
    <div class="block remove-top">
        <div class="container-fluid">
             <div class="">

        
                    @include('layouts.leftmenu')
            

                 <div class="col-10 column">
                    @if (session('ok'))
                    <div class="alert alert-success alert-dismissible ">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong> {{ session('ok') }}</strong>
                    </div>
                    @endif

                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3>Candidatures</h3>
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
                                                <h3><a href="{{route('user.telecharger_cv', $candidature->id )}}" title="Voir le profil">{{$candidature->nom}} {{$candidature->prenom}}</a></h3>
                                            </div>
                                        </td>
                                        <td>
                                            {{$candidature->pivot->created_at->format('d/m/Y')}} 
                                        </td>
                                        <td>
                                            <span> @if($candidature->pivot->cv != null ) <a href="{{route('user.telecharger_cv', $candidature->id )}}" title="" class="btn btn-danger " id="telechargercv">Télécharger le CV</a> @else <span style="color: #EB586C; font-weigth:bold"> Pas de CV </span> @endif</span>
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
		</div>
	</section>
 
    

</div>

@extends('layouts.footer')


@section('js-content')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}

{{-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"></script> --}}



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







$(document).ready(function() {

    var table = $('#example').DataTable( {
        fixedHeader: true,
        "order": [],
            "iDisplayLength": 50,
            "language": {
            "decimal":        "",
            "emptyTable":     "Aucune donnée disponible dans le tableau",
            "info":           "Affichage _START_ à _END_ sur _TOTAL_ lignes",
            "infoEmpty":      "Affichage 0 à 0 sur 0 lignes",
            "infoFiltered":   "(filtrés sur _MAX_ total lignes)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Voir _MENU_ lignes",
        
           
            "search":         "Rechercher:",
            "zeroRecords":    "Aucune donnée trouvée",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Suivant",
                "previous":   "Précédent"
    } } });


     




});
</script>




@endsection
