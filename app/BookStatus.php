<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
