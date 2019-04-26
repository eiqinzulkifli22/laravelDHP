<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\BookHold;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookHoldController extends Controller
{
    //button hold in View Book Details
    public function reserve(Book $book) {
        // Check if there are still available books
        if($book->copies()->where('book_status_id', 1)->count() == 0) {
            return ['success' => false, 'message' => 'No copy of the book is available to loan.'];
        }
        
        $bookHold = auth()->user()->bookReservations()->create([
            'book_id' => $book->id,
            'book_status_id' => 4,
        ]);
        
        return ['success' => true, 'message' => 'Successfully requested for book reservation.'];
    }

    
    
    public function holding(BookHold $bookHold) {
        $bookHold->update(['book_status_id' => 5]);
        
        return ['success' => true, 'message' => 'Successfully holding book.'];
    }
    
    public function release(BookHold $bookHold) {
        $bookHold->update(['book_status_id' => 6]);
        
        return ['success' => true, 'message' => 'Successfully released the book.'];
    }
    
    public function pickup(BookHold $bookHold) {
        $bookHold->update(['book_status_id' => 7]);
        
        return ['success' => true, 'message' => 'Book picked up.'];
    }

    public function holdDetails()
    {
        return auth()->user()->bookReservations;
        // return auth()->user()->bookReservations()->with('book')->get();
    }
}
