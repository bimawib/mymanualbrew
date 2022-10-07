<?php

namespace App\Http\Controllers;

use App\Models\ProfilePicture;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){

        $profilePicture = ProfilePicture::where('user_id',$user->id)->first();

        return view('/users/users',[
            "title" => "User Profile",
            "user" => $user,
            "profilePicture"=>$profilePicture
        ]);
    }
}
