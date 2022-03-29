@section('title') 
Qui sommes nous
@endsection

<style>

    .lien_btn{
        /* float: left; */
        margin-left: auto;
        margin-right: auto;
         width: 100%;
         text-align:center;
       
    }
     .lien_btn>a>span{
     
         color:white;
         font-size:30px
    }
    
    .lien_btn>a>span:hover {
        color: #d2dee8;
    }

   
   
    
    .titre_recruter{
        text-align: center;
        margin-top:40px;
        margin-bottom:50px;
        color:#EE6E49;
        font-size:40px;
    }
    .motif_recruter{      
        font-size:20px;
    }
    .img_header{
        height: 500px;
        width: 1900px;
    }
    
    @media (max-width: 800px){
        .titre_recruter{
        
            margin-top:20px;
            margin-bottom:30px;
          
            font-size:30px;
        }
        .img_header{
            /* height: 350px; */
            width: 1200px;
            
        }
       
        
        .motif_recruter{      
            font-size:12px;
        }
        
        
        .lien_btn>a>span{

             font-size:20px
        }
    }


    @media (max-width: 520px){
        .main-featured-sec {
            height: 10vh;
        }
    }

</style>
@include('layouts.topmenuhome')

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideDashboard"><img class="img_header" src="{{asset('images/header/header9.png')}}"  width="1900px" alt="" /></li>
								{{-- <li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li>
								<li class="slideDashboard"><img src="http://placehold.it/1920x800" alt="" /></li> --}}
							</ul>
                   
							<div class="job-search-sec" >
								<div class="job-search style2">             

                                   
                                      
                                        <div class="lien_btn" >
                                            <a href="{{route('mes_offres.create')}}"><span class="btn" style="background: #ee6e4900; border: 2px solid #EE6E49;">Publier une offre </span> </a>
                                            <a href="{{route('register')}}"><span class="btn"  style="background: #ee6e4900; border: 2px solid #EE6E49; margin-left:15px">Inscrivez-vous</span></a>
                                            
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
                             <div class="col-12 titre_recruter" style="">                              
                                 <span>Pourquoi recruter avec Stud’Afrik ?</span>	
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify; ">
                          
                      
                           


                                <p >                                
                                  <i style="color: #EE6E49; text-align:center; font-weight:bold" class="fas fa-check-circle fa-lg"></i> <span  class="motif_recruter"> Augmentez la visibilité de vos annonces de recrutement</span>
                                </p>
                                <p class="motif_recruter" >
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold;" class="fas fa-check-circle fa-lg"></i> <span  class="motif_recruter"> Trouvez des profils qualifiés sur un job board spécialisé</span>
                                </p>
                                
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:justify;">
                               
                            
                                <p class="motif_recruter" >  
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold " class="fas fa-check-circle fa-lg"></i> <span  class="motif_recruter"> Constituez un vivier de talents   </span>                                 
                                </p>

                                <p class="motif_recruter" >
                                   <i style="color: #EE6E49; text-align:center; font-weight:bold  margin-top:55px;" class="fas fa-check-circle fa-lg"></i> <span  class="motif_recruter"> Valorisez l'image de votre société et votre marque employeur </span>                                   
                                </p>

                             </div>

                          
                         </div>

                         
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>



<section  style="margin-top: 50px;" >
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
