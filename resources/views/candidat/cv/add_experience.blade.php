@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
@endsection

@include('layouts.topmenu_bo') 


 <section>

         <div class="container-fluid">
        

                 <div class="col-10 column">
                     <div class="padding-left">
                         <div class="profile-title">
                             <h3>Ajouter une expérience</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.experience.store')}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Titre</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="titre" placeholder="" required  />
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
                                            <input type="text"  name="nom_entreprise" placeholder=""  required />
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
      
 </section>

 

</div>


@section('js-content')

@endsection
@extends('admin.layout.footer')

