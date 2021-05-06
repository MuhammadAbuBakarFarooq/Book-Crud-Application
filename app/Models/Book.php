<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn','title','category', 'author', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function version()
    {
        return $this->hasMany('App\Models\BookVersion');
    }
}
