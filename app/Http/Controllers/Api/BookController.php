<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\BookCopy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function search()
    {
        $term = request('term');

        $books = Book::with('category')->with('copies.status')
        ->where('title', 'like', '%'.$term.'%')
        ->orWhere('author', 'like', '%'.$term.'%')
        ->orWhere('isbn', 'like', '%'.$term.'%')
        ->orWhere('call_no', 'like', '%'.$term.'%')
        ->orWhereHas('category', function ($q) use($term) {
            return $q->where('name', 'like', '%'.$term.'%');
        })
        ->orWhereHas('copies', function ($q) use($term) {
            return $q->where('copy_no', 'like', '%'.$term.'%');
        })
        ->get();

        return $books;
    }

    public function searchByCopyNo()
    {
        $copy_no = request('copy_no');

        // $books = Book::with('category')->with('copies.status')
        // ->whereHas('copies', function ($q) use($copy_no) {
        //     return $q->where('copy_no', $copy_no);
        // })
        // ->get();

        // return $books;

        return BookCopy::where('copy_no', $copy_no)
        ->with('book.category')
        ->with('status')
        ->get();
    }
}
