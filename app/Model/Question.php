<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = []; 
    //protected $fillable  = ['title', ...]
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
