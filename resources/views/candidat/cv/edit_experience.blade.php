
 @include('layouts.topmenupage')


 {{-- <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3>Expérience </h3>
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
                     <div class="padding-left">
                         <div class="profile-title">
                             <h3>Modifier une expérience</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.experience.update',Crypt::encrypt($experience->id))}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Titre</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="titre"  value="{{old('titre') ? old('titre') : $experience->titre }}" placeholder="" required  />
                                         </div>
                                     </div>
                                     @if ($errors->has('titre'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('titre')}}</strong> 
                                        </div>
                                    @endif


                                     <div class="col-lg-12">
                                        <span class="pf-title">Nom de l'entreprise </span> <span class="text-danger">*</span>
                                        <div class="pf-field">
                                            <input type="text"  name="nom_entreprise" value="{{old('nom_entreprise') ? old('nom_entreprise') : $experience->nom_entreprise }}"  placeholder=""  required />
                                        </div>
                                    </div>
                                    @if ($errors->has('nom_entreprise'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('nom_entreprise')}}</strong> 
                                        </div>
                                    @endif

                                     <div class="col-6">
                                        <span class="pf-title">Date de début </span><span class="text-danger">*</span>
                                        <div class="pf-field">
                                            <input type="date"   name="date_deb" value="{{old('date_deb') ? old('date_deb') : $experience->date_deb->format('Y-m-d') }}" required class="form-control datepicker" />
                                        </div>
                                    </div>
                                    @if ($errors->has('date_deb'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('date_deb')}}</strong> 
                                        </div>
                                    @endif

                                    <div class="col-6">
                                        <span class="pf-title">Date de fin</span> <span class="text-danger">*</span>
                                        <div class="pf-field">
                                            <input type="date"   name="date_fin" value="{{old('date_fin') ? old('date_fin') : $experience->date_fin->format('Y-m-d') }}" class="form-control datepicker" required />
                                        </div>
                                    </div>
                                    @if ($errors->has('date_deb'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('date_dfin')}}</strong> 
                                        </div>
                                    @endif

                                     <div class="col-lg-12">
                                         <span class="pf-title">Description</span>
                                         <div class="pf-field">
                                             <textarea name="description" >{{old('description') ? old('description') : $experience->description }}</textarea>
                                         </div>

                                     </div>
                                        @if ($errors->has('description'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('description')}}</strong> 
                                            </div>
                                        @endif
                                    

                                    
                                     <div class="col-lg-12">
                                         <button type="submit" >Modifier</button>
                                     </div>
                                     

                                 </div>
                                 <br><br>
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

