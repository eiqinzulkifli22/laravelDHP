<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $guarded = ['id'];
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function copies()
    {
        return $this->hasManyThrough(BookCopy::class, Book::class);
    }
}
