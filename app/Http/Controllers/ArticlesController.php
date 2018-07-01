<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $type =\Auth::user()->type;
        if($type!='admin')
        {
        $articles= Article::search($request->name)->where('user_id','=',\Auth::user()->id)->orderBy('id','DESC')->paginate(5);
        }else{
        $articles= Article::search($request->name)->orderBy('id','DESC')->paginate(5);
        }
        $articles->each(function($articles){
            $articles->cateory;
            $articles->user;
        });
        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag:: orderBy('name','ASC')->pluck('name','id');
        $categories= Category:: orderBy('name','ASC')->pluck('name','id');//para no utlizar el foreach en la vista sino solo listar
        // lists deprecado ahora es pluck
        return view('admin.articles.create')->with('categories',$categories)
                                            ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        if($request->file('image'))
        {
            $file = $request->file('image');
            $name = 'image'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/articles';//nos trae la direccion donde se encuentra nuestro proyecto
            $file->move($path,$name);//recibe la direccion y el nombre de la imagen
        }

        $article = new Article($request->all());
        $article->category_id= $request->category_id;
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);//llena mi tabla pivote

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);//
        $image->save();

        Flash::success('¡Se ha registrado el articulo '.$article->tile. ' de forma satisfactoria!');
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles= Article::find($id);
        $articles->category;
        $categories= Category::orderBy('name','DESC')->pluck('name','id');
        $tags= Tag::orderBy('name','DESC')->pluck('name','id');
        $my_tags= $articles->tags->pluck('id')->toArray();
        return view('admin.articles.edit')->with('category',$categories)
                                          ->with('article',$articles)
                                          ->with('tag',$tags)
                                          ->with('my_tag',$my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
       $article = Article::find($id);
       $article->fill($request->all());
       $article->save();

       $article->tags()->sync($request->tags);
       Flash:: warning('¡Se ha editado el artículo '.$article->title. ' de forma exitosa!');
       return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        Flash::error('¡Se ha borrado el artículo '.$article->title.' de forma exitosa!');
        return redirect()->route('articles.index');
    }
}
