<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function status()
    {
        return $this->belongsTo(BookStatus::class, 'book_status_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
