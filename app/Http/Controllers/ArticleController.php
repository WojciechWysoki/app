<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Http\Requests;

class ArticleController extends Controller
{
    public function create() {
        $data = request()->all();
        $article = new Article();
        $article->title = array_get($data, "title");
        $article->content = array_get($data, "content");
        $article->category_id = array_get($data, "category_id");
        $article->save();
        return redirect(route("category.get", ["id"=>array_get($data, "category_id")]));
    }
    
    public function get() {
        $id=request()->route("id");
        $category=Category::find($id);
        return view ("article", ["category"=>$category]);
    }
}
