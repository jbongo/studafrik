@include('layouts.topmenupage')


<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Qui Sommes Nous ?</h3>
                            {{-- <span>Keep up to date with the latest news</span> --}}
                        </div>
                        {{-- <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">About Us</a></li>
                            </ul>
                        </div> --}}
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
                                <h3 style="color: #f66551">• QU’EST-CE QUE STUD’AFRIK ?</h3>
                                <br><br>
                            </div>
                             <div class="col-lg-7 col-md-7 col-sm-7">
                                <p>
                                
                                    Stud’Afrik est une plateforme de recherche d’emploi et stages. Elle permet de
                                    mettre en relation des entreprises, toutes tailles et tous secteurs confondus & des
                                    étudiants/ jeunes diplômés en quête d’une opportunité professionnelle en Afrique
                                    francophone.
                                </p>
                                <p>
                                    Les étudiants et jeunes diplômés sont le coeur de cible de Stud’Afrik pour la simple
                                    et bonne raison que les plateformes existantes ne ciblent pas suffisamment cette
                                    population dans les offres proposées, encore moins en Afrique.
                                    Le but est non seulement de balayer le maximum de postes et secteurs (des jobs
                                    aux CDI demandant maximum 3 ans d’expérience) en partageant des offres
                                    complètes, qui répondent à notre coeur de cible et venant d’entreprises fiables et
                                    bienveillantes pour accompagner les candidats.
                                </p>
                                <p>
                                    Rechercher une offre sur Stud’Afrik c’est avoir la possibilité de saisir une
                                    opportunité qui nous correspond même si on a peu d’expérience et même si on
                                    n’est pas le « fils/ neveu de ».
                                    Stud’Afrik c’est aussi accéder à des articles conseils, des inspirations, des
                                    informations sur le code du travail…
                                </p>
                             </div>
                             <div class="col-lg-5 col-md-5 col-sm-5">
                                <video controls autoplay height="300px" width="500px">
                                    <source src="{{asset('videos/qui_somme_nous.mp4')}}"
                                    type="video/mp4">
                                    Your browser does not support the video tag.
                                  </video>
                        
                             </div>
                             <div class="col-lg-7 col-md-7 col-sm-7">
                                 <br><br>
                                <h3 style="color: #f66551">• POURQUOI MENER CE PROJET ? </h3> 
<br>
                                <p>  Au delà de mettre en contact des jeunes talents et des entreprises, nous aimons à
                                 penser que Stud’Afrik servira de boîte à outils aux personnes passant par notre site
                                 afin d’affronter leur recherche d’emploi en Afrique avec sérénité, en ayant du choix
                                 et surtout en toutes connaissances de cause. Nous souhaitons pour cette plateforme
                                 de répondre aux réalités du terrain, de donner aux chercheurs d’emploi l’offre qui
                                 leur correspond et permettre aux entreprises, startups et entrepreneurs de trouver le
                                 talent qui leur manquait.
                             </p>
                             </div>

                             <div class="col-lg-5 col-md-5 col-sm-5">
                                <br><br>
                                <img src="{{asset('images/qui_sommes_nous.jpeg')}}" alt="" height="300px" width="500px" />
                            </div>
                         </div>
                         <div class="tags-share">
                             <div class="share-bar">
                                 <a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="share-google"><i class="la la-google"></i></a><span>Share</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>




@include('layouts/footer')
