
 @include('layouts.topmenupage')

{{-- 
 <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3> Rechercher des candidats </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section> --}}

 <section>
     <div class="block remove-top">
         <div class="container-fluid">
              <div class="row no-gape">



            
                    @include('layouts.leftmenu')
            

                 <div class="col-10 column">

<br>
                    <form action="{{ route('cv.liste') }}" method="get" >
                        @csrf
                        <div class="emply-resume-sec">
                        <div class="row" style="background-color: #aec">
                            <div class="col-lg-5">
                                <div class="job-field">
                                    <input type="text" name="poste" class="form-control" placeholder="Entrez un mot clé" value="{{isset($_GET['poste']) ? $_GET['poste'] :""}}" />
                                    <i class="la la-keyboard-o"></i>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="job-field">
                                    <select name="pays" class="chosen-city form-control">
                                        <option value="">Secteurs d'activités</option>
                                        @foreach ($pays as $pay )
                                            {{-- <option value="{{$pay->nom}}">{{$pay->nom}}</option> --}}
                                        @endforeach
                                        
                                    </select>
                                    <i class="la la-map-marker"></i>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="job-field">
                                    <select name="pays" class="chosen-city form-control">
                                        <option value="">Tous les pays</option>
                                        @foreach ($pays as $pay )
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
                    </div>
                    </form>
<hr>

                    <div class="emply-resume-sec">
                      
                       @foreach ($candidats as $candidat )
                            <div class="emply-resume-list square col-lg-9">
                                <div class="emply-resume-thumb">
                                    <img src="{{asset(($candidat->photo_profile != null) ? asset('images/photo_profil/'.$candidat->photo_profile) : asset('images/profil/profil_entreprise.png'))}}" alt="" />
                                </div>
                                <div class="emply-resume-info">
                                    <h3><a href="#" title="">{{$candidat->prenom}} {{$candidat->nom}}</a></h3>
                                    <span><i>{{$candidat->poste}}</i> </span>
                                    <p><i class="la la-map-marker"></i>{{$candidat->ville}}- {{$candidat->pays}}</p>
                                </div>
                                <div class="shortlists">
                                    <a href="{{route('user.show_profil', Crypt::encrypt($candidat->id))}}" title="">Voir profil <i class="la la-plus"></i></a>
                                </div>
                            </div><!-- Emply List -->
                       @endforeach
                        
                      
                       

                        {{-- <div class="pagination"> --}}

                           {{-- <ul>
                               <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Précédent</a></li>
                               <li><a href="">1</a></li>
                               <li class="active"><a href="">2</a></li>
                               <li><a href="">3</a></li>
                           <li class="next"><a href="">Suivant <i class="la la-long-arrow-right"></i></a></li>
                           </ul> --}}
                       {{-- </div><!-- Pagination --> --}}
                    </div>
                    <br>
                    {!!$candidats->links()!!}
                    
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
@endsection
@include('layouts.footer')

