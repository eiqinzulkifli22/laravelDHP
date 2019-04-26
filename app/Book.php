<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function reserve()
    {
        return $this->hasMany(BookHold::class);
    }

    
}
