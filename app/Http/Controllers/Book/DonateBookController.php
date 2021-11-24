<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\DonateBook;
use App\Http\Requests\Book\StoreBookRequest;
use Illuminate\Http\Request;
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
        $formConfig = ['method' => 'post','url' => route('donate-book.store')];
        
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
        $bookValidate['user_id'] = 1;

        DonateBook::create($bookValidate);
        
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
        dd($donateBook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DonateBook $donateBook)
    {
        $formConfig = ['method' => 'put','url' => route('donate-book.update', $donateBook)];
        
        return Inertia::render('App/Book/BookEntry', [
            'book' => $donateBook, 
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
    public function update(StoreBookRequest $request, DonateBook $donateBook)
    {
        $bookValidate = $request->validated();

        $donateBook->update($bookValidate);

        if(isset($bookValidate['image'])) {
            $donateBook->image = $bookValidate['image'];
            $donateBook->save();
        }

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
        $donateBook->delete();

        return back()->with(['message' => 'Buku '. $donateBook->title .' terhapus']);
    }
}
