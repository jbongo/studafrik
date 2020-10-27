
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


                    <div className="col-lg-9 column">
                        <div className="padding-left">
                            <div className="manage-jobs-sec">
                                <h3>Mes candidatures</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Candidatures</td>
                                            <td>Offre</td>
                                            <td>Date</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{ $offres }}
                                        <tr>
                                            <td>
                                                <div className="table-list-title">
                                                    <i>Société Génnérale</i><br />
                                                    <span><i className="la la-map-marker"></i>Libreville, Gabon</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div className="table-list-title">
                                                    <h3><a href="#" title="">Développeur mobile</a></h3>
                                                </div>
                                            </td>
                                            <td><span>3 septembre 2020</span><br />
                                            </td>
                                            <td>
                                                <ul className="action_job">
                                                    <li><span>Supprimer</span><a href="#" title=""><i className="la la-trash-o"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <div className="table-list-title">
                                                    <i>Société Génnérale</i><br />
                                                    <span><i className="la la-map-marker"></i>Libreville, Gabon</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div className="table-list-title">
                                                    <h3><a href="#" title="">Développeur mobile</a></h3>
                                                </div>
                                            </td>
                                            <td><span>3 septembre 2020</span><br />
                                            </td>
                                            <td>
                                                <ul className="action_job">
                                                    <li><span>Supprimer</span><a href="#" title=""><i className="la la-trash-o"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div className="table-list-title">
                                                    <i>Société Génnérale</i><br />
                                                    <span><i className="la la-map-marker"></i>Libreville, Gabon</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div className="table-list-title">
                                                    <h3><a href="#" title="">Développeur mobile</a></h3>
                                                </div>
                                            </td>
                                            <td><span>3 septembre 2020</span><br />
                                            </td>
                                            <td>
                                                <ul className="action_job">
                                                    <li><span>Supprimer</span><a href="#" title=""><i className="la la-trash-o"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        
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

@include('layouts.footer')
