
 @include('layouts.topmenuhome')


 {{-- <section class="overlape">
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
                            {{-- </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  --}}


	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>xxxxxxxxxxxxxx</h3>
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
                 <div class="col-lg-12 column">
                     <div class="job-single-sec style3">
                         <div class="job-head-wide">
                             <div class="row">
                                 <div class="col-lg-10">
                                     <div class="job-single-head3 emplye">
                                         <div class="job-thumb"> <img src="http://placehold.it/120x95" alt="" /></div>
                                         <div class="job-single-info3">
                                             <h3>Tera Planner</h3>
                                             <span><i class="la la-map-marker"></i>Librevile, Gabon</span>
                                             <ul class="tags-jobs">
                                                 {{-- <li><i class="la la-file-text"></i> Applications 1</li>
                                                 <li><i class="la la-calendar-o"></i> Post Date: July 29, 2017</li> --}}
                                                 <li><i class="la la-eye"></i> vues 55</li>
                                             </ul>
                                         </div>
                                     </div><!-- Job Head -->
                                 </div>
                                 {{-- <div class="col-lg-2">
                                     <div class="share-bar">
                                         <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                     </div>
                                     <div class="emply-btns">
                                         <a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a>
                                         <a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a>
                                     </div>
                                 </div> --}}
                             </div>
                         </div>
                         <div class="job-wide-devider">
                             <div class="row">
                                 <div class="col-lg-8 column">		
                                     <div class="job-details">
                                         <h3>QUI SOMMES NOUS ?</h3>
                                         <p>{{ $user->description }} </p>
                                         
                                     </div>
                                     <div class="recent-jobs">
                                         <h3>Nos offres</h3>
                                         <div class="job-list-modern">
                                             <div class="job-listings-sec no-border">
                                                <div class="job-listing wtabs noimg">
                                                    <div class="job-title-sec">
                                                        <h3><a href="#" title="">xxxxxxxxx</a></h3>
                                                        <span>xxxxxxxxxx</span>
                                                        <div class="job-lctn"><i class="la la-map-marker"></i>Libreville, GABON</div>
                                                    </div>
                                                    <div class="job-style-bx">
                                                        <span class="job-is ft">CDI</span>
                                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                        <i>Il y'a 2 jours</i>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4 column">
                                     <div class="job-overview">
                                         <h3>Informations</h3>
                                         <ul>
                                             {{-- <li><i class="la la-eye"></i><h3>Viewed </h3><span>164</span></li> --}}
                                             <li><i class="la la-file-text"></i><h3>Offres postées</h3><span>1</span></li>
                                             {{-- <li><i class="la la-map"></i><h3>Locations</h3><span>United States, San Diego</span></li>
                                             <li><i class="la la-bars"></i><h3>Categories</h3><span>Arts, Design, Media</span></li>
                                             <li><i class="la la-clock-o"></i><h3>Since</h3><span>2002</span></li> --}}
                                             <li><i class="la la-users"></i><h3>Employés</h3><span>15</span></li>
                                             {{-- <li><i class="la la-user"></i><h3>Followers</h3><span>15</span></li> --}}
                                         </ul>
                                     </div><!-- Job Overview -->
                                     {{-- <div class="quick-form-job">
                                         <h3>Contact Business Network</h3>
                                         <form>
                                             <input type="text" placeholder="Enter your Name *" />
                                             <input type="text" placeholder="Email Address*" />
                                             <input type="text" placeholder="Phone Number" />
                                             <textarea placeholder="Message should have more than 50 characters"></textarea>
                                             <button class="submit">Send Email</button>
                                             <span>You accepts our <a href="#" title="">Terms and Conditions</a></span>
                                         </form>
                                     </div> --}}
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
