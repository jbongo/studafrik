@section('css-content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@include('layouts.topmenu_bo')

 <section>
         <div class="container-fluid">
            
             

                 <div class="col-10 column">
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
                                             {{-- <input type="text"  name="libelle" placeholder="" required  /> --}}
                                             <select name="" id="">
                                                 <option value="ccc">ccc</option>
                                             </select>
                                          
                                            <select class="selectpicker col-lg-6" id="libelle" name="libelle"  data-live-search="true" multiple>
                                          
                                                @foreach ($competences as $competence)
                                                   <option value="{{$competence}}">{{$competence}}</option>
                                               @endforeach
                                            </select>
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
                                 <br><br>
                             </form>
                         </div>
    
                     </div>
                </div>


  
     </div>
 </section>

 

</div>


@section('js-content')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-fr_FR.min.js"></script>

@endsection
@extends('admin.layout.footer')

