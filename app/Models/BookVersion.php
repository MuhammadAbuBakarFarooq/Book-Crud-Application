<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookVersion extends Model
{
    protected $fillable = ['v_no','price','description', 'language', 'book_id'];
    
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
