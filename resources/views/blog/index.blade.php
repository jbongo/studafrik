@section('title') 
Nos articles

@endsection
@include('layouts.topmenuhome')

<style>
.inner-header {
    padding-top: 50px;
   
}

.search_size{
    width: 40%;
    background:white;
    border-radius: 15px;
}

.search_size:hover{
    width: 70%;
    background: rgb(244, 235, 224);
    transition: width 0.5s,  background-color 2s, transform 2s;
}


.job-search>h4{
    margin-top:40px;
} 



@media (max-width: 991px) { 
    .menu_gauche_web{
        display: none;
    }
    .carousel_img{
        height: 350px;
    }
    .job-search>h4{
        margin-top:-20px;
        margin-bottom:-90px;
    }
    .menu-sec nav>ul>li>a {
   
    font-size: 14px;
   
    padding: 5px 5px;
} 
    
   

}

@media (min-width: 992px) { 
    .menu_gauche_mobile{
        display: none;
    }
    .search_mobile{
        display: none;
    }
    .carousel_img{
        height: 550px;
    }
        
   

}

</style>

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="" class="parallax scrolly-invisible no-parallax" ></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid gra">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search" >
                                <h4>Nos articles</h4>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div  style="background: #323232; float: left; width: 100%; padding-bottom: 2px;" >
  
        
    <div class="container">
            
        <div class="menu-sec row" >
            <div class="col-lg-12 col-md-12 col-sm-5 col-xs-4">                
                <nav style="float: left;">
                    <ul>
                        @foreach ($categories as $categorie )
                            <li class="menu-item" >
                                <a href="{{ route('article.rechercher') }}?&categorie={{$categorie->id}}" title="" style="font-size: 14px;">{{$categorie->nom}}</a>							
                            </li>
                        @endforeach
                        
                        @if(Route::current()->getName() == "article.rechercher" )
                        <li class="menu-item">
                            <a href="{{ route('blog.index') }}" title="">Tous les articles</a>							
                        </li>
                        @endif
                        
                    </ul>
                </nav><!-- Menus -->            
            </div>    
            <div class="col-sm-4 col-xs-4 search_mobile" >
                {{-- <div style="margin:auto; width:80%"> --}}
                                
                                
                    <form action="{{ route('article.rechercher') }}" class="rechercher" method="get" >
                        @csrf
                        <div class="row">
                            <div class="widget search_size">
                                <div class="search_widget_job no-margin ">
                                    <div class="field_w_search">
                                        <input placeholder="" name="mot_cle" type="text">
                                        <i class="la la-search"></i>
                                    </div><!-- Search Widget -->
                                </div>
                            </div>

                           
                        </div>
                   </form>
                   
                {{-- </div> --}}
            </div>    
            
        </div>
    </div>
    
</div>

@if(Route::current()->getName() != "article.rechercher" )
<section style="margin-top: 50px;">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           
                            @foreach ($articles as $article )

                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$article->id}}"></li>
                              

                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 carousel_img" src="{{asset($articles[4]->image)}}" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>{!! substr($articles[4]->titre, 0, 250) !!}</h3>
                                    {{-- <span style="color: white">{!! substr($articles[4]->description, 0, 150) !!}</span> --}}
                                </div>
                            </div>
                            @foreach ($articles as $article )

                                <div class="carousel-item">
                                    <img class="d-block w-100 carousel_img" src="{{asset($article->image)}}" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>{!! substr($article->titre, 0, 250) !!}</h3>
                                        {{-- <span style="color: white">{!! substr($article->description, 0, 150) !!}</span> --}}
                                    </div>
                                </div>

                            @endforeach
                         
                       
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                
                </div>
                
                
                <aside class="col-lg-3 column menu_gauche_web">
                  
                     
                     <form action="{{ route('article.rechercher') }}" class="rechercher" method="get" >
                        @csrf
                        <div class="row">
                            <div class="widget search_size">
                                <div class="search_widget_job no-margin">
                                    <div class="field_w_search">
                                        <input placeholder=""  name="mot_cle"  type="text">
                                        <i class="la la-search"></i>
                                    </div><!-- Search Widget -->
                                </div>
                            </div>

                           
                        </div>
                   </form>
                     
                     <div class="widget">
                        <h3>Posts récents </h3>
                        <div class="post_widget">
        
                           @foreach ($posts as $post)
                           <div class="mini-blog">
                               <span><a href="{{route('article.show',  $post->slug)}}" title=""><img src="{{asset($post->image)}}" alt="" /></a></span>
                               <div class="mb-info">
                                   <h3><a href="{{route('article.show', $post->slug )}}" title="">{{$post->titre}}</a></h3>
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
@endif


<section>
    <div class="block">
        <div class="container">
             <div class="row">
             
             
                 <div class="col-lg-12" style="margin-top: 100px; margin-bottom: 100px">
                     <div class="blog-sec">
                        <div class="row" id="masonry">

                            @if(sizeof($articles) > 0)
                          
                                @foreach ($articles as $article )

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="{{ route('article.show', $article->slug) }}" title=""><img src="{{asset($article->image)}}" alt="" /></a>
                                                <div class="blog-metas">
                                                    <a href="{{ route('article.show', $article->slug) }}" title="">{{$article->created_at->format('d/m/Y')}}</a>
                                                    <a href="{{ route('article.show', $article->slug) }}" title=""> {{ sizeof($article->commentaires()) }} commentaires</a>
                                                </div>
                                            </div>
                                            @php  
                                            $description = strip_tags($article->description) ;
                                            @endphp
                                            <div class="blog-details">
                                                <h3><a href="{{ route('article.show', $article->slug) }}" title="">{{$article->titre}}</a></h3>
                                                <p> {!! substr($description, 0, 250) !!} ... </p>
                                                <a href="{{ route('article.show', $article->slug) }}" title="">Lire la suite <i class="la la-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @else 
                            <div class="blog-details" style="font-weight: bold">
                                <h3><i> Aucun article trouvé !!!</i> </h3>
                                
                            </div>

                            @endif
                        </div>
                    </div>

                    <br><br>

                    {!!$articles->links()!!}


                    <br><br><br>
                    {{-- <div class="pagination">
                        <ul>
                            <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
                            <li><a href="">1</a></li>
                            <li class="active"><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><span class="delimeter">...</span></li>
                            <li><a href="">14</a></li>
                            <li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
                        </ul>
                    </div> --}}
                    
                </div>
                
              
                
                
             </div>
        </div>
    </div>
</section>


<aside class="col-lg-3 column menu_gauche_mobile">
         
      <div class="widget">
         <h3>Posts récents </h3>
         <div class="post_widget">

            @foreach ($posts as $post)
            <div class="mini-blog">
                <span><a href="{{route('article.show',  $post->slug)}}" title=""><img src="{{asset($post->image)}}" alt="" /></a></span>
                <div class="mb-info">
                    <h3><a href="{{route('article.show', $post->slug )}}" title="">{{$post->titre}}</a></h3>
                    <span>{{$post->created_at->format('d/m/Y')}}</span>
                </div>
            </div>
            @endforeach

         </div>
     </div>

 </aside>



@section('js-content')

<script>
    $('.la-search').click(function(){
        $('.rechercher').submit();
        console.log("hello");
    })
</script>
<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="3ea6cfb5-fb67-4b6d-84c3-829d34fa625f";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
@endsection
@include('layouts/footer')
