
 @include('layouts.topmenuhome')


 <section class="overlape">
     <div class="block no-padding">
         <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
         <div class="container fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="inner-header">
                     <h3>Formation </h3>
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
                         <div class="profile-title">
                             <h3>Ajouter une formation</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.formation.store')}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Libellé de la formation</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="libelle" placeholder="" required  />
                                         </div>
                                           
                                          
                                     </div>
                                     @if ($errors->has('libelle'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('libelle')}}</strong> 
                                        </div>
                                    @endif

                                     <div class="col-lg-12">
                                        <span class="pf-title">Etablissement </span> <span class="text-danger">*</span>
                                        <div class="pf-field">
                                            <input type="text"  name="ets" placeholder=""  required />
                                        </div>
                                          
                                           
                                    </div>
                                    @if ($errors->has('ets'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('ets')}}</strong> 
                                        </div>
                                    @endif

                                     <div class="col-6">
                                        <span class="pf-title">Date de début </span><span class="text-danger">*</span>
                                        <div class="pf-field">
                                            <input type="date"   name="date_deb" required class="form-control datepicker" />
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
                                            <input type="date"   name="date_fin" class="form-control datepicker" required />
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
                                             <textarea name="description" ></textarea>
                                         </div>

                                     </div>
                                     @if ($errors->has('description'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>{{$errors->first('description')}}</strong> 
                                        </div>
                                    @endif

                                    
                                     <div class="col-lg-12">
                                         <button type="submit" >Ajouter</button>
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

