
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
                                <h4>Recherchez un Job...</h4>
                                <form action="{{ route('recherche_emplois') }}" method="get" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="job-field">
                                                <input type="text" name="poste" className="form-control" placeholder="Quel poste recherchez-vous ?" value="{{isset($_GET['poste']) ? $_GET['poste'] :""}}" />
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="job-field">
                                                <select name="categorie" class="chosen-city form-control">
                                                    <option value="">Toutes les catégories</option>
                                                    <option>Informatique</option>
                                                    <option>Marketing</option>
                                                    <option>Finance</option>
                                                    
                                                </select>
                                                <i class="la la-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="job-field">
                                                <select name="pays" class="chosen-city form-control">
                                                    <option value="">Tous les pays</option>
                                                    <option>Gabon</option>
                                                    <option>Mali</option>
                                                    <option>Côte d'ivoire</option>
                                                    
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
                         <h3 class="sb-title open"> Type de l'offre</h3>
                         <div class="type_widget">
                            <p class="flchek"><input type="checkbox" name="choosetype" id="33r"/><label for="33r">Freelance (9)</label></p>
                            <p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"/><label for="dsf">CDD (8)</label></p>
                            <p class="ischek"><input type="checkbox" name="choosetype" id="sdd"/><label for="sdd">CDI (8)</label></p>
                            
                         </div>
                     </div>
                     <div class="widget border">
                         <h3 class="sb-title closed">Spécialité</h3>
                         <div class="specialism_widget">
                            {{-- <div class="field_w_search">
                                 <input type="text" placeholder="spécialité" />
                             </div> --}}
                             <div class="simple-checkbox scrollbar">
                                <p><input type="checkbox" name="categorie[]" value="finance" id="1"/><label for="1">Finance (2)</label></p>
                                <p><input type="checkbox" name="categorie[]" value="banque" id="2"/><label for="2">Banque (2)</label></p>
                                <p><input type="checkbox" name="categorie[]" value="informatique" id="3"/><label for="3">Informatique (2)</label></p>
                                
                                
                             </div>
                         </div>
                     </div>

                     <div class="widget border">
                        {{-- <h3 class="sb-title closed">Spécialité</h3> --}}
                        <button type="submit" class="mux-btn btn-default" id="use-filter-btn">Appliquer filtres</button>
                        
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
                         <div class="job-listings-sec no-border">
                   

                           @foreach ( $offres as $offre )
                            <div class="job-listing wtabs">
                                <a href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" title="">
                                <div class="job-title-sec">
                                   
                                        <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                        <h3>{{ $offre->titre }}</h3>
                                        <span>{{ substr($offre->description, 0 , 250) }}...</span>
                                    
                                        <div class="job-lctn"><i class="la la-map-marker"></i>{{ $offre->ville }}, {{ $offre->pays }},</div>
                                        <span class="job-is fl"> {{ $offre->categorie }}</span>
                                </div>
                            </a>
                                <div class="job-style-bx">
                                    <span class="job-is fl"> {{ $offre->type_contrat }}</span>
                                    <span class="fav-job"><i class="la la-heart-o"></i></span>
                                    <i>Il y'a 1 heure</i>
                                </div>
                            </div>
                           @endforeach
                            
                           
                      
                            
                           
                           
            
                
                        </div>
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
                        </div>
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>
 

</div>

@extends('layouts.footer')
