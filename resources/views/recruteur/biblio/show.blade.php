@section('title') 
{{$recruteur->nom}}
@endsection
 @include('layouts.topmenupage')

 <section>
    {{-- <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <br>
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <h2>{{$recruteur->nom}}</h2>

                                </div>
                            </div>
                           <hr>

                            
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<style>
    .nav-pills .nav-link.active{
        background-color: #EB586C;
    }
</style>
<section>
    <div class="block">
        <div class="container">
            <div class="row"  style="margin-bottom: 20px; margin-top: 15px">
                <div class="col-12">
                <p> <a  href="{{route('user.bibliotheque.index')}}"  style=" color:rgb(82, 4, 108); ">  << Retour aux entreprises</a> </p> 

                </div>
            </div>
            <div class="row">
                 <div class="col-lg-12 column">
                     <div class="job-single-sec style3">
                         <div class="job-head-wide">
                             <div class="row">
                                 <div class="col-lg-9" style="margin-top: 8px">
                                     <div class="job-single-head3 emplye">
                                         <div class="job-thumb"> <img src="{{ ($recruteur->photo_profile != null ) ? asset('images/photo_profil/'.$recruteur->photo_profile) : asset('images/profil/profil_entreprise.png')}}" width="70px" height="120px" alt="" /></div>
                                         <div class="job-single-info3"> 
                                             <h3>{{$recruteur->nom}}</h3>
                                             <span><i class="la la-map-marker"></i>{{$recruteur->ville}}, {{$recruteur->pays}}</span> 
                                             <ul class="tags-jobs">
                                                 <li><i class="la la-file-text"></i> Secteur d'activité : {{$recruteur->categorie}} </li>
                                                 @if($recruteur->date_creation_entreprise != null) <li><i class="la la-calendar-o"></i> Date de création: {{$recruteur->date_creation_entreprise->format('d/m/Y')}}</li> @endif
                                                 {{-- <li><i class="la la-eye" style="color: #EB586C" ></i> Nombre de vues 563</li> --}}
                                             </ul>
                                         </div>
                                     </div><!-- Job Head -->
                                 </div>

                                 <div class="col-lg-3" style="margin-top: 5px">
                                     <div class="share-bar">
                                        @if($recruteur->linkedin != null)
                                         <a href="{{$recruteur->linkedin}}" title="" class="share-linkedin"><i class="la la-linkedin"></i></a>
                                        @endif

                                        @if($recruteur->instagram != null)
                                         <a href="{{$recruteur->instagram}}" title="" class="share-instagram"><i class="la la-instagram"></i></a>
                                        @endif

                                        @if($recruteur->facebook != null)
                                         <a href="{{$recruteur->facebook}}" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
                                        @endif
                                         
                                        @if($recruteur->twitter != null)
                                         <a href="{{$recruteur->twitter}}" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                        @endif

                                     </div>
                                     <div class="emply-btns">
                                         <a class="seemap" href="#" title=""><i class="la la-paper-plane"></i> Ajouter en favoris</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <div class="job-wide-devider" style="margin-top:20px">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profil</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Offres d'emploi ({{ sizeof($recruteur->mes_offres)}})</a>
                                </li>
                                
                              </ul>
                             
                             <div class="row">
                                 <div class="col-lg-8 col-md-8 col-sm-8 ">	
                                     
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="job-details">
                                         
                                                

                                                <h3>A propos de nous</h3>
                                                
                                                <p>
                                                    {!!$recruteur->description!!}
                                                </p>
                                            </div>
        
        
                                        </div>


                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            
        
                                            <div class="recent-jobs" style="margin-bottom: 150px">
                                                <h3>Nos offres</h3>
                                                <div class="job-list-modern">
                                                    <div class="job-listings-sec no-border">

                                                        @foreach ( $offres as $offre )
                                                        <div class="job-listing wtabs">
                                                            <a href="{{route('mes_offres.show',$offre->slug )}}" title="">
                                                            <div class="job-title-sec">
                                                               
                                                            <div class="c-logo" style="margin-right: 25px"> <img src="{{ ($offre->user->photo_profile != null) ? asset('images/photo_profil/'.$offre->user->photo_profile) : asset('images/profil/profil_entreprise.png') }}" alt="" /> </div>
                                                                    <h3>{{ $offre->titre }}</h3>
                                                                    <span style="color: #EE6E49"> {{ $offre->categorieoffre->nom}}</span>
                            
                                                                    {{-- <span>{!! substr($offre->description, 0 , 150)!!}</span> --}}
                                                                
                                                                    <div class="job-lctn"><i class="la la-map-marker"></i>{{ $offre->ville }}, {{ $offre->pays }},</div>
                                                                    {{-- <span class="job-is fl"> {{ $offre->type_contrat }}</span> --}}
                                                            </div>
                                                        </a>
                                                            <div class="job-style-bx">
                                                                <span class="job-is fl"> {{ $offre->type_contrat }}</span>
                                                                {{-- <span class="fav-job"><i class="la la-heart-o"></i></span> --}}
                                                                @php 
                                                                    $duree = date_diff(date_create(date('Y-m-d')) ,date_create($offre->created_at->format('Y-m-d')) ); 
                                                                @endphp 
                            
                            
                                                                @if($duree->days == 0)
                                                                    <i>Publiée Aujourd'hui </i>
                                                                @elseif($duree->days == 1)
                                                                    <i>Publiée Hier </i>
                                                                @else 
                                                                    <i>Publiée Il y'a {{$duree->days}} jours</i>
                            
                                                                @endif
                                                            </div>
                                                        </div>
                                                       @endforeach


                                                     
                                                 
                                                   </div>

                                                </div>

                                            </div>
        
                                            
                                        </div>
                                        
                                      </div>
                                    
                               








                                 </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 ">
                                     <div class="job-overview">
                                         <h3>Infos</h3>
                                         <ul>
                                             {{-- <li><i class="la la-eye"></i><h3>Viewed </h3><span>164</span></li> --}}
                                             <li><i class="la la-file-text" style="color: #EB586C"></i><h3>Nombre d'offres</h3><span>{{sizeof($recruteur->mes_offres)}}</span></li>
                                             <li><i class="la la-bars" style="color: #EB586C"></i><h3>Secteur d'activité</h3><span>{{$recruteur->categorie}}</span></li>
                                             <li><i class="la la-users" style="color: #EB586C"></i><h3>Taille de l'entreprise</h3><span>{{$recruteur->nb_salarie}}</span></li>
                                             {{-- <li><i class="la la-user"></i><h3>Followers</h3><span>15</span></li> --}}
                                         </ul>
                                     </div><!-- Job Overview -->
                                    
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>



</div>


@extends('layouts.footer')
@section('js-content')
<script>
    function rtn() {
       window.history.back();
    }
    </script>
@endsection