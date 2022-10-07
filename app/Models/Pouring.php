<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pouring extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guide(){
        return $this->belongsTo(Guide::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
