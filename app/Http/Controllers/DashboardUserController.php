<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('dashboard.users.index',[
            'users'=> User::where('id',auth()->user()->id)->get(),
            'images'=>ProfilePicture::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('dashboard/users');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard/users/image-upload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $true_id = User::where('id',auth()->user()->id)->get();
        if($user->id != auth()->user()->id){
            return redirect('dashboard/users');
        }
        return view('dashboard.users.edit', [
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user->username != $request->username){
            $request->validate([
                'username'=>'required|min:5|max:255|unique:users'
            ]);
        } else {
            $request->validate([
                'username'=>'required|min:5|max:255'
            ]);
        }
        
        User::where('id',auth()->user()->id)->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'about_me'=>$request->about_me
        ]);

        return redirect('/dashboard/users')->with('success','Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
