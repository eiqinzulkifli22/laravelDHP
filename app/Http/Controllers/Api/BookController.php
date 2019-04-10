<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function search()
    {
        $term = request('term');

        $books = Book::where('title', 'like', '%'.$term.'%')
        ->orWhere('author', 'like', '%'.$term.'%')
        ->orWhere('isbn', 'like', '%'.$term.'%')
        ->orWhere('copy_no', 'like', '%'.$term.'%')
        ->orWhere('call_no', 'like', '%'.$term.'%')
        ->with('status')
        //->with('location')
        ->get();

        return $books;
    }
}
