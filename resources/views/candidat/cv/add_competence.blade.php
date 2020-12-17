
 @include('layouts.topmenuhome')


 <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3>compétence</h3>
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



                 @include('layouts.leftmenu')

                 <div class="col-lg-9 column">
                     <div class="padding-left">
                         <div class="profile-title">
                             <h3>Ajouter une compétence</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.competence.store')}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Ajoutez votre compétence</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="libelle" placeholder="" required  />
                                         </div>
                                           
                                            @if ($errors->has('libelle'))
                                                <br>
                                                <div class="alert alert-warning ">
                                                    <strong>{{$errors->first('libelle')}}</strong> 
                                                </div>
                                            @endif
                                     </div>

                           

                                     
                                     
                                    
                                  
                                     
                                     
                                    
                                    
                                     <div class="col-lg-12">
                                         <button type="submit" >Ajouter</button>
                                     </div>
                                     

                                 </div>
                             </form>
                         </div>
    
                     </div>
                </div>


  

                
              </div>
         </div>
     </div>
 </section>

 

</div>


@section('js-content')

@endsection
@include('layouts.footer')

