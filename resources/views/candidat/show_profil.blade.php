
 @include('layouts.topmenuhome')

{{-- 
 <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3> MON CV </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <section>
     <div class="block remove-top">
         <div class="container-fluid">
              <div class="row no-gape">



                 @include('layouts.leftmenu') --}}
           
                 <style>
                     .btn-link:hover {
                        color:white;
                        text-decoration: none;
                     }
                 </style>
                 <section class="overlape">
                    <div class="block no-padding">
                        <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                        <div class="container fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="inner-header">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="skills-btn">
                                                        @foreach ($candidat->cv_competence as $competence )
                                                            <a href="#" title="">{{$competence->libelle}}</a>
                                                            
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="action-inner">
                                                        @if($est_recruteur == true)
                                                            @if($est_favoris == false)

                                                            <a class="btn btn-link " style="background: #EE6E49" href="{{route('favoris.cv',[Auth::user()->id, $candidat->id])}}" title=""><i class="la la-paper-plane"></i>Sauvegarder le profil</a>
                                                            @else 
                                                            <a class="btn btn-link" style="background: #EE6E49" href="#" style="color:rgb(232, 243, 241); font-size:17px" title=""><i class="la la-check"></i>Profil sauvegardé</a>
                                                            @endif
                                                        @endif
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
            
                <section class="overlape">
                    <div class="block remove-top">
                        <div class="container">
                            <div class="row"  >
                                <div class="col-5">
                                <p> <a  href="{{route('cv.liste')}}"  style=" color:rgb(82, 4, 108); ">  << Retour aux candidats</a> </p> 
            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session('ok'))
                                    <div class="alert alert-success "> 
                                       <a href="#" class="close" data-dismiss="alert" aria-label=
                                       "close">&times;</a>
                                       <strong> {{ session('ok') }}</strong>
                                    </div>
                                    @endif 
                                    <div class="cand-single-user">
                                      
                                        <div class="share-bar circle">
                                             <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                         </div>
                                         <div class="can-detail-s">
                                             <div class="cst"><img class="img-responsive" width="137px" height="137px" id="photodisplay"  src="{{($candidat->photo_profile == null ) ? asset('images/profil/profil.png') :asset('images/photo_profil/'. $candidat->photo_profile) }}" alt="@lang('Photo de profil')"></div>
                                             <h3>{{$candidat->prenom}} {{$candidat->nom}}</h3>
                                             <span><i>{{$candidat->poste}}</i></span>
                                             <p>{{$candidat->email}}</p>
                                             <p>Membre depuis, {{$candidat->created_at->format('Y')}}</p>
                                             <p><i class="la la-map-marker"></i>{{$candidat->ville}} / {{$candidat->pays}}</p>
                                         </div>
                                         <div class="download-cv">
                                         @if($candidat->cv != null)

                                             <a href="{{route('user.telecharger_cv', $candidat->id)}}" title="">Télécharger le CV <i class="la la-download"></i></a>
                                         @endif

                                         </div>
                                     </div>
                                     <ul class="cand-extralink">
                                         <li><a href="#about" title="">À Propos</a></li>
                                         <li><a href="#education" title="">Formations</a></li>
                                         <li><a href="#experience" title="">Expériences Professionnelles</a></li>
                                    
                                         <li><a href="#skills" title="">Compétences</a></li>
                                     </ul>
                                     <div class="cand-details-sec">
                                         <div class="row">
                                             <div class="col-lg-8 column">
                                                 <div class="cand-details" id="about">
                                                     <h2>À propos</h2>
                                                    {!!$candidat->description!!}
                                                     

                                                     <div class="edu-history-sec" id="education">
                                                         <h2>Formations</h2>
                                                       
                                                         @foreach ( $candidat->cv_formation as $formation )
                                                             
                                                         
                                                         <div class="edu-history">
                                                             <i class="la la-graduation-cap"></i>
                                                             <div class="edu-hisinfo">
                                                                 <h3>{{$formation->ets}}</h3>
                                                                 <i>{{$formation->date_deb->format('m-Y')}} - {{$formation->date_fin->format('m-Y')}}</i>
                                                                 <span>{{$formation->libelle}} </span>
                                                                 <p>{{$formation->description}}</p>
                                                             </div>
                                                         </div>

                                                         @endforeach
                                                        
                                                     </div>
                                                     <div class="edu-history-sec" id="experience">
                                                         <h2>Expériences professionnelles</h2>

                                                         @foreach ($candidat->cv_experience as $experience )
                                                         
                                                         <div class="edu-history style2">
                                                      
                                                             <div class="edu-hisinfo">
                                                                 <h3>{{$experience->titre}} <span>{{$experience->nom_entreprise}}</span></h3>
                                                                 <i>{{$experience->date_deb->format('m-Y')}} - {{$experience->date_fin->format('m-Y')}}</i>
                                                                 <p>{{$experience->description}}</p>

                                                             </div>
                                                         </div>
                                                         @endforeach
                                                   
                                                     </div>
                                                     
                                                     <div class="progress-sec" id="skills">
                                                         <h2>Compétences</h2>

                                                         <div class="skills-btn2" >
                                                          
                                                                
                                                                
                                                            
                                                           
                                                       
                                                         @foreach ($candidat->cv_competence as $competence )
                                                         <div class="progress-sec">
                                                             {{-- <span>- {{$competence->libelle}}</span> --}}
                                                             <span> <a href="#" title="">{{$competence->libelle}}</a> </span>
                                                             {{-- <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div> --}}
                                                         </div>
                                                         @endforeach
                                                         <br><br>
                                                        </div>
                                                     </div>
     
                            
                                                 </div>
                                             </div>
                                             <div class="col-lg-4 column">
                                                 <div class="job-overview">
                                                     <h3>Infos</h3>
                                                     <ul>
                                                         {{-- <li><i class="la la-mars-double"></i><h3>Genre</h3><span>{{$candidat->sexe}}</span></li> --}}
                                                         <li><i class="la la-puzzle-piece"></i><h3>Secteur d'activité</h3><span>{{$candidat->categorie}}</span></li>
                                                     </ul>
                                                 </div><!-- Job Overview -->
                                             
                                             </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            

 

</div>


@section('js-content')

<script src="https://cdn.tiny.cloud/1/ieugu2pgq0vkrn7vrhnp69zprqpp5xfwh9iewe7v24gtdj8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>


tinymce.init({
 selector: 'textarea',
 skin: 'bootstrap',
 plugins: 'lists, link, image, media',
 toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
 menubar: false
});
</script>
<script>
    function rtn() {
       window.history.back();
    }
    </script>
@endsection
@include('layouts.footer')

