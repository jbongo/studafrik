@include('layouts.topmenupage')


    	    
<section>
    <div className="block no-padding  gray">
        <div className="container">
            <div className="row">
                <div className="col-lg-12">
                    <div className="inner2">
                        <div className="inner-title2">
                            <h3>Contact</h3>
                            
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@if (session('ok'))
<div class="alert alert-success alert-dismissible ">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span class="color-danger"> <strong>  {{ session('ok') }}</strong></span>
</div>
@endif   


<section>
    <div class="block">
        <div class="container">
             <div class="row">
                 <div class="col-lg-6 column">
                     <div class="contact-form">

                      

                     <form action="{{route('contact.store')}}" method="POST">
                             <div class="row">
                            @csrf

                                <div class="col-lg-12">
                                    <span class="pf-title">Nom ou Raison Sociale</span><span class="text-danger">*</span>
                                    <div class="pf-field">
                                        <input type="text"   name="nom" value="{{old('nom')}}" placeholder="" required/>
                                        @if ($errors->has('nom'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('nom')}}</strong> 
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Email</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <input type="email"   name="email" value="{{old('email')}}" placeholder="" required/>
                                         @if ($errors->has('email'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('email')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Sujet</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <input type="text"   name="sujet" value="{{old('sujet')}}" placeholder=""required />
                                         @if ($errors->has('sujet'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('sujet')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Message</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <textarea  name="message" required >{{old('message')}}</textarea>
                                         @if ($errors->has('message'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('message')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <button type="submit">Envoyer</button>
                                 </div>
                             </div>
                             {!! NoCaptcha::display() !!}

                         </form>
                     </div>
                 </div>
                 <div class="col-lg-6 column">
                     <div class="contact-textinfo">
                         <h3>Infos</h3>
                         <ul>

                            {{-- <li><i class="la la-phone"></i><span>Contactez-nous au : +33015522000</span></li> --}}
                            <li><i class="la la-envelope-o"></i><span>Email : info@studafrik.com</span></li>
                         
                             
                            
                         </ul>
                     </div>
                </div>
             </div>
        </div>
    </div>
</section>


@include('layouts/footer')

@section('js-content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


@endsection