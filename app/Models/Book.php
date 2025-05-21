<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    protected $fillable = [
        'title', 'description', 'price', 'stock', 'cover_photo', 'genre_id','author_id',
    ];
}
