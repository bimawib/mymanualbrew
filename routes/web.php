<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Guide;

use App\Models\Category;
use App\Models\GuideCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\CloudinaryStorage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardGuideController;
use App\Http\Controllers\DashboardImageController;
use App\Http\Controllers\ProfilePictureController;
use Cviebrock\EloquentSluggable\Services\SlugService;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('/home/home',[
        'title' => 'Home'
    ]);
});

Route::get('/home',function(){
    return view('/home/home',[
        'title' => 'Home'
    ]);
});

Route::get('/ratio',function(){
    return view ('ratio/ratio',[
        'title' => 'COFFEE-WATER RATIO CALCULATOR'
    ]);
});

Route::get('/contact',function(){
    return view ('contact/contact',[
        "nama" => "Bima Wibowo",
        "email" => "ceo@bimawib.space",
        "gambar" => "profile.jpg",
        "title" => "Contact"
    ]);
});

Route::get('/blogs',[PostController::class,'index']);
Route::get('blogs/{post:slug}',[PostController::class,'show']);// halaman single post, route model binding

Route::get('/guides',[GuideController::class,'index']);
Route::get('guides/{guide:slug}',[GuideController::class,'show']);


Route::get('/categories',function(){
    return view('categories/categories',[
        "title"=>"POST CATEGORIES",
        "categories"=> Category::all()
    ]);
});

Route::get('/guide_categories',function(){
    return view('guide_categories/guide_categories',[
        "title"=>"Post guide_categories",
        "guide_categories"=> GuideCategory::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('blogs/blogs',[
        'title'=>"Post by Category : $category->name",
        'posts'=>$category->posts->load('category','user')
    ]);
});

Route::get('/guide_categories/{guide_category:slug}', function(GuideCategory $guide_category){
    return view('guides/guides',[
        'title'=>"$guide_category->name Methods Brewing Guide",
        'guides'=>$guide_category->guides->load('guide_category','user')
    ]);
});


Route::get('/author/{author:username}',function(User $author){
    return view('blogs/blogs',[
        'title'=>"Post by Author : $author->name",
        'posts'=> $author->posts->load('category','user')
    ]);
});

Route::get('/guide_author/{author:username}',function(User $author){
    return view('guides/guides',[
        'title'=>"Guide by Author : $author->name",
        'guides'=> $author->guides->load('guide_category','user')
    ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/users/{user:username}',[UserController::class,'show']);
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth');

// pp contoru
Route::get('/dashboard/users/profile-picture/{profile_picture:user_id}',[ProfilePictureController::class,'updateData'])->middleware('auth');
Route::post('/dashboard/users/profile-picture/{profile_picture:user_id}',[ProfilePictureController::class,'storeData'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/guides', DashboardGuideController::class)->middleware('auth');


Route::get('/dashboard/post/checkSlug',[DashboardPostController::class,'checkSlug']);
Route::get('/dashboard/guide/checkSlug',[DashboardGuideController::class,'checkSlug']);

Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware('admin');



