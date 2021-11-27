<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\Book\StoreBookRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function catalog(Request $request)
    {
        $books = $this->getBooks($request->search);

        return Inertia::render('App/Book/Catalog', ['books' => $books]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = $this->getBooks($request->search);
        return Inertia::render('App/Book/BookList', ['books' => $books]);
    }

    public function getBooks($search)
    {
        return Book::when($search, function($query, $search) {
                    return $query->where('isbn', 'LIKE', '%'.$search.'%')
                            ->orWhere('author', 'LIKE', '%'.$search.'%')
                            ->orWhere('title', 'LIKE', '%'.$search.'%');
                })
                ->with(['condition', 'category'])
                ->paginate(15);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formConfig = ['method' => 'post','url' => route('book.store')];
        
        return Inertia::render('App/Book/BookEntry', ['formConfig' => $formConfig]);
        
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
        
        Book::create($bookValidate);
        
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
        $formConfig = ['method' => 'put','url' => route('book.update', $book->id)];
        
        return Inertia::render('App/Book/BookEntry', [
            'book' => $book, 
            'formConfig' => $formConfig
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

        if(isset($bookValidate['image'])) {
            $book->image = $bookValidate['image'];
            $book->save();
        }

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
        $book->delete();
        
        return back()->with(['message' => 'Buku '. $book->title .' terhapus']);
    }
}
