
@include('layouts.topmenupage')


{{-- 
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Welcome Ali TUFAN</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">



                    @include('layouts.leftmenu')

                    <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3>Mes candidatures</h3>
                            <table>
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
                                                    <li><span>Voir</span><a href="{{route('mes_offres.show',Crypt::encrypt($offre->id))}}" title=""><i class="la la-eye"></i></a></li>
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
			</div>
		</div>
	</section>

	



@include('layouts.footer')
