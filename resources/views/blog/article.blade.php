@include('layouts.topmenupage')


    	    
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <br>
                            <div class="row">
                                <div class="col-10 mx-auto">
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

<section style="margin-top: 35px">
    <div class="block">
        <div class="container">
             <div class="row">
                 <div class="col-lg-9 column">
                    @if (session('ok'))
                    
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('ok') }}</li>
                                
                            </ul>
                        </div>
                    @endif


                     <div class="blog-single">
                       
                         <div class="bs-thumbxxx"><img src="{{asset($article->image)}}" width="100%" height="330px" alt="" /></div>
                      
                         <ul class="post-metas" style="margin-top: 30px"><li><a href="#" title=""><i class="la la-calendar-o"></i>{{$article->created_at->format('d/m/Y')}}</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>{{ sizeof($article->commentaires()) }} commentaires</a></li></ul>
                      
                      
                       
                         <h2>{{$article->titre}}</h2> 
                         
                        
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
                             <h3>{{sizeof($commentaires)}} commentaires</h3>
                             <ul>
                        
                                 <li>
                                     @foreach ($commentaires as $commentaire)
                                         
                                     
                                     <div class="comment">
                                         <div class="comment-avatar"> <img width="50px" height="70px" src="{{ ($commentaire->user_id != null && $commentaire->user->photo_profile!= null) ? asset('images/photo_profil/'.$commentaire->user->photo_profile) : asset('images/profil/profil.png') }}" alt="" /></div>
                                         <div class="comment-detail">
                                             <h3>{{$commentaire->nom}}</h3>
                                             <div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>{{$commentaire->created_at->format('d/m/Y H:m')}}</a></div>
                                             <p>{{$commentaire->commentaire}} </p>
                                             {{-- <a href="#" title=""><i class="la la-reply"></i>Repondre</a> --}}
                                         </div>
                                     </div> 

                                     @endforeach
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
                                 <br><br>

                             </form>
                         </div>
                     </div>
                </div>
                <aside class="col-lg-3 column">
                    {{-- <div class="widget">
                         <div class="search_widget_job no-margin">
                             <div class="field_w_search">
                                 <input placeholder="rechercher" type="text">
                                 <i class="la la-search"></i>
                             </div><!-- Search Widget -->
                         </div>
                     </div> --}}
 
                     <div class="widget">
                         <h3>Posts récents </h3>
                         <div class="post_widget">

                            @foreach ($posts as $post)
                            <div class="mini-blog">
                                <span><a href="{{route('article.show', Crypt::encrypt($post->id))}}" title=""><img src="{{asset($post->image)}}" alt="" /></a></span>
                                <div class="mb-info">
                                    <h3><a href="{{route('article.show', Crypt::encrypt($post->id))}}" title="">{{$post->titre}}</a></h3>
                                    <span>{{$post->created_at->format('d/m/Y')}}</span>
                                </div>
                            </div>
                            @endforeach

                            
                            
                         </div>
                     </div>
             
           
                    
                </aside>
             </div>
        </div>
    </div>
</section>




@include('layouts/footer')
