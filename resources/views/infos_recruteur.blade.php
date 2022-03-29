@section('title') 
Qui sommes nous
@endsection

@include('layouts.topmenuhome')

<style>

    .lien_btn{
        /* float: left; */
        margin-left: auto;
        margin-right: auto;
         width: 100%;
         text-align:center;
       
    }
     .lien_btn>span{
     
         color:white;
         font-size:20px
    }

   
    @media (max-width: 520px){
        .main-featured-sec {
            height: unset;
            background-color:red;
        }
    }
        

</style>
	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideDashboard"><img src="{{asset('images/header/header9.png')}}" height="500px" width="1900px" alt="" /></li>
								{{-- <li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li>
								<li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li> --}}
							</ul>
                   
							<div class="job-search-sec" >
								<div class="job-search style2">
									<h3>Pourquoi recruter avec Stud’Afrik ?</h3>	
                         

                                    
                                      
                                        <div class="lien_btn" >
                                            <span class="btn" style="background: #ee6e4900; border: 2px solid #EE6E49;">Publier une offre</span>
                                            <span class="btn" style="background: #ee6e4900; border: 2px solid #EE6E49; margin-left:15px">Inscrivez-vous</span>
                                            
                                        </div>
                                
                                                                          
                                   
								</div>						
							
                              
							</div>
                            
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3></h3>
                            {{-- <span>Keep up to date with the latest news</span> --}}
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="about-us">
                         <div class="row">
                             <div class="col-12">
                                 <br><br>
                               <div class="job-search-sec" style="margin-bottom: ">							
							
							
							</div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify; ">
                          
                                <br><br>
                                <br><br>


                                <p style="font-size:16px">                                
                                  <i style="color: #EE6E49; text-align:center; font-weight:bold" class="fas fa-check-circle fa-lg"></i> Augmentez la visibilité de vos annonces de recrutement
                                </p>
                                <p style="font-size:16px">
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold;" class="fas fa-check-circle fa-lg"></i> Trouvez des profils qualifiés sur un job board spécialisé
                                </p>
                                
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify;">
                               
                                <br><br>
                                <br><br>
                                <p style="font-size:16px">  
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold " class="fas fa-check-circle fa-lg"></i> Constituez un vivier de talents                                    
                                </p>

                                <p style="font-size:16px">
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold  margin-top:55px;" class="fas fa-check-circle fa-lg"></i> Valorisez l'image de votre société et votre marque employeur                                    
                                </p>

                             </div>

                          
                         </div>

                         <div class="row">
                            
<div class="col-lg-3 col-md-3 col-sm-3" ></div>

                          

<div class="col-lg-3 col-md-3 col-sm-3"></div>

                         </div>
                         
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>



<section style="margin-top: 75px;" >
    <div class="block grays" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                   
                   
                    <img src="{{asset('/images/prix_recruteur.png')}}" width="100%" alt="">
                </div>

            </div>
        </div>
    </div>
</section>

@section('js-content')


<script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="3ea6cfb5-fb67-4b6d-84c3-829d34fa625f";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
@endsection

@include('layouts.footer')
