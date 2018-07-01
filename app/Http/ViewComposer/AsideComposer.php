<?php
namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Category;
use App\Tag;
class AsideComposer {

    public function compose(View $view)
    {
        $categories = Category::orderBy('name','DESC')->get();
        $tag        = Tag::orderBy('name','DESC')->get();
        $view->with('categories',$categories)
             ->with('tags',$tag);
    }
}