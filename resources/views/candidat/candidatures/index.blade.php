@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
@endsection

@include('layouts.topmenu_bo')

	<section>
		
			<div class="container-fluid">
				 
                 
    
                     <div class="col-12 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3>Mes candidatures</h3>
                            <table class="table table-striped table-bordered dt-responsive " style="width:100%; margin-top:25px">
                                <thead>
                                    <tr>
                                        <td>Candidatures</td>
                                        <td>Offre</td>
                                        <td>Date de candidature</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($offres as $offre)
                                    @if($offre->user->role == "recruteur")
                                        <tr>
                                            <td>
                                                <div class="table-list-title">
                                                    <i>{{$offre->user->nom}}</i><br />
                                                    <span><i class="la la-map-marker"></i>{{$offre->pays}}, {{$offre->ville}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    <h3><a href="#" title="">{{$offre->titre}}</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span> {{$offre->pivot->created_at->format('d/m/Y')}}</span><br />
                                            </td>
                                            <td>
                                                <ul class="action_job">
                                                    <li><span>Voir</span><a href="{{route('mes_offres.show',$offre->slug)}}" title=""><i class="la la-eye"></i></a></li>
                                                    {{-- <li><span>Supprimer</span><a href="#" title=""><i class="la la-trash-o"></i></a></li> --}}
                                                </ul>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                   
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>

 

                   
				 </div>
	
	</section>

	



    @extends('admin.layout.footer')



@section('js-content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"></script>

    

<script>

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
        } });
    } );
} );
    </script>

@endsection