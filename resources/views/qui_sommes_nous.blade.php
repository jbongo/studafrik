@section('title') 
Qui sommes nous
@endsection

@include('layouts.topmenuhome')


	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideDashboard"><img src="{{asset('images/header/header9.png')}}" height="500px" width="1900px" alt="" /></li>
								{{-- <li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li>
								<li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li> --}}
							</ul>
							<div class="job-search-sec" style="margin-bottom: ">
								<div class="job-search style2">
									<h3>Qui Sommes Nous ?</h3>
									{{-- <span>Find Jobs, Employment & Career Opportunities</span> --}}
						
									

								</div>
							
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3></h3>
                            {{-- <span>Keep up to date with the latest news</span> --}}
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="about-us">
                         <div class="row">
                             <div class="col-12">
                                 <br><br>
                               
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify; ">
                                <h3 style="color: #EE6E49; text-align:center; font-weight:bold">Stud’Afrik c’est…. </h3>
                                <br><br>
                                <br><br>


                                <p>
                                
                                    …Une plateforme de recherche d’emploi et stages permettant de mettre en relation des entreprises, de toutes tailles et tous secteurs confondus,
                                     et des étudiants ou jeunes diplômés en quête d’une opportunité professionnelle en Afrique francophone.
                                </p>
                                <p>
                                    Les étudiants et jeunes diplômés sont le coeur de cible de Stud’Afrik en raison d’un constat :  les plateformes existantes ne ciblent pas suffisamment
                                     cette population dans les offres proposées, encore moins en Afrique francophone. 
                                </p>
                                <p>
                                    Rechercher une offre sur Stud’Afrik c’est avoir la possibilité de saisir une opportunité qui nous correspond même si on a peu d’expérience. 
                                </p>
                                <p>
                                    C’est aussi accéder à des articles conseils, des inspirations, des informations sur le code du travail...

                                </p>
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify; ">
                                <h3 style="color: #EE6E49; text-align:center; font-weight:bold">Notre mission  </h3> 
                                <br><br>
                                <br><br>
                                <p>  
                                    Au-delà de mettre en contact des jeunes talents et des entreprises, nous aimons à
                                    penser que Stud’Afrik servira de « boîte à outils » aux personnes passant par notre
                                    site afin d’affronter leur recherche d’emploi ou de talents avec sérénité, en ayant du choix et surtout avec toutes les informations nécessaires à ce choix. 
                                    
                                </p>

                                <p>
                                    Nous souhaitons pour cette plateforme de répondre aux réalités du terrain, de
                                    donner aux chercheurs d’emploi l’offre qui leur correspond et permettre aux entreprises, startups et entrepreneurs de trouver le talent qui leur manquait.
                                    
                                </p>

                             </div>

                          
                         </div>

                         <div class="row">
                            
<div class="col-lg-3 col-md-3 col-sm-3"></div>

                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify; ">


                        
                                <h3 style="color: #EE6E49; text-align:center; font-weight:bold; margin-top:25px">Nos valeurs </h3> 
                                <br><br>
                                <br><br>
                                <p>  
                                    Le travail d’équipe : c’est ensemble, par nos expériences, que nous avançons vers un but commun. 
                                    
                                </p>

                                <p>
                                    Le respect et la tolérance entre nous, envers notre communauté et les entreprises qui nous font confiance. 

                                </p>
                                <p>
                                    L’innovation : c’est ce qui a fait naître Stud’Afrik: nous sommes sans cesse en quête de nouveauté et d’innovation.
                                </p>
                             </div>

<div class="col-lg-3 col-md-3 col-sm-3"></div>

                         </div>
                         
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>

<section style="margin-top: 75px; " >
    <div class="block gray" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 55px; margin-bottom: 155px">
                    <div class="heading">
                        <h2>Notre Stud'Equipe</h2>
                        {{-- <span>Notre belle équipe dynamique</span> --}}
                    </div><!-- Heading -->
                    <div class="team-sec">
                        <div class="row" id="team-carousel">
                            <div class="col-lg-3">
                                <div class="team">
                                    <div class="team-img"><img src="{{asset('images/team/yeelen.png')}}" width="121px" height="121px" alt="" /></div>
                                    <div class="team-detail">
                                        <h3><a href="#" title="">Yeelen </a></h3>
                                        <span>Co-fondatrice et Chargée des opérations</span>
                                        {{-- <p>Passionnée des outils de communication…</p> --}}
                                        <a href="https://www.linkedin.com/in/yremp/" target="_blank" style="color: #f66551" title="">Voir Profil Linkedin <i class="la la-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- Team -->
                            </div>
                            <div class="col-lg-3">
                                <div class="team">
                                    <div class="team-img"><img src="{{asset('images/team/morgane.png')}}" width="121px" height="121px" alt="" /></div>
                                    <div class="team-detail">
                                        <h3><a href="#" title="">Morgane </a></h3>
                                        <span>Co-fondatrice et Chargée Communication</span>
                                        {{-- <p>Passionnée des outils de communication…</p> --}}
                                        <a href="https://www.linkedin.com/in/morgane-lanoy/"  target="_blank" style="color: #f66551" title="">Voir Profil Linkedin <i class="la la-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- Team -->
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="team">
                                    <div class="team-img"><img src="{{asset('images/team/jean-philippe.jpeg')}}"  target="_blank" width="121px" height="121px" alt="" /></div>
                                    <div class="team-detail">
                                        <h3><a href="#" title="">Jean Philippe </a></h3>
                                        <span>Développeur</span>
                                        {{-- <p>Passionnée des outils de communication…</p> --}}
                                        <a href="https://www.linkedin.com/in/jean-philippe-bongo-0b8a89b8/"  target="_blank" style="color: #f66551" title="">Voir Profil Linkedin <i class="la la-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- Team -->
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="team">
                                    <div class="team-img"><img src="{{asset('images/team/anne-claire.png')}}" width="121px" height="121px" alt="" /></div>
                                    <div class="team-detail">
                                        <h3><a href="#" title="">Anne-Claire </a></h3>
                                        <span>SEO et Marketing Manager</span>
                                        {{-- <p>Passionnée des outils de communication…</p> --}}
                                        <a href="https://www.linkedin.com/in/anne-claire-ogandaga-rissonga-511989129/"  target="_blank" style="color: #f66551" title="">Voir Profil Linkedin <i class="la la-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- Team -->
                            </div>
                          
                            

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('js-content')


<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="3ea6cfb5-fb67-4b6d-84c3-829d34fa625f";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
@endsection

@include('layouts.footer')
