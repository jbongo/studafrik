
 @include('layouts.topmenuhome')


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


                <div class="col-3 column">
                    @include('layouts.leftmenu')
               </div>

                 <div class="col-9 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">

                            @if (session('ok'))
                            <div class="alert alert-success ">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong> {{ session('ok') }}</strong>
                            </div>
                            @endif 


                            <div class="border-title"><h3>Mes Formations</h3><a href="{{route('cv.formation.create')}}" title=""><i class="la la-plus"></i> Ajouter Formation</a></div>
                            <div class="edu-history-sec">

                                @foreach ($formations as $formation )
    

                                    <div class="edu-history">
                                        <i class="la la-graduation-cap"></i>
                                        <div class="edu-hisinfo">
                                            <h3>{{$formation->ets}}</h3>
                                            <i>{{$formation->date_deb->format('d/m/Y')}} - {{$formation->date_fin->format('d/m/Y')}}</i>
                                            <span>{{$formation->titre}}</span>
                                            <p>{{$formation->description}}</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Modifier</span><a href="{{route('cv.formation.edit', Crypt::encrypt($formation->id))}}" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Supprimer</span><a href="{{route('cv.formation.delete', Crypt::encrypt($formation->id))}}" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                @endforeach


                              
                            </div>
                            <div class="border-title"><h3>Mes Expériences</h3><a href="{{route('cv.experience.create')}}" title=""><i class="la la-plus"></i> Ajouter Expérience</a></div>
                            <div class="edu-history-sec">
                                @foreach ($experiences as $experience)
                                    
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>{{$experience->titre}} - <span> {{$experience->nom_entreprise}}</span></h3>
                                            <i>{{$experience->date_deb->format('d/m/Y')}} - {{$experience->date_fin->format('d/m/Y')}}</i>
                                            <p>{{$experience->description}}</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Modifier</span><a href="{{route('cv.experience.edit', Crypt::encrypt($experience->id))}}" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Supprimer</span><a href="{{route('cv.experience.delete', Crypt::encrypt($experience->id))}}" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>

                                @endforeach
                               
                            </div>

                     
                         
                            <div class="border-title"><h3>Mes Compétences</h3><a href="{{route('cv.competence.create')}}" title=""><i class="la la-plus"></i> Ajouter Compétence</a></div>
                            <div class="edu-history-sec">
                                
                                @foreach ($competences as $competence)
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>{{$competence->libelle}}</h3>
                                            
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Modifier</span><a href="{{route('cv.competence.edit', Crypt::encrypt($competence->id))}}" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Supprimer</span><a href="{{route('cv.competence.delete', Crypt::encrypt($competence->id))}}" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                @endforeach

                              
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
@endsection
@include('layouts.footer')

