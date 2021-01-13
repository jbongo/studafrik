<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Crypt;
use File;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where([['archive', false], ['actif', true]])->get();


        return view('blog.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article_show($id)
    {
        
        $article = Article::where('id', Crypt::decrypt($id))->first();
       


        return view('blog.article',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ############# ADMINISTRATION ###############


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin()
    {
        $articles = Article::all();


        return view('admin.blog.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_admin()
    {
        return view('admin.blog.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_admin(Request $request)
    {
        

    
        $request->validate([
                
            'titre' => 'required|string|unique:articles',
            'description' => 'required',
            "image" => "required|image|max:5000",
        
        ]);


        $article = Article::create([
            "titre"=> $request->titre,
            "description"=> $request->description,
        ]);


        if($request->hasFile('image')){
            
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename = $article->id.'_'.$filename;
           

            // $avatar->move(public_path().'\images\blog\\',$article->id.'.jpg');
            InterventionImage::make($avatar)->save( public_path('\images\blog\\' . $filename ) );
            
            }

            $article->image = 'images\blog\\' . $filename ;
            $article->update();
      

       return redirect()->route('admin.article.index')->with('ok',"Article ajouté");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_admin($id)
    {
        
        $article = Article::where('id',$id)->first();
        $num = $id;


        return view('blog.article',compact('article','num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_admin($id)
    {
        $article = Article::where('id',Crypt::decrypt($id))->first();
      


        return view('admin.blog.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, $id)
    {
         
        $article = Article::where('id',Crypt::decrypt($id))->first();

        // dd($article);
        if($request->titre != $article->titre){
            $request->validate([
                
                'titre' => 'required|string|unique:articles',
                'description' => 'required',       
            ]);
    
        }
        

      
            $article->titre = $request->titre;
            $article->description = $request->description;
     


        if($request->hasFile('image')){

            $request->validate([
                "image" => "required|image|max:5000",
            ]);

          
            
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename = $article->id.'_'.$filename;
           

            // $avatar->move(public_path().'\images\blog\\',$article->id.'.jpg');
            InterventionImage::make($avatar)->save( public_path('images\blog\\' . $filename ) );

                // on supprime l'ancienne image si elle existe
                if($article->image) {
                    
                    $img = public_path($article->image);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }

            $article->image = 'images\blog\\' . $filename ;

            
            }

            $article->update();
      

       return redirect()->route('admin.article.index')->with('ok',"Article Modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_admin($id)
    {
        //
    }
}
