
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
                                <form>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="job-field">
                                                <input type="text" className="form-control" placeholder="titre de l'offre" />
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="job-field">
                                                <select class="chosen-city form-control">
                                                    <option>Gabon</option>
                                                    
                                                </select>
                                                <i class="la la-map-marker"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <div class="tags-bar">
                                     <span>CDI<i class="close-tag">x</i></span>
                                     <span>UX/UI Design<i class="close-tag">x</i></span>
                                     <span>Gabon<i class="close-tag">x</i></span>
                                     <div class="action-tags">
                                         <a href="#" title=""><i class="la la-cloud-download"></i> Sauvegarder</a>
                                         <a href="#" title=""><i class="la la-trash-o"></i> Supprimer</a>
                                     </div>
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
    <div class="block remove-top">
        <div class="container">
             <div class="row no-gape">
                 <aside class="col-lg-3 column">
                     <div class="widget border">
                         <h3 class="sb-title open">Date de l'offre</h3>
                         <div class="posted_widget">
                            <input type="radio" name="choose" id="232"/><label for="232">Moins de 24 heures </label><br />
                            <input type="radio" name="choose" id="wwqe"/><label for="wwqe">Moins d'une semaine</label><br />
                
                            <input type="radio" name="choose" id="qweqw"/><label class="nm" for="qweqw">Tout</label><br />
                         </div>
                     </div>
                     <div class="widget border">
                         <h3 class="sb-title open"> Type de l'offre</h3>
                         <div class="type_widget">
                            <p class="flchek"><input type="checkbox" name="choosetype" id="33r"/><label for="33r">Freelance (9)</label></p>
                            <p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"/><label for="dsf">CDD (8)</label></p>
                            <p class="ischek"><input type="checkbox" name="choosetype" id="sdd"/><label for="sdd">CDI (8)</label></p>
                            
                         </div>
                     </div>
                     <div class="widget border">
                         <h3 class="sb-title open">Spécialité</h3>
                         <div class="specialism_widget">
                            <div class="field_w_search">
                                 <input type="text" placeholder="spécialité" />
                             </div>
                             <div class="simple-checkbox scrollbar">
                                <p><input type="checkbox" name="spealism" id="as"/><label for="as">Finance (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="asd"/><label for="asd">Banque (2)</label></p>
                                <p><input type="checkbox" name="spealism" id="asd"/><label for="asd">Banque (2)</label></p>
                                
                                
                             </div>
                         </div>
                     </div>
                     
                     <div class="widget border">
                         <h3 class="sb-title closed">Expérience</h3>
                         <div class="specialism_widget">
                             <div class="simple-checkbox">
                                <p><input type="checkbox" name="smplechk" id="9"/><label for="9">0 mois - 1 ans</label></p>
                                <p><input type="checkbox" name="smplechk" id="9"/><label for="9">2 mois - 3 ans</label></p>
                                <p><input type="checkbox" name="smplechk" id="9"/><label for="9">> 3 ans</label></p>
                                
                             </div>
                         </div>
                     </div>
                     
                    
                     <div class="banner_widget">
                         <a href="#" title=""><img src="http://placehold.it/263x280" alt="" /></a>
                    </div>
                 </aside>
                 <div class="col-lg-9 column">
                     <div class="modrn-joblist np">
                         <div class="filterbar">
                             <div class="sortby-sec">
                                 <span>Trier par</span>
                                 <select data-placeholder="Most Recent" class="chosen form-control">
                                    <option>Plus Recent</option>
                                    
                                </select>
                                <select data-placeholder="20 Per Page" class="chosen form-control">
                                    <option>30 Par Page</option>
                                    <option>40 Par Page</option>
                                    <option>50 Par Page</option>
                                    <option>60 Par Page</option>
                                </select>
                             </div>
                             <h5>8 Offres</h5>
                         </div>
                     </div>
                     <div class="job-list-modern">
                         <div class="job-listings-sec no-border">
                   

                           @foreach ( $offres as $offre )
                            <div class="job-listing wtabs">
                                <div class="job-title-sec">
                                    <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
                                    <h3><a href="{{route('mes_offres.show', Crypt::encrypt($offre->id) )}}" title="">Expert comptable</a></h3>
                                    <span>Société Générale</span>
                                    <div class="job-lctn"><i class="la la-map-marker"></i>Libreville, Gabon</div>
                                </div>
                                <div class="job-style-bx">
                                    <span class="job-is ft">CDI</span>
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
