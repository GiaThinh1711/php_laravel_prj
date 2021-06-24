<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public  function  all(){
        $informations = Information::all();
        return view('information.list',[
            "informations"=>$informations
        ]);
    }

    public  function  create(){
        return view('information.create',[
        ]);
    }

    public function save(Request  $request){
        $image = $request->get("image");
        $description = $request->get("description");

        $request->validate([
            "image" => "required",
            "description" => "required",
        ]);
        try {
            Information::create([
                "image"=>$image,
                "description"=>$description,
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
        return redirect()->to("information");
    }

    public function edit($id)
    {
        $pr = Information::findOrFail($id);
        if($pr == null) return redirect()->to("information");
        return  view('information.edit',[
            "pr"=>$pr,
        ]);

    }

    public  function update($id, Request $request){
        $pr = Information::findOrFail($id);
        if($pr == null)  return redirect()->to("information");

        $image = $request->get("image");
        $description = $request->get("description");
        $request->validate([
            "image" => "required",
            "description" => "required",
        ]);
        $pr->update([
            "image"=>$image,
            "description"=>$description,
        ]);
        return redirect()->to("information");
    }
}
