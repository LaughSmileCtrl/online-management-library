<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\Book\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BookController extends Controller
{
    public function catalog(Request $request)
    {
        $books = Book::when($request->search, function($query, $search) {
                    return $query->where('isbn', 'LIKE', '%'.$search.'%')
                            ->orWhere('author', 'LIKE', '%'.$search.'%')
                            ->orWhere('title', 'LIKE', '%'.$search.'%');
                })
                ->when($request->categoryId, function($query, $categoryId) {
                    return $query->where('category_id', $categoryId);
                })
                ->with(['condition', 'category'])
                ->paginate(15); 

        return Inertia::render('App/Book/Catalog', ['books' => $books]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::when($request->search, function($query, $search) {
                return $query->where('isbn', 'LIKE', '%'.$search.'%')
                    ->orWhere('author', 'LIKE', '%'.$search.'%')
                    ->orWhere('title', 'LIKE', '%'.$search.'%');
                })
                ->with(['condition', 'category'])
                ->paginate(15);
                    
        return Inertia::render('App/Book/BookList', ['books' => $books]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('book.store');
        
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
        
        $book = Book::create($bookValidate);

        if ($request->image) {
            $path = $request->image
                    ->storeAs('/images/books', $book->isbn.'_'.date('Y-m-d H:m:i'));
            $book->image = '/'.$path;
            $book->save();
        }
        
        return redirect()->route('book.index')->with([
            'message' => 'Buku '. $request->title .' berhasil ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book = $book;
        $book['_method'] = 'PUT';
        $url = route('book.update', $book->id);
        
        return Inertia::render('App/Book/BookEntry', [
            'book' => $book, 
            'url' => $url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        $bookValidate = $request->validated();

        $book->update($bookValidate);

        $path = $book->image;

        if ($request->image) {
            $path = '/'.$request->image
                ->storeAs('images/books', $book->user_id.'_'.$book->isbn.'_'.date('Y-m-d H:m:i'));
            
            if ($book->image != '/images/books/cover.jpg') {
                Storage::delete($book->image);
            }
        }

        $book->image = $path;
        $book->save();
        
        return redirect()->route('book.index')->with(['message' => 'Buku '.$request->title.' berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->image != '/images/books/cover.jpg') {
            Storage::delete($book->image);
        }

        $book->delete();
        
        return back()->with(['message' => 'Buku '. $book->title .' terhapus']);
    }
}
