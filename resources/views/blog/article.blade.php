@include('layouts.topmenupage')


    	    
<section>
    <div className="block no-padding  gray">
        <div className="container">
            <div className="row">
                <div className="col-lg-12">
                    <div className="inner2">
                        <div className="inner-title2">
                            <br>
                            <div class="row">
                                <div class="col-5 mx-auto">
                                    <h2>{{$article->titre}}</h2>

                                </div>
                            </div>
                           <hr>

                            
                           
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
                       
                         <div class="bs-thumbxxx"><img src="{{asset($article->image)}}" width="650px" height="330px" alt="" /></div>
                      
                         <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>30 Novembre 2020</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>0 commentaires</a></li><li><a href="#" title=""><i class="la la-file-text"></i>Emploi</a></li></ul>
                      
                      
                       
                         <h2>Comment faire un CV (Curriculum Vitae)</h2> 
                         
                         {!!$article->description!!}
                        
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
                             <form action="{{route('article.add_commentaire', $article->id)}}" method="POST">
                                 @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Commentaire</span>
                                         <div class="pf-field">
                                             <textarea name="commentaire" required></textarea>
                                         </div>
                                     </div>
                                     @if(!Auth::check())
                                     <div class="col-lg-8">
                                         <span class="pf-title">Votre nom</span>
                                         <div class="pf-field">
                                             <input type="text"  name="nom" required placeholder="" />
                                         </div>
                                     </div>
                                     <div class="col-lg-8">
                                         <span class="pf-title">Email</span>
                                         <div class="pf-field">
                                             <input type="email" name="email" required  placeholder="" />
                                         </div>
                                     </div>
                                   @endauth
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
