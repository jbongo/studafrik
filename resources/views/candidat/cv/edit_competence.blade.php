@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
@endsection

@include('layouts.topmenu_bo')

 <section>
    
         <div class="container-fluid">
            

                 <div class="col-10 column">
                     <div class="padding-left">
                         <div class="profile-title">
                             <h3>Modifier une compétence</h3>
                     
                         </div>
                         <div class="profile-form-edit">

                             
                         <form method="POST" action="{{route('cv.competence.update',Crypt::encrypt($competence->id))}}" >
                             @csrf
                                 <div class="row">
                                     <div class="col-lg-7">
                                         <span class="pf-title">Modifier votre compétence</span> <span class="text-danger">*</span>
                                         <div class="pf-field">
                                             <input type="text"  name="libelle" value="{{old('libelle') ? old('libelle') : $competence->libelle }}" placeholder="" required  />
                                         </div>
                                           
                                            @if ($errors->has('libelle'))
                                                <br>
                                                <div class="alert alert-warning ">
                                                    <strong>{{$errors->first('libelle')}}</strong> 
                                                </div>
                                            @endif
                                     </div>

                                     <div class="col-lg-6">
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
