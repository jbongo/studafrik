                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">commentaires</h6> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Titre de l'article</th>
                                            <th>commentaire</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Autheur</th>
                                            <th>Email</th>
                                            <th>Date du commentaire</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre de l'article</th>
                                            <th>commentaire</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Autheur</th>
                                            <th>Email</th>
                                            <th>Date du commentaire</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                      
                                        
                                        
                                    </tfoot>
                                    <tbody>
                                        @foreach ($commentaires as $commentaire )

                                        @if($commentaire->valide == true)
                                        <tr>
                                          
                                            <td>{{$commentaire->article->titre}}</td>
                                            <td>{{$commentaire->commentaire}}</td>
                                            {{-- <td>{!! substr($commentaire->description, 0, 50) !!}...</td> --}}
                                            <td>{{$commentaire->nom}}</td>
                                            <td>{{$commentaire->email}}</td>
                                            <td>{{$commentaire->created_at->format("d/m/Y")}}</td>
                                            <td>    
                                                {{-- <a href="{{route('commentaires.show', Crypt::encrypt($commentaire->id))}}" target="_blank" class="btn btn-primary btn-circle btn-sm  update" ><i class="fas fa-eye"></i></a>      --}}
                                                <a href="{{route('admin.commentaire.valider', Crypt::encrypt($commentaire->id))}}" class="btn btn-success btn-circle btn-sm  update" ><i class="fas fa-check"></i></a>     

                                                <a href="{{route('admin.commentaire.delete', Crypt::encrypt($commentaire->id))}}" class="btn btn-danger btn-circle btn-sm supprimer"><i class="fas fa-trash"></i></a></td>
                                            
                                        </tr>
                                        @endif
                                        @endforeach
                                       

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>