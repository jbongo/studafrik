<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Commentaire;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Crypt;
use File;
use Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where([['archive', false], ['actif', true]])->paginate(15);


        return view('blog.index', compact('articles'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_commentaire(Request $request, $article_id)
    {
        //
        // dd($request->all());

        if(Auth::check()){
            Commentaire::create([
                "user_id" => $request->user_id,
             
                "article_id" => $article_id,
                "commentaire" => $request->commentaire,
            ]);
        }else{
            Commentaire::create([
                "nom" => $request->nom,
                "email" => $request->email,
                "article_id" => $article_id,
                "commentaire" => $request->commentaire,
            ]);
        }
    
        return redirect()->route('article.show',Crypt::encrypt($article_id))->with('ok',"Votre commentaire sera soumis à la validation de l'administrateur");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article_show($slug)
    {
        
        $article = Article::where('slug', $slug)->first();
        $commentaires = $article != null ? Commentaire::where([['article_id', $article->id],['valide',true]])->get() : null;
       
        $posts = Article::orderBy('id', 'desc')->paginate(5);


        return view('blog.article',compact('article','commentaires','posts'));
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
            InterventionImage::make($avatar)->save( public_path('/images/blog/' . $filename ) );
            
            }

            $article->image = 'images\blog\\' . $filename ;
            
            $slug = $this->to_slug($request->titre);
            
            $slug = str_replace(['--','---'],'-', $slug);
    
            $article->slug = $slug;
    
            
            
            $article->update();
      

       return redirect()->route('admin.article.index')->with('ok',"Article ajouté");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_admin($slug)
    {
        
        $article = Article::where('slug',$slug)->first();
        $num = $id;


        return view('blog.article',compact('article','num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_admin($slug)
    {
        $article = Article::where('slug',$slug)->first();
      


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
            InterventionImage::make($avatar)->save( public_path('/images/blog/' . $filename ) );

                // on supprime l'ancienne image si elle existe
                if($article->image) {
                    
                    $img = public_path($article->image);
                  
                    if(File::exists($img) ){
                       File::delete($img);
                   }
                   
                }

            $article->image = 'images\blog\\' . $filename ;

            
            }
            
            $slug = $this->to_slug($request->titre);
            $slug = str_replace(['--','---'],'-', $slug);
            
    
            $article->slug = $slug;

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
    
        $article = Article::where('id',Crypt::decrypt($id))->first();
        
        $article->delete();
    
        
    }
    
    
    

  /**
     * Convertir une chaine de caractère en slug.
     *
     * @param  String $slug
     * @return String 
     */
    public function to_slug($string)
    {
        
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-','?' => '','-' => '','  ' => '-','.'=>'',"'"=>'','('=>'',')'=>''
        );
    
        // -- Remove duplicated spaces
        $string = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);
    
        // -- Returns the slug
        return strtolower(strtr($string, $table));
        
    }
    
    
      /**
     * Convertir une chaine de caractère en slug.
     *
     * @param  String $slug
     * @return String 
     */
    public function convert_to_slug()
    {

       $articles =  Article::all();

       foreach($articles as $article){

            $slug = $this->to_slug($article->titre);
          
            $article->slug = $slug;
            $slug = str_replace(['--','---'],'-', $slug);
            
            $article->update();

       }



    }

}
