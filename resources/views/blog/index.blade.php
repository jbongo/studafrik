@include('layouts.topmenupage')


    	    

<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3>Nos articles</h3>
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



@include('layouts/footer')
