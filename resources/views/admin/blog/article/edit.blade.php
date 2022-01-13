
@include('admin.layout.topmenu')

              
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Articles</h1>
  <hr>
      <a href="{{route('admin.article.index')}}" class="btn btn-warning btn-icon-split" >
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Liste des articles</span>
    </a>
  <hr>
  @if (session('ok'))
  <div class="alert alert-success ">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong> {{ session('ok') }}</strong>
  </div>
  @endif 

  
  @if ($errors->has('nom'))
  <br>
  <div class="alert alert-warning ">
     <strong>{{$errors->first('nom')}}</strong> 
  </div>
  @endif
  <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier l'article </h6>
        </div>
        <div class="card-body">
            


        <form method="POST"  action="{{route('admin.article.update', Crypt::encrypt($article->id))}}" enctype="multipart/form-data">
                    
                    @csrf
                   

                    <div class="row">

                        <div class="col-lg-6">
                            <span class="pf-title">Titre de l'article</span>
                            <div class="pf-field">
                                <input type="text" placeholder="Votre titre" value="{{ old('titre') ? old('titre') : $article->titre  }}" name="titre" required class="form-control"/>
                            </div>
                            @if ($errors->has('titre'))
                                <br>
                                <div class="alert alert-warning ">
                                    <strong>{{$errors->first('titre')}}</strong> 
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-3 ">
                            <span class="pf-title">Catégorie de l'article <span class="text-danger">*</span> </span>
                            <div class="form-group">
                                <select data-placeholder="Please Select Specialism" required  name="categorieoffre_id" class="form-control chosen">
                                    
                                   @if($article->categoriearticle() != null) <option value="{{$article->categoriearticle()->id}}">{{$article->categoriearticle()->nom}}</option> 
                                   
                                   @else  
                                   <option value=""></option>
                                   @endif
                            
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>   
                                    @endforeach
                                
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <span class="pf-title">Image couverture</span>
                            <div class="pf-field" id="div_inputimage">
                                <input type="file"  value="{{ old('image') ? old('image') : Auth::user()->image  }}" name="image"  class="form-control"/>
                            </div>

                            <div id="div_updateimage">
                                <img src="{{asset($article->image)}}" width="150px" height="150px" alt="">
                                <a href="#" id="updateimage" class="btn btn-danger btn-icon-split" >
                                    <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                    <span class="text">Modifier l'image</span>
                                </a>
                            </div>

                            @if ($errors->has('image'))
                                <br>
                                <div class="alert alert-warning ">
                                    <strong>{{$errors->first('image')}}</strong> 
                                </div>
                            @endif
                        </div>
                        
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="pf-title">Contenu de l'article</span>
                            <div class="pf-field">
                                <textarea rows="25" type="description" class="form-control"  required name="description">{{ old('description') ? old('description') : $article->description  }}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <br>
                                <div class="alert alert-warning ">
                                    <strong>{{$errors->first('description')}}</strong> 
                                </div>
                            @endif
                        </div>
                    </div>
                
                
                </div>
                <div class="modal-footer">
                <input type="submit" class="btn btn-success" id="Ajouter" value="Modifier">
                </div>
                </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->




@extends('admin.layout.footer')


@section('js-content')

<script src="https://cdn.tiny.cloud/1/ieugu2pgq0vkrn7vrhnp69zprqpp5xfwh9iewe7v24gtdj8f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
t>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks fullscreen',
    'insertdatetime media table paste help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  });
</script>

<script>
    $('#div_inputimage').hide();

    $('#updateimage').click(function(){

    $('#div_inputimage').show();
    $('#div_updateimage').hide();

    })
</script>
@endsection