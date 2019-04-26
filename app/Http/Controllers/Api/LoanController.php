<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\BookCopy;
use App\Loan;

class LoanController extends Controller
{
    //button confirm to loan
    public function borrow(BookCopy $bookCopy) {
        if ($bookCopy->book_status_id == 1) {
            $loan = auth()->user()->loans()->create([
                'book_copy_id'=> $bookCopy->id,
                'due_date' => Carbon::today()->addDays(30),
            ]);
    
            $bookCopy->update(['book_status_id' => 2]);

            return ['success' => true, 'message' => 'Your due date is ' . $loan->due_date->format('d/m/Y'), 'loan_detail' => $loan->load('bookCopy.book')];
        }

        return ['success' => false, 'message' => 'The book is unavailable to loan.'];
    }
        
    //button confirm to return
    public function return(Loan $loan) {
        if($loan->returned_at == null) {
            $loan->update([
                'returned_at' => Carbon::now(),
            ]);

            $loan->bookCopy->update(['book_status_id' => 1]);

            return ['success' => true];
        }
        
        return ['success' => false, 'message' => 'The book was already returned on ' . $loan->returned_at->format('d/m/Y')];
    }
        
    //button confirm to renew
    public function renew(Loan $loan) {
        if($loan->renewal_count >= 2) {
            return ['success' => false, 'message' => 'Exceed number of renewal.'];
        }
        else if($loan->returned_at != null) {
            return ['success' => false, 'message' => 'The book was already returned on ' . $loan->returned_at->format('d/m/Y')];
        }

        $loan->update([
            'renewal_count' => $loan->renewal_count + 1,
            'due_date' => Carbon::today()->addDays(30),
        ]);

        return ['success' => true, 'loan_detail' => $loan->load('bookCopy.book')];
    }

    public function onLoanDetails()
    {
        return auth()->user()->loans()->with('book')->get();
        // return ['loan_detail' => $loan->load('bookCopy.book')];
        //return auth()->user()->bookReservations()->with('book')->get();

    }
}
