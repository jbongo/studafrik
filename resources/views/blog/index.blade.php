@section('title') 
Nos articles

@endsection
@include('layouts.topmenuhome')



<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="" class="parallax scrolly-invisible no-parallax" ></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid gra">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h4>Nos articles</h4>
                                <div style="margin:auto; width:80%">
                                
                                
                                    <form action="{{ route('article.rechercher') }}" method="get" >.
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="job-field">
                                                    <input type="text" name="mot_cle" class="form-control" placeholder="recherche par mot clé" value="{{isset($_GET['mot_cle']) ? $_GET['mot_cle'] :""}}" />
                                                    <i class="la la-keyboard-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="job-field">
                                                    <select name="categorie" class="chosen-city form-control">
                                                        @if($cat != null)
                                                            <option value="{{$cat->id}}">{{$cat->nom}}</option>
                                                            <option value="">Toutes les catégories</option>
    
    
                                                        @else 
                                                        <option value="">Toutes les catégories</option>
    
                                                        @endif
    
                                                        @foreach ($categories as $categorie )
                                                            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                                        @endforeach
                                                        
                                                        
                                                        
                                                    </select>
                                                    <i class="la la-briefcase"></i>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-2">
                                                <button type="submit"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                               
                            </div>
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
                 <div class="col-lg-12" style="margin-top: 100px; margin-bottom: 100px">
                     <div class="blog-sec">
                        <div class="row" id="masonry">

                            @foreach ($articles as $article )

                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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


@section('js-content')


<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="3ea6cfb5-fb67-4b6d-84c3-829d34fa625f";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
@endsection
@include('layouts/footer')
