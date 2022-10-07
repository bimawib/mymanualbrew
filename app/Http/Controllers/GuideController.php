<?php

namespace App\Http\Controllers;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index(){
        return view('/guides/guides',[
            "title" => "MANUAL BREW GUIDES",
            "guides" => Guide::latest()
            ->paginate(9)->withQueryString()
        ]);
    }

    public function show(Guide $guide){
        $pourings = Guide::where('id',$guide->id)->with('pouring')->first();

        return view('guide/guide',[
            "title" => "MANUAL BREW GUIDES",
            "guide" => $guide,
            "pourings" => $pourings
        ]);
    }
    
}
