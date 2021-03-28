
 @include('layouts.topmenuhome')

 <section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h4>Découvrir les entreprises</h4>
                                <form action="{{ route('user.bibliotheque.index') }}" method="get" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="job-field">
                                                <input type="text" name="raison_sociale" class="form-control" placeholder="Nom de l'entreprise" value="{{isset($_GET['raison_sociale']) ? $_GET['raison_sociale'] :""}}" />
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="job-field">
                                                <select name="categorie" class="chosen-city form-control">
                                                    @if($cat != null)
                                                        <option value="{{$cat}}">{{$cat}}</option>
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
                                        <div class="col-lg-3">
                                            <div class="job-field">
                                                <select name="pays" class="chosen-city form-control">
                                                    @if($pays != null)
                                                        <option value="{{$pays}}">{{$pays}}</option>
                                                        <option value="">Tous les pays</option>


                                                    @else 
                                                    <option value="">Tous les pays</option>

                                                    @endif
                                                    
                                                    @foreach ($payss as $pay )
                                                        <option value="{{$pay->nom}}">{{$pay->nom}}</option>
                                                    @endforeach
                                                  
                                                    
                                                </select>
                                                <i class="la la-map-marker"></i>
                                            </div>
                                        </div> 
                                        <div class="col-lg-1">
                                            <button type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                                {{-- <div class="tags-bar">
                                     <span>CDI<i class="close-tag">x</i></span>
                                     <span>UX/UI Design<i class="close-tag">x</i></span>
                                     <span>Gabon<i class="close-tag">x</i></span>
                                     <div class="action-tags">
                                         <a href="#" title=""><i class="la la-cloud-download"></i> Sauvegarder</a>
                                         <a href="#" title=""><i class="la la-trash-o"></i> Supprimer</a>
                                     </div>
                                 </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .box { cursor: pointer; }
    .emply-list.box { border:1px solid #EB586C } 
    .emply-list.box:hover { border:2px solid #323232 } 

    
</style>
<section>
    <div class="block gray less-top">
        <div class="container">
             <div class="row">
                 <aside class="col-lg-3 column margin_widget">
                     {{-- <div class="widget">
                         <div class="search_widget_job">
                             <div class="field_w_search">
                                 <input type="text" placeholder="Nom de l'entreprise" />
                                 <i class="la la-search"></i>
                             </div><!-- Search Widget -->
                             <div class="field_w_search">
                                 <input type="text" placeholder="Pays" />
                                 <i class="la la-map-marker"></i>
                             </div><!-- Search Widget -->
                         </div>
                     </div> --}}
                     
                    
                 </aside>
                 <div class="col-lg-12 column">
                     <div class="filterbar">
                         <p>Nombre de recruteurs : {{sizeof($recruteurs)}}</p>
                         <div class="sortby-sec">
                             <span>Trier</span>
                            <select data-placeholder="20 Per Page" class="chosen">
                                <option>10 Par Page</option>
                                <option>20 Par Page</option>
                                <option>30 Par Page</option>
                                <option>40 Par Page</option>
                            </select>
                         </div>
                     </div>
                     <div class="emply-list-sec">
{{--                          
                         <div class="row" id="masonry">

                            @foreach ($recruteurs as $recruteur )

                                <div  class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="emply-list box" href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}">
                                     
                                        <div class="emply-list-thumb">
                                            <a href="#" title=""><img  height="180px" src="{{ ($recruteur->photo_profile != null) ? asset('images/photo_profil/'.$recruteur->photo_profile) : asset('images/profil/profil_entreprise.png') }}" alt="" /></a>
                                        </div>
                                        <div class="emply-list-info">
                                            <div class="emply-pstn">{{ sizeof($recruteur->mes_offres)}} offre(s)</div>
                                            <h3><a href="#" title="">{{$recruteur->raison_sociale}}</a></h3>
                                            <span>{{$recruteur->categorie}}</span>
                                            <h6><i class="la la-map-marker"></i> {{$recruteur->ville}}, {{$recruteur->pays}}</h6>
                                        </div>
                                         
                                    </div>
                                </div>

                            @endforeach
                            
                 
               

                        </div> --}}



                        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    {{-- <h2 style=" font-family: 'Montserrat">Offres récentes</h2> --}}
                    {{-- <span>Leading Employers already using job and talent.</span> --}}
                </div><!-- Heading -->
                <div class="job-grid-sec">
                    <div class="row">
                    @foreach ($recruteurs as $recruteur )
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="job-grid">
                                <div class="job-title-sec">
                                    <a  href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}" title="">
                                        <span>{{$recruteur->categorie}}</span>
                                        <div class="c-logo"> <img src="{{asset(($recruteur->photo_profile != null) ? asset('images/photo_profil/'.$recruteur->photo_profile) : asset('images/profil/profil_entreprise.png'))}}" width="115px" height="120px"  alt="" /> </div>
                                        <h3><a href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}" >{{$recruteur->poste}}</a></h3>
                                        <span><a href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}" >{{$recruteur->raison_sociale}} &nbsp; </a></span>
                                        <div class="emply-pstn">{{ sizeof($recruteur->mes_offres)}} offre(s)</div>
                                    </a>
                                   

                                </div>
                                <span class="job-lctn"><a  href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}" title="">{{$recruteur->ville}}, {{$recruteur->pays}}</a></span>
                            <a  href="{{route('user.bibliotheque.show', Crypt::encrypt($recruteur->id))}}" title="">Afficher</a>
                            </div><!-- JOB Grid -->
                        </div>
                    @endforeach
                        
                        
                        
                    
                    </div>
                </div>
            </div>
          
        </div>
        <br>
                        <br>
                        <br>






                     </div>
                </div>
             </div>

             {!!$recruteurs->links()!!}
             <br><br>


        </div>
    </div>
</section>

</div>

@extends('layouts.footer')

@section('js-content')

<script>
    $('.box').click(function (e) { 
       
        window.location.href = $(this).attr('href');
        
        
    });
</script>

@endsection