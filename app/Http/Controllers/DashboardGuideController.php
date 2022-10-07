<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Pouring;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GuideCategory;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tampil post berdasar
        // return Guide::where('user_id',auth()->user()->id)->get();

        $isAdmin = auth()->user()->is_admin;
        if($isAdmin === 1){
            return view('dashboard.guides.index',[
                'guides'=> Guide::latest()->get()
            ]);
        } else {
            return view('dashboard.guides.index',[
                'guides'=> Guide::where('user_id',auth()->user()->id)->get()
            ]);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tambah halaman tambah post
        return view('dashboard.guides.create',[
            'categories'=>GuideCategory::all(),
            'pouring'=>Pouring::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // jalankan fungsi tambah
        // return $request->file('image')->store('guide-images');
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:posts',
            'guide_category_id'=>'required',
            'image'=>'image|file|max:1024',
            'origin'=>'required',
            'proses'=>'required',
            'notes'=>'required',
            'ratio'=>'required|numeric'
        ]);

        // if($request->file('image')){
        //     $validatedData['image']=$request->file('image')->store('guide-images');
        // }

        $totalPour = count($request->pouring_order);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['total_pour'] = $totalPour;
        $newGuide = Guide::create($validatedData);

        
        for($i=0; $i < $totalPour; $i++){
            Pouring::create([
                'guide_id'=>$newGuide->id,
                'pouring_order'=>$request->pouring_order[$i],
                'pouring_time'=>$request->pouring_time[$i],
                'water_ratio'=>$request->water_ratio[$i]
            ]);
        }

        return redirect('/dashboard/guides')->with('success','New guide added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        // liat detail
        $guide_id = $guide->id;
        $pourings = Guide::where('id',$guide_id)->with('pouring')->first();
        return view('dashboard.guides.show',[
            "title" => "MANUAL BREW GUIDES",
            'guide'=>$guide,
            'pourings'=>$pourings
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        // ubah data
        $guide_id = $guide->id;
        $pourings = Guide::where('id',$guide_id)->with('pouring')->first();

        return view('dashboard.guides.edit',[
            'guide'=>$guide,
            'pourings'=>$pourings,
            'categories'=>GuideCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        $pourBefore = $guide->total_pour;
        $totalPour = count($request->pouring_order);

        Pouring::where('guide_id',$guide->id)->where('pouring_order','>',$totalPour)->delete();

        for($i = 0; $i < $totalPour; $i++){
            $order = $i + 1;
            Pouring::where('guide_id',$guide->id)->where('pouring_order',$order)->update([
                'pouring_order'=>$request->pouring_order[$i],
                'pouring_time'=>$request->pouring_time[$i],
                'water_ratio'=>$request->water_ratio[$i]
            ]);
        }
        if($totalPour > $pourBefore){
            for($i = $pourBefore; $i < $totalPour; $i++){
                Pouring::create([
                    'guide_id'=>$guide->id,
                    'pouring_order'=>$request->pouring_order[$i],
                    'pouring_time'=>$request->pouring_time[$i],
                    'water_ratio'=>$request->water_ratio[$i]
                ]);
            }
        }
            
        $rules = [
            'title'=>'required|max:255',
            'guide_category_id'=>'required',
            'image'=>'image|file|max:1024',
            'origin'=>'required',
            'proses'=>'required',
            'notes'=>'required',
            'ratio'=>'required|numeric',
        ];
        if($request->slug != $guide->slug){
            $rules['slug']='required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        $validatedData['total_pour'] = $totalPour;
        $validatedData['user_id'] = auth()->user()->id;        

        Guide::where('id',$guide->id)->update($validatedData);

        return redirect('/dashboard/guides')->with('success','Guide updated');

        // proses ubah data gambar
        // if($request->file('image')){
        //     if($guide->image){
        //         Storage::delete($guide->image);
        //     }
        //     $validatedData['image']=$request->file('image')->store('guide-images');
        //     $image="",
        //     $image = $this->uploadImage($request->file('image'));
        //     $validatedData['image']= $image;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        // delete post
        if($guide->image){
            Storage::delete($guide->image);
        }
        
        Pouring::where('guide_id',$guide->id)->delete();
        Guide::destroy($guide->id);

        return redirect('/dashboard/guides')->with('success','Guide deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Guide::class,'slug',$request->title);
        return response()->json(['slug'=>$slug]);
    }
}
