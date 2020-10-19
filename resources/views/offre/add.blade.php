{{-- 
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Welcome Ali TUFAN</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">



                    @include('layouts.leftmenu')

                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Ajouter une offre</h3>
                        
                            </div>
                            <div class="profile-form-edit">

                                
                                <form onSubmit={handleSubmit} >
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <span class="pf-title">Titre de l'offre</span>
                                            <div class="pf-field">
                                                <input type="text"  name="titre" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <span class="pf-title">Description</span>
                                            <div class="pf-field">
                                                <textarea name="description" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Description du profil recherché</span>
                                            <div class="pf-field">
                                                <textarea name="description_profil" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <span class="pf-title">Catégorie de l'emploi</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism"  name="categorie_offre_id" class="form-control chosen">
                                                   <option>Marketing</option>
                                                   <option>Informatique</option>
                                                   <option>Art & Culture</option>
                                                   
                                               </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <span  htmlFor="customRange1" class="pf-title">Salaire Min </span>
                                            <div class="pf-field">
                                               <input type="number"  name="salaire_min" class="custom-range" ></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <span  htmlFor="customRange1" class="pf-title">Salaire Max </span>
                                            <div class="pf-field">
                                               <input type="number"  name="salaire_max" class="custom-range" ></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="pf-title"  htmlFor="customRange2">Expérience réquise Min (mois)</span>
                                            <div class="pf-field">
                                               <input type="number"  name="experience_min" class="custom-range" ></input>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="pf-title"  htmlFor="customRange2">Expérience réquise Max (mois)</span>
                                            <div class="pf-field">
                                               <input type="number"  name="experience_max" class="custom-range" ></input>
                                                
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <span class="pf-title">Sexe</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism"    name="sexe" class="form-control chosen">
                                                   <option>H/F</option>
                                                   <option>H</option>
                                                   <option>F</option>
                                               
                                               </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-12">
                                            <span class="pf-title">Date d'expiration de l'offre</span>
                                            <div class="pf-field">
                                                <input type="date"   name="date_expiration" class="form-control datepicker" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="pf-title">Compétences réquises</span>
                                            <div class="pf-field">
                                                <textarea name="competence_requise" id="" cols="30" rows="5"></textarea>
                                           </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Pays de l'offre</span>
                                            <div class="pf-field">
                                                <select data-placeholder="Please Select Specialism"  name="pays" class=" form-control chosen">
                                                   <option>Gabon</option>
                                                   <option>Benin</option>
                                                   
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="pf-title">Ville de l'offre</span>
                                            <div class="pf-field">
                                                <input type="text"  name="ville" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" >Ajouter</button>
                                        </div>
                                        

                                    </div>
                                </form>
                            </div>
       
                        </div>
                   </div>


     

                   
				 </div>
			</div>
		</div>
	</section>

	

</div>