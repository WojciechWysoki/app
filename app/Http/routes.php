<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
    
Route::get('/category/create', array('as' => 'category.create', 'uses' => 'CategoryController@staticCreate'));
Route::get('/category/{id?}', array('as' => 'category.get', 'uses' => 'CategoryController@get'));
Route::get('/article/{id?}', array('as' => 'article.get', 'uses' => 'ArticleController@get'));
Route::post('/category', array('as' => 'category.post', 'uses' => 'CategoryController@create'));
Route::post('/article', array('as' => 'article.post', 'uses' => 'ArticleController@create'));
Route::get('/comment/{id?}', array('as' => 'comment.get', 'uses' => 'CommentController@get'));
Route::post('/comment', array('as' => 'comment.post', 'uses' => 'CommentController@create'));
Route::get('xhr/category/{id?}/article', array('as' => 'xhr.category.get', 'uses' => 'CategoryController@xhrGetArticlesByCategory'));
Route::get('xhr/article/{id?}/comment', array('as' => 'xhr.article.get', 'uses' => 'ArticleController@xhrGetACommentsByCategory'));
    
        
    
    
