@include('layouts.topmenupage')


    	    
<section>
    <div className="block no-padding  gray">
        <div className="container">
            <div className="row">
                <div className="col-lg-12">
                    <div className="inner2">
                        <div className="inner-title2">
                            <h3>Blog</h3>
                            
                           
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
                     <div class="bloglist-sec">
                         <div class="blogpost style2">
                             <div class="blog-posthumb"> <a href="{{ route('article.show',1) }}" title=""><img src="https://www.jobboom.com/carriere/wp-content/uploads/2006/10/JBM_Illust-blogue_CV-770x433.png" alt="" /></a> </div>
                             <div class="blog-postdetail">
                                 <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>30 octobre, 2020</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>0 commentaires</a></li></ul>
                                 <h3><a href="{{ route('article.show',1) }}" title="">Comment faire un CV (Curriculum Vitae)</a></h3>
                                 <p>
                                    Beaucoup de personnes se lancent dans la réalisation de leur CV sans même avoir pris le temps de prendre un peu de recul sur leur projet professionnel. Ainsi que de se demander « comment faire un CV de qualité ». Attention, précipitation n’est bien souvent pas synonyme de réussite.</p>
                                 <a class="bbutton" href="{{ route('article.show',1) }}" title="">Lire la suite <i class="la la-long-arrow-right"></i></a>
                             </div>
                         </div><!-- Blog Post -->

                         <div class="blogpost style2">
                            <div class="blog-posthumb"> <a href="{{ route('article.show',2) }}" title=""><img src="https://www.jobillico.com/blog/wp-content/uploads/2019/12/Trouver-un-emploi-700x465.jpg" alt="" /></a> </div>
                            <div class="blog-postdetail">
                                <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>30 octobre, 2020</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>0 commentaires</a></li></ul>
                                <h3><a href="{{ route('article.show',2) }}" title="">10 choses à faire pour trouver un emploi</a></h3>
                                <p>
                                    En cherchant sur Internet, vous trouverez des centaines de méthodes vous promettant de trouver un emploi en 30 jours, parfois 15 jours ou moins! . L’important n’est pas de trouver un emploi très vite, mais de trouver un emploi qui vous rend heureux.
                                </p>
                                <a class="bbutton" href="{{ route('article.show',2) }}" title="">Lire la suite <i class="la la-long-arrow-right"></i></a>
                            </div>
                        </div><!-- Blog Post -->
                        
                         <div class="pagination">
                            <ul>
                                <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Précédent</a></li>
                                <li><a href="">1</a></li>
                                <li class="active"><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><span class="delimeter">...</span></li>
                                <li><a href="">14</a></li>
                                <li class="next"><a href="">Suivant <i class="la la-long-arrow-right"></i></a></li>
                            </ul>
                        </div><!-- Pagination -->
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
