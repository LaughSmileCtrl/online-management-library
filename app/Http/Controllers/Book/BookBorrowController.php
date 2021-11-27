<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookBorrowController extends Controller
{
    
    public function index()
    {
        $user_id = 32;
        $booksBorrow = UserBook::where('user_id', $user_id)
                ->where('return_at', null)
                ->with('book.category', 'book.condition')
                ->paginate(15);
        
        
        return Inertia::render('App/Book/BookBorrowed', ['booksBorrow' => $booksBorrow]);
    }

    public function store(Request $request) {
        $user_id = 32;
        $bookBorrow = new UserBook;

        $bookBorrow->user_id = $user_id;
        $bookBorrow->book_id = $request->id;
        $bookBorrow->borrow_at = date('Y-m-d H:i:s');
        $bookBorrow->due_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d'). ' + 1 weeks'));
        $bookBorrow->save();
        
        $bookBorrow->book->borrowed_qty = $bookBorrow->book->borrowed_qty + 1;
        $bookBorrow->push();

        return back()->with([
            'message' => 'Anda telah meminjam buku '
                    . $bookBorrow->book->title 
                    . ' silahkan ambil buku ini di admin'
        ]);
    }


    public function destroy($id)
    {
        $user_id = 32;
        $bookBorrow = UserBook::where('user_id', $user_id)
                ->where('book_id', $id)
                ->where('return_at', null)
                ->first();

        $bookBorrow->return_at = date('Y-m-d');
        $bookBorrow->book->borrowed_qty = $bookBorrow->book->borrowed_qty - 1;

        $returnAt = date_create($bookBorrow->return_at);
        $dueAt = date_create(
            date_format(date_create($bookBorrow->due_at), 'Y-m-d')
        );

        if($returnAt > $dueAt) {
            $dateDiff = date_diff($returnAt, $dueAt)->format('%a');
            $bookBorrow->bill = $dateDiff;
        }

        $bookBorrow->save();
        $bookBorrow->push();

        return back()->with([
            'message' => 'Anda telah mengembalikan buku '
                    . $bookBorrow->book->title 
                    . ' silahkan letakkan di meja admin'
        ]);
    }
}
