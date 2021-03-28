
 @include('layouts.topmenuhome')


 <section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="" class="parallax scrolly-invisible no-parallax" ></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h4>Découvrez les offres d'emploi </h4>
                                <form action="{{ route('recherche_emplois') }}" method="get" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="job-field">
                                                <input type="text" name="poste" class="form-control" placeholder="Quel poste recherchez-vous ?" value="{{isset($_GET['poste']) ? $_GET['poste'] :""}}" />
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



<section>
    <div class="block remove-top">
        <div class="container">
             <div class="row no-gape">
                 <aside class="col-lg-3 column">
                     {{-- <div class="widget border">
                         <h3 class="sb-title closed">Date de l'offre</h3>
                         <div class="posted_widget">
                            <input type="radio" name="choose" id="232"/><label for="232">Moins de 24 heures </label><br />
                            <input type="radio" name="choose" id="wwqe"/><label for="wwqe">Moins d'une semaine</label><br />
                
                            <input type="radio" name="choose" id="qweqw"/><label class="nm" for="qweqw">Tout</label><br />
                         </div>
                     </div> --}}
                     <div class="widget border">
                         <h3 class="sb-title @if($typeoffres != null) open @else closed @endif"> Type d'offre</h3> 
                         <div class="type_widget">
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("CDI",$typeoffres)) checked @endif name="typeoffres[]" value="CDI" id="CDI"/><label for="CDI">CDI</label></p>
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("CDD",$typeoffres)) checked @endif name="typeoffres[]" value="CDD" id="CDD"/><label for="CDD">CDD</label></p>
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("STAGE",$typeoffres)) checked @endif name="typeoffres[]" value="STAGE" id="STAGE"/><label for="STAGE">STAGE</label></p>
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("JOB ETUDIANT",$typeoffres)) checked @endif name="typeoffres[]" value="JOB ETUDIANT" id="JOB ETUDIANT"/><label for="JOB ETUDIANT">JOB ETUDIANT</label></p>
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("VIE",$typeoffres)) checked @endif name="typeoffres[]" value="VIE" id="VIE"/><label for="VIE">VIE</label></p>
                            <p class="ischek"><input type="checkbox" @if( is_array($typeoffres) && in_array("INTERIM",$typeoffres)) checked @endif name="typeoffres[]" value="INTERIM" id="INTERIM"/><label for="INTERIM">INTERIM</label></p>

                            
                         </div>
                     </div>
                     <div class="widget border">
                        <h3 class="sb-title @if($experiences != null) open @else closed @endif">Expérience requise</h3>
                        <div class="specialism_widget">
                           {{-- <div class="field_w_search">
                                <input type="text" placeholder="spécialité" />
                            </div> --}}
                           
                            <div class="type_widget">
                               <p class="ischek"><input type="checkbox" @if( is_array($experiences) && in_array("<1",$experiences)) checked @endif name="experiences[]" value="<1" id="1"/><label for="1">Moins de 1 an</label></p>
                               <p class="ischek"><input type="checkbox" @if( is_array($experiences) && in_array("1-2",$experiences)) checked @endif name="experiences[]" value="1-2" id="2"/><label for="2">1 à 2 ans</label></p>
                               <p class="ischek"><input type="checkbox" @if( is_array($experiences) && in_array("2-3",$experiences)) checked @endif name="experiences[]" value="2-3" id="3"/><label for="3">2 à 3 ans</label></p>
                               
                    
                            </div>
                        </div>
                    </div>
                     <div class="widget border">
                         <h3 class="sb-title @if($date_publication != null) open @else closed @endif">Date de publication</h3>
                         <div class="specialism_widget">
                            {{-- <div class="field_w_search">
                                 <input type="text" placeholder="spécialité" />
                             </div> --}}
                             <div class="type_widget">
                                
                                <p class="ischek"><input type="radio" @if( $date_publication != null && $date_publication == "1") checked @endif name="date_publication" value="1" id="1h"/><label for="1h">Moins de 24h</label></p>
                                <p class="ischek"><input type="radio" @if( $date_publication != null && $date_publication == "7") checked @endif name="date_publication" value="7" id="7h"/><label for="7h">Moins de 7 jours</label></p>
                                <p class="ischek"><input type="radio" @if( $date_publication != null && $date_publication == "30") checked @endif name="date_publication" value="30" id="30h"/><label for="30h">Moins d'un mois</label></p>
                                <p class="ischek"><input type="radio" @if( $date_publication != null && $date_publication == "Tout") checked @endif name="date_publication" value="Tout" id="Tout"/><label for="Tout">Tout</label></p>
                                
                                
                             </div>
                         </div>
                     </div>

                     <div class="widget border"  >
                        {{-- <h3 class="sb-title closed">Spécialité</h3> --}}

                        <div class="row justify-content-md-center">
                            <div class="col-10 col-offset-1">
                                <button type="submit"  class="mux-btn btn-default" id="use-filter-btn">Appliquer filtres</button>

                            </div>
                        </div>
                        
                    </div>
                     
          </form>
                 </aside>
                 <div class="col-lg-9 column">
                     <div class="modrn-joblist np">
                         <div class="filterbar">
                             <div class="sortby-sec">
                                 <span>Trier par</span>
                                 {{-- <select data-placeholder="Most Recent" class="chosen form-control">
                                    <option>Plus Recent</option>
                                    
                                </select> --}}
                                <select data-placeholder="20 par Page" class="chosen form-control">
                                    <option>30 Par Page</option>
                                    <option>40 Par Page</option>
                                    <option>50 Par Page</option> 
                                    <option>60 Par Page</option>
                                </select>
                             </div>
                             <h5>{{ $nb_offres }} Offres</h5>
                         </div>
                     </div>
                     <div class="job-list-modern">
                         <div class="job-listings-sec no-border" style="margin-bottom: 100px">
                   

                           @foreach ( $offres as $offre )
                            <div class="job-listing wtabs">
                                <a href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" title="">
                                <div class="job-title-sec">
                                   
                                <div class="c-logo" style="margin-right: 25px"> <img src="{{ ($offre->user->photo_profile != null) ? asset('images/photo_profil/'.$offre->user->photo_profile) : asset('images/profil/profil_entreprise.png') }}" width="110px" height="100px"  alt="" /> </div>
                                        <h3>{{ $offre->titre }}</h3>
                                        <span class="job-isx f1"> &nbsp; {{ $offre->categorieoffre->nom}} &nbsp;</span>

                                        {{-- <span>{!! substr($offre->description, 0 , 150)!!}</span> --}}
                                    
                                        <div class="job-lctn"><i class="la la-map-marker"></i>{{ $offre->ville }}, {{ $offre->pays }}</div>
                                        {{-- <span class="job-is fl"> {{ $offre->type_contrat }}</span> --}}
                                </div>
                            </a>
                                <div class="job-style-b">
                                    <span class="job-is fl"> {{ $offre->type_contrat }}</span>
                                   
                                </div>

                                <div class="job-style-bx">
                                   
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
                        {!!$offres->links()!!}
                        {{-- <div class="pagination"> --}}
                                {{-- <ul>
                                    <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Précédent</a></li>
                                    <li><a href="">1</a></li>
                                    <li class="active"><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><span class="delimeter">...</span></li>
                                    <li><a href="">14</a></li>
                                    <li class="next"><a href="">Suivant <i class="la la-long-arrow-right"></i></a></li>
                                </ul> --}}
                           
                        {{-- </div> --}}
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>
 

</div>

@extends('layouts.footer')
