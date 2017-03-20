<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    
    
    public function staticCreate() {
      $category = Category::firstOrCreate(
    ['name' => 'First Category']
      
     );
      $category = Category::firstOrCreate(
    ['name' => 'Second Category']
      
     );
     return "categories are ready";
  }
  
  
  public function get(){
        $id = request()->route("id");
        if(is_null($id)) {
            $categories = Category::all();
            return view("categories", ["categories"=>$categories]);
        }
        $category = Category::find($id);
        if(is_null($category)) {
            return redirect("category");
        }
        return view("category", ["category"=>$category]);
    }
    
    public function create() {
        $data = request()->all();
        $category = new Category();
        $category->name = array_get($data, "name");
        $category->save();
        return redirect(route("category.get"));
    }
   public function xhrGetArticlesByCategory() {
       $id = request()->route("id");
  //      if(is_null($id)) {
     //       $categories = Category::all();
  //          return view("categories", ["categories"=>$categories]);
   //     }
        $category = Category::find($id);
    //    if(is_null($category)) {
    //        return redirect("category");
    //    }
        return response()->json($category->articles);
   }
}
