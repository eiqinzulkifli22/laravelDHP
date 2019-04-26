<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(BookStatus::class, 'book_status_id');
    }

    public function category()
    {
        return $this->book->category();
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
