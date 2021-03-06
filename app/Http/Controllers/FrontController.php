<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Carbon\Carbon;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
       Carbon::setlocale('es');
    }
    public function index()
    {
        $users= User::orderBy('id','ASC')->paginate(5);
        return view('admin.users.index')->with('users',$users);
    }
    public function searchCategory($name)
    {
        $category= Category::searchCategory($name)->first();
        $articles= $category->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        return view('auth.dashboard')->with('articles',$articles);
    }
    public function searchTag($name)
    {
        $tag= Tag::searchTag($name)->first();
        $articles= $tag->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        return view('auth.dashboard')->with('articles',$articles);
    }
    public function viewArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->category;
        $article->user;
        $article->tag;
        $article->image;
        return view('vistas.article')->with('article',$article);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
