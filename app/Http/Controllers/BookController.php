<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function index()
    {
        $books = Book::all()->sortBy('title');
        return view('book.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        // $book = new Book();
        // $book->title = $request->title;
        // $book->plot = $request->plot;
        // $book->price = $request->price;
        // $book->pages = $request->pages;
        // $book->save();

        //!MASS ASSIGNMENT 
        $book = Book::create([
            'title' => $request->title,
            'plot' => $request->plot,
            'price' => $request->price,
            'pages' => $request->input('pages'),
            'cover' => $request->file('cover')->store('public/covers'),
            'user_id' => Auth::user()->id //prende l'utente autenticato in sessione e salva
        ]);

        $book->categories()->attach($request->categories); //prendi le categorie legate a questo libro e ATTACCA le categorie inserite dall'utente
        //funzione di relazione categories:
        //! con tonde - sono in SCRITTURA - voglio accedere al dato e modificarlo
        //! senza tonde - sono in LETTURA - voglio accedere al dato per vederlo


        return redirect()->route('homepage')->with('success', 'Hai salvato il libro in piattaforma');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('book.edit', compact('book', 'categories'));
    }


    public function update(Request $request, Book $book)
    {

        $book->update([
            'title' => $request->title,
            'plot' => $request->plot,
            'price' => $request->price,
            'pages' => $request->input('pages'),
            // 'cover' =>  $request->cover ? $request->file('cover')->store('public/covers') : $book->cover
        ]);
        //truthy - stringa piena, numero !=0, true
        if ($request->cover) {
            $book->update([
                'cover' => $request->file('cover')->store('public/covers')
            ]);
        }
        //falsy -stringa vuota, false, 0, null
        // dd($request->cover); //null ->false

        $book->categories()->sync($request->categories); //sincronizzazione

        return redirect()->route('homepage')->with('success', 'Hai modificato il libro in piattaforma');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::delete($book->cover);
        }
        if (count($book->categories) > 0) {
            foreach ($book->categories as $category) {
                $book->categories()->detach($category); //stacca la singola categoria ciclata
            }
        }

        $book->delete();
        return redirect()->route('homepage')->with('success', 'Hai cancellato il libro in piattaforma');
    }
}
