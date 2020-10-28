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




<section>
    <div class="block">
        <div class="container">
             <div class="row">
                 <div class="col-lg-6 column">
                     <div class="contact-form">
                         <form>
                             <div class="row">
                            

                                <div class="col-lg-12">
                                    <span class="pf-title">Nom ou Raison Sociale</span>
                                    <div class="pf-field">
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Email</span>
                                     <div class="pf-field">
                                         <input type="text" placeholder="" />
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Sujet</span>
                                     <div class="pf-field">
                                         <input type="text" placeholder="" />
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Message</span>
                                     <div class="pf-field">
                                         <textarea></textarea>
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <button type="submit">Envoyer</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="col-lg-6 column">
                     <div class="contact-textinfo">
                         <h3>Infos</h3>
                         <ul>

                            <li><i class="la la-phone"></i><span>Contactez-nous au : +33015522000</span></li>
                            <li><i class="la la-envelope-o"></i><span>Email : info@studafrik.com</span></li>
                         
                             
                            
                         </ul>
                     </div>
                </div>
             </div>
        </div>
    </div>
</section>


@include('layouts/footer')
