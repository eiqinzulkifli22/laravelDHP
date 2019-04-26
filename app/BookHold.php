<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHold extends Model
{
    protected $guarded = ['id'];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(BookStatus::class, 'book_status_id');
    }
}
