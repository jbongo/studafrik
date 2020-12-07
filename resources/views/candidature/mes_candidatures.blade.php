
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
                            <h3>Manage Jobs</h3>
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


                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <i>Massimo Artemisis</i><br />
                                                <span><i class="la la-map-marker"></i>Sacramento, California</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            </div>
                                        </td>
                                        <td>
                                            <span>October 27, 2017</span><br />
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>Supprimer</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
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
	</section>

	



@include('layouts.footer')
