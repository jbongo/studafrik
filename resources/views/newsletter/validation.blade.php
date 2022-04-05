@include('layouts.topmenupage')


    	    

<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3>Newsletter</h3>
                        </div>
         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section>
  
        <div class="container">
             <div class="row">
                 <div class="col-lg-12" style="margin-top: 60px; margin-bottom: 100px">
                  
                       
                    @if (session('ok'))
                    <div class="alert alert-success ">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong> {{ session('ok') }}</strong>
                    </div>
                    @endif 
                    
                    
                 
                   

                    <br><br><br>
                  
                    
                </div>
             </div>
        </div>

</section>



@include('layouts/footer')
