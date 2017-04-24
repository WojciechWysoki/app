<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Comment;
use App\Http\Requests;

class CommentController extends Controller
{
        public function create() {
        $data = request()->all();
        $comment = new Comment();
        $comment->author = array_get($data, "author");
        $comment->content = array_get($data, "content");
        $comment->article_id = array_get($data, "article_id");
        $comment->save();
        return redirect(route("article.get", ["id"=>array_get($data, "article_id")]));
    }
    
    public function get() {
        $id=request()->route("id");
        $article=Article::find($id);
        $comment=Comment::find($id);
        return view("comment", ["article"=>$article, "comment"=>$comment]);
    }
}
