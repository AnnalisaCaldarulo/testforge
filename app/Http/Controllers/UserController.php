<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        //! primo metodo
        // return view('profile');

        //!secondo metodo - passo il dato che voglio vedere alla vista
        $books =  Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get(); //method chaining

        return view('profile', compact('books'));
    }

    public function destroy()
    {
        $user = Auth::user();
        $user_books = $user->books; //collezione dei libri legati all'utente dalla 1-N

        if (count($user_books) > 0) {
            foreach ($user_books as $book) {

                $book->update([
                    'user_id' => null
                ]);
            }
        }


        $user->delete();
        return redirect()->route('homepage')->with('success', 'Utente cancellato');

    }
}
