@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
@endsection

@include('layouts.topmenu_bo')

 <section>
     
         <div class="container-fluid">
          

                 <div class="col-10 column">
                     <div class="padding-left">
                         <div class="profile-title">
                             <h3>Modifier  une formation</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.formation.update', Crypt::encrypt($formation->id))}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <span class="pf-title">Libellé de la formation</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="libelle" value="{{old('libelle') ? old('libelle') : $formation->libelle }}" placeholder="" required  />
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
                                            <input type="text"  name="ets" value="{{old('ets') ? old('ets') : $formation->ets }}" placeholder=""  required />
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
                                            <input type="date"   name="date_deb" value="{{old('date_deb') ? old('date_deb') : $formation->date_deb->format('Y-m-d') }}" required class="form-control datepicker" />
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
                                            <input type="date"   name="date_fin" value="{{old('date_fin') ? old('date_fin') : $formation->date_fin->format('Y-m-d') }}" class="form-control datepicker" required />
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
                                             <textarea name="description" >{{old('description') ? old('description') : $formation->description }}</textarea>
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
      
 </section>

 

</div>


@section('js-content')

@endsection
@extends('admin.layout.footer')
