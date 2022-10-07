<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    
    public function sluggable(): array{
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }

    //protected $fillable = ['title','excerpt','body'];
    protected $guarded = ['id'];
    protected $with = ['category','user'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
