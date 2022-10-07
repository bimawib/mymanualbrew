<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Guide extends Model
{
    use HasFactory, Sluggable;
    public function sluggable(): array{
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }
    //protected $fillable = ['title','origin','proses','notes','ratio','body'];
    protected $guarded = ['id'];
    protected $with = ['user','guide_category'];

    public function guide_category(){
        return $this->belongsTo(GuideCategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pouring(){
        return $this->hasMany(Pouring::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
