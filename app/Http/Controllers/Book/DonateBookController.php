<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\DonateBook;
use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class DonateBookController extends Controller
{
    public function index(Request $request)
    {
        $books = DonateBook::when($request->search, function($query, $search) {
                return $query->where('isbn', 'LIKE', '%'.$search.'%')
                        ->orWhere('author', 'LIKE', '%'.$search.'%')
                        ->orWhere('title', 'LIKE', '%'.$search.'%');
            })
            ->with(['condition', 'category'])
            ->paginate(15);
        
        return Inertia::render('App/Book/BookList', ['books' => $books]);
    }

    public function create()
    {
        $url = route('donate-book.store');
        
        return Inertia::render('App/Book/BookEntry', ['url' => $url]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $bookValidate = $request->validated();
        $bookValidate['user_id'] = 1;

        $book = DonateBook::create($bookValidate);

        if ($request->image) {
            $path = $request->image
                    ->storeAs('images/books', $book->user_id.'_'.$book->isbn.'_'.date('Y-m-d H:m:i'));
            $book->image = '/'.$path;
            $book->save();
        }
        
        return redirect()->route('donate-book.create')->with([
            'message' => 'Buku '. $request->title .' berhasil ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(DonateBook $donateBook)
    {
        $newBook = $donateBook->toArray();

        unset($newBook['id']);
        unset($newBook['user_id']);
        unset($newBook['created_at']);
        unset($newBook['updated_at']);
        
        $book = Book::create($newBook);
        $imageName = $donateBook->image;

        if ($image = $donateBook->image) {
            
            if ($image != '/images/books/cover.jpg') {
                $imageName =  '/images/books'.$book->isbn.'_'.date('Y-m-d H:m:i');
                
                Storage::move($image, $imageName);
            }
                
    
            $book->image = $imageName;
            $book->save();
            
            $donateBook->delete();
        }

        return back()->with(['message' => $newBook['title'].' berhasil ditambah']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DonateBook $donateBook)
    {
        $book = $donateBook;
        $book['_method'] = 'PUT';
        $url = route('donate-book.update', $donateBook);
        
        return Inertia::render('App/Book/BookEntry', [
            'book' => $donateBook, 
            'url' => $url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, DonateBook $donateBook)
    {
        $bookValidate = $request->validated();

        $donateBook->update($bookValidate);
        
        $path = $donateBook->image;

        if ($request->image) {
            $path = '/'.$request->image
                ->storeAs('images/books', $donateBook->user_id.'_'.$donateBook->isbn.'_'.date('Y-m-d H:m:i'));
            
            if ($donateBook->image != '/images/books/cover.jpg') {
                Storage::delete($donateBook->image);
            }
        }

        $donateBook->image = $path;
        $donateBook->save();

        return redirect()->route('donate-book.index')->with(['message' => 'Buku '.$request->title.' berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonateBook $donateBook)
    {
        if ($donateBook->image != '/images/books/cover.jpg') {
            Storage::delete($donateBook->image);
        }

        $donateBook->delete();

        return back()->with(['message' => 'Buku '. $donateBook->title .' terhapus']);
    }
}
