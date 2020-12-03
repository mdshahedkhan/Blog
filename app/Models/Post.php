<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id','title', 'sub_title', 'description', 'image', 'status'];
    public function categories(){
        return $this->belongsTo(\App\Models\Category::class, 'user_id');
    }
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id');
    }
}
