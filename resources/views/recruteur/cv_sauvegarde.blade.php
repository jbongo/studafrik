
 @include('layouts.topmenuhome')


 <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3>CV Sauvegardés </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>


 <section>
    <div class="block no-padding">
        <div class="container-fluid">
             <div class="row no-gape">

                 @include('layouts.leftmenu')

                 <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3>Mes profils sauvegardés</h3>
                            {{-- <div class="extra-job-info">
                                <span><i class="la la-clock-o"></i><strong>1</strong> Offres</span>
                                <span><i class="la la-file-text"></i><strong>0</strong> Candidatures</span>
                                <span><i class="la la-users"></i><strong>1</strong> Offres actives </span>
                            </div> --}}
                            @if (session('ok'))
                            <div class="alert alert-success ">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong> {{ session('ok') }}</strong>
                            </div>
                            @endif 
                            
                            <table>
                                <thead>
                                    <tr>
                                        <td>Nom</td>
                                        <td>Poste</td>
                                        <td>Secteur d'activité</td>
                                        <td>Pays</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $candidats as $candidat )
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                {{-- <h3><a href="#" title="">{{$candidat->nom}}</a></h3> --}}
                                                <span><i class="la la-user"></i>{{$candidat->prenom}}, {{$candidat->nom}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">{{$candidat->poste}}</span>
                                        </td>
                                        <td>
                                            <span>{{$candidat->categorie}} </span>
                                            
                                        </td>
                                        <td>
                                            <span>{{$candidat->pays}} </span>
                                           
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                            <li><span>Voir le profil</span><a href="{{route('user.show_profil', Crypt::encrypt($candidat->id) )}}" title=""><i class="la la-eye"></i></a></li>
                                            <li><span>Supprimer comme favoris</span><a class="supprimerxx" href="{{route('favoris.cv.delete',[Auth::user()->id, $candidat->id])}}" title=""><i class="la la-trash-o"></i></a></li>
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
			</div>
		</div>
	</section>
 

</div>

@extends('layouts.footer')

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
            $('[data-toggle="tooltip"]').tooltip('hide')
                $.ajax({                        
                    url: that.attr('href'),
                    type: 'GET',
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
