@include('admin.layout.topmenu')

              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">offre scrappée</h1>
                  <hr>
                  <a href="{{route('admin.scrap_offre.index')}}" class="btn btn-warning btn-icon-split" >
                      <span class="icon text-white-50">
                          <i class="fas fa-arrow-left"></i>
                      </span>
                      <span class="text">Retour</span>
                  </a>
                     
                    <a href="{{route('admin.offre.create', $offre->id)}}"  class="btn btn-primary btn-sm  " title="Créer l'offre" ><i class="fas fa-plus"></i> créer l'offre</a>     

                  <hr>
                  @if (session('ok'))
                  <div class="alert alert-success ">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> {{ session('ok') }}</strong>
                  </div>
                  @endif 

                  
    
                  <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">


                              <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <strong> Nom entreprise:</strong> <label for="" class="text-danger"> {{$offre->nom_entreprise}} </label> <br>
                                        <strong> Pays:</strong> <label for="" class="text-danger"> {{$offre->pays}} </label> <br>
                                    </div>
                                  <div class="col-sm-6 col-lg-6">

                                    <img src="{{$offre->logo_entreprise}}" alt="">

                                  </div>
                              </div>
                                @php 
                                    
                                    echo $offre->annonce;
                                @endphp



                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->




    @extends('admin.layout.footer')

    
@section('js-content')



@endsection
