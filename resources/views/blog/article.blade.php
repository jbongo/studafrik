@include('layouts.topmenupage')


    	    
<section>
    <div className="block no-padding  gray">
        <div className="container">
            <div className="row">
                <div className="col-lg-12">
                    <div className="inner2">
                        <div className="inner-title2">
                            @if($num == 1)
                            <h2>Comment faire un CV (Curriculum Vitae)</h2>

                            @else 
                            <h2>10 choses à faire pour trouver un emploi</h2>

                            @endif
                            
                           
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
                 <div class="col-lg-9 column">
                     <div class="blog-single">
                        @if($num == 1)
                         <div class="bs-thumb"><img src="https://www.jobboom.com/carriere/wp-content/uploads/2006/10/JBM_Illust-blogue_CV-770x433.png" alt="" /></div>
                        @else 
                            <div class="bs-thumb"><img src="https://www.jobillico.com/blog/wp-content/uploads/2019/12/Trouver-un-emploi-700x465.jpg" alt="" /></div>

                        @endif
                         <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>30 Novembre 2020</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>0 commentaires</a></li><li><a href="#" title=""><i class="la la-file-text"></i>Emploi</a></li></ul>
                      
                      
                         @if($num == 1)
                         <h2>Comment faire un CV (Curriculum Vitae)</h2>
                         
                         <p>

                            Beaucoup de personnes se lancent dans la réalisation de leur CV sans même avoir pris le temps de prendre un peu de recul sur leur projet professionnel. Ainsi que de se demander « comment faire un CV de qualité ». Attention, précipitation n’est bien souvent pas synonyme de réussite.

La réalisation d’un CV nécessite un certain travail de réflexion sur soit-même, de qui nous sommes et de ce que l’on recherche. Faire un CV demande du temps. Celui-ci devra être clair et attirer l’attention du recruteur. C’est pourquoi nous te proposons sur notre site web de nombreux modèles de CV à télécharger gratuit au format Word.

Tu trouveras ci-dessous les principaux points clés et astuces pour faire de ton CV une arme affutée pour attaquer ta recherche d’emploi.
<br> <br>
Qu’est-ce qu’un Curriculum Vitae
Quand tu te poses la question de « Comment faire un CV« , il est tout d’abord important de comprendre ce qu’est le CV. Le CV est un document qui présente les grandes étapes de ta vie professionnelle et personnelle. Il est composé de différentes parties : « Informations personnelles (contact) », « Compétences », « Expériences professionnelles », « Formations (Etudes) » et « Centres d’intérêts ».

Un CV de qualité doit refléter ta personnalité et attirer l’attention du recruteur. Il faut savoir qu’un recruteur passe environ entre 5 et 15 secondes sur chaque CV avant de faire une première sélection. Tu dois donc dans ce laps de temps réussir à le convaincre, afin d’espérer être convoqué au fameux entretien. Ton Curriculum Vitae doit te « vendre ». Il doit respecter certaines règles de présentation, être clair et transmettre le message que tu souhaites faire passer aux recruteurs.
                         </p>
                         @else 
                         <h2>10 choses à faire pour trouver un emploi</h2>

                         En cherchant sur Internet, vous trouverez des centaines de méthodes vous promettant de trouver un emploi en 30 jours, parfois 15 jours ou moins!

                         L’important n’est pas de trouver un emploi très vite, mais de trouver un emploi qui vous rend heureux.
                         
                         De la volonté, quelques modifications sur votre CV, sur votre lettre de présentation et sur vos réseaux sociaux ainsi qu’une bonne organisation peuvent faire la différence aux yeux des recruteurs et vous faire tirer du lot des candidats qui postulent aux mêmes offres d’emploi que vous.
                         
                         Avant de passer ces conseils en revue, nous vous proposons un sommaire des choses à faire pour trouver un emploi rapidement:
                         
                         <br>
                         <p> 
                         Mettez à jour votre CV
                         Trouvez le temps nécessaire pour votre recherche d’emploi
                         Faites le tri dans ce que vous voulez et ne voulez pas faire
                         Remettez-vous en question et passez en revue vos compétences
                         Vendez vos talents de la meilleure façon possible
                         Soignez votre e-réputation
                         Établissez une stratégie de recherche
                         Restez à l’affût des nouveautés du marché du travail
                         Affinez votre recherche et classez les offres d’emploi
                         Essayez la candidature spontanée
                        </p>
                         Voici donc en détail nos conseils pour savoir comment trouver un emploi qui vous correspond rapidement:
                         @endif
                        
                         <div class="tags-share">
                               
                             <div class="share-bar">
                                 {{-- <a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="share-google"><i class="la la-google"></i></a><span>Share</span> --}}
                             </div>
                         </div>
                         {{-- <div class="post-navigation ">
                             <div class="post-hist prev">
                                 <a href="#" title=""><i class="la la-arrow-left"></i><span class="post-histext">Prev Post<i>Hey Job Seeker, It’s Time</i></span></a>
                             </div>
                             <div class="post-hist next">
                                 <a href="#" title=""><span class="post-histext">Next Post<i>11 Tips to Help You Get New</i></span><i class="la la-arrow-right"></i></a>
                             </div>
                         </div> --}}
                         <div class="comment-sec">
                             <h3>0 commentaires</h3>
                             <ul>
                        
                                 <li>
                                     {{-- <div class="comment">
                                         <div class="comment-avatar"> <img src="http://placehold.it/90x90" alt="" /> </div>
                                         <div class="comment-detail">
                                             <h3>Kate ROSELINE</h3>
                                             <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>Jan 16, 2016 07:48 am</a></div>
                                             <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement tantaneously eel valiantly petted this along across highhandedly much. </p>
                                             <a href="#" title=""><i class="la la-reply"></i>Reply</a>
                                         </div>
                                     </div> --}}
                                 </li>
                             
                             </ul>
                         </div>
                         <div class="commentform-sec">
                             <h3>Laissez un commentaire</h3>
                             <form>
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Commentaire</span>
                                         <div class="pf-field">
                                             <textarea></textarea>
                                         </div>
                                     </div>
                                     <div class="col-lg-8">
                                         <span class="pf-title">Votre nom</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="" />
                                         </div>
                                     </div>
                                     <div class="col-lg-8">
                                         <span class="pf-title">Email</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="" />
                                         </div>
                                     </div>
                                   
                                     <div class="col-lg-12">
                                         <button type="submit">Terminer</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                </div>
                <aside class="col-lg-3 column">
                    <div class="widget">
                         <div class="search_widget_job no-margin">
                             <div class="field_w_search">
                                 <input placeholder="rechercher" type="text">
                                 <i class="la la-search"></i>
                             </div><!-- Search Widget -->
                         </div>
                     </div>
                     <div class="widget">
                         <h3>Categories</h3>
                         <div class="sidebar-links">
                             <a href="#" title=""><i class="la la-angle-right"></i>Education</a>
                             
                             <a href="#" title=""><i class="la la-angle-right"></i>Emploi</a>
                         </div>
                     </div>
                     <div class="widget">
                         <h3>Posts récents </h3>
                         <div class="post_widget">
                             <div class="mini-blog">
                                 <span><a href="#" title=""><img src="http://placehold.it/74x64" alt="" /></a></span>
                                 <div class="mb-info">
                                     <h3><a href="#" title="">Comment faire un CV (Curriculum Vitae)</a></h3>
                                     <span>30 Novembre 2020</span>
                                 </div>
                             </div>
                            
                         </div>
                     </div>
             
           
                    
                </aside>
             </div>
        </div>
    </div>
</section>




@include('layouts/footer')
