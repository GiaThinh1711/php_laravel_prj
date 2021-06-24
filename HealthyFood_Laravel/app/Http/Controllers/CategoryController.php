<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public  function  all(){
        $categories = Category::all();
        return view('category.list',[
            "categories"=>$categories
        ]);
    }

    public  function  form(){
        return view('category.form',[

        ]);
    }

    public function save_category(Request  $request){
        $name = $request->get("name");
        Category::create(["name"=>$name]);
        return redirect()->to("category");

    }

    public function edit($id)
    {
        $catid = DB::table("categories")->where("id",$id)->first();
        $cat = Category::findOrFail($id);
        if($cat == null) return redirect()->to("category");
        return  view('category.edit',[
            "cat"=>$cat,
            "catid"=>$catid
        ]);

    }

    public  function update($id, Request $request){
        $cat = Category::findOrFail($id);
        if($cat == null)  return redirect()->to("category");
        $cat->update([
            "name"=>$request->get("name")
        ]);
        return redirect()->to("category");
    }
}

