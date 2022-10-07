<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            "title"=>"Register"
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:5|max:255|unique:users',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // dd("BERHASIL REGISTER");
        $user = User::create($validatedData);

        $profile_picture = ProfilePicture::create([
            'user_id'=>$user->id
        ]);

        // $request->session()->flash('success','Your account has succesfully created!');

        return redirect('/login')->with('success','Your account has succesfully created!');
        // echo "<script>alert('Your account has succesfully created!')</script>";
        
    }
}
