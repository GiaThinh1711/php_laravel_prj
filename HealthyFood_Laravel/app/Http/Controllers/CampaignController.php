<?php

namespace App\Http\Controllers;

use App\Category;
use App\Campaign;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function Sodium\add;

class CampaignController extends Controller
{

    public  function  all(){
        $campaigns = Campaign::with("Category")->get();
        return view('campaign.list',[
            "campaigns"=>$campaigns
        ]);
    }

    public  function  create(){
        $categories = Category::all();
        return view('campaign.create',[
            "categories" => $categories
        ]);
    }

    public function save(Request  $request){
        $image = $request->get("image");
        $description = $request->get("description");
        $category_id = $request->get("category_id");

        $request->validate([
            "image" => "required",
            "description" => "required",
            "category_id" => "required|numeric|min:1",
        ]);
        try {
            Campaign::create([
                "image"=>$image,
                "description"=>$description,
                "category_id"=>$category_id,
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
        return redirect()->to("campaign");
    }

    public function edit($id)
    {
        $categories = Category::all();
        $pr = Campaign::findOrFail($id);
        if($pr == null) return redirect()->to("campaign");
        return  view('campaign.edit',[
            "pr"=>$pr,
            "categories"=>$categories
        ]);

    }

    public  function update($id, Request $request){
        $pr = Campaign::findOrFail($id);
        if($pr == null)  return redirect()->to("campaign");

        $image = $request->get("image");
        $description = $request->get("description");
        $category_id = $request->get("category_id");

        $request->validate([
            "image" => "required",
            "description" => "required",
            "category_id" => "required|numeric|min:1",
        ]);
        try {
            $pr->update([
                "image"=>$image,
                "description"=>$description,
                "category_id"=>$category_id,
            ]);
        } catch (\Exception $e){
            abort(404);
        }

        return redirect()->to("campaign");
    }
}
