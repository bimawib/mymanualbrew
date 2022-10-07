<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use App\Http\Controllers\CloudinaryStorage;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilePictureController extends Controller
{
    public function updateData(ProfilePicture $profilePicture){
        return view('dashboard.images.edit', [
            'profilePicture'=>$profilePicture
        ]);
    }

    public function storeData(ProfilePicture $profilePicture, Request $request){

        $request->validate([
            'image'=>'image|file|max:1024'
        ]);

        CloudinaryStorage::delete($profilePicture->profile_pictures);

        $image = $request->file('image');
        $storepp = CloudinaryStorage::upload($image->getRealPath(),$image->getClientOriginalName());

        ProfilePicture::where('id',$profilePicture->id)->update([
            'user_id'=>auth()->user()->id,
            'profile_pictures'=>$storepp
        ]);

        return redirect('dashboard/users/')->withSuccess('Your profile picture has been updated!');
    }
    
}
