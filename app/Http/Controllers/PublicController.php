<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Mail\AdminContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    public function homepage()
    {
        $books = Book::all();

        // ['books'=>$books]
        return view('welcome', compact('books'));
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function thankYou()
    {
        return view('thank-you');
    }

    public function contactUsSubmit(Request $request) //DEPENDENCY INJECTION 
    {
        // dd($request->all());
        $name = $request->input('name');
        $mail = $request->input('email');
        $message = $request->input('message');

        try {
            Mail::to($mail)->send(new ContactMail());
            Mail::to('admin@dreamcar.it')->send(new AdminContactMail($name, $mail, $message));
            return redirect()->route('thank.you');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMail', "C'è stato un problema, riprova più tardi");
        }
        // ->with('successMail', 'Hai inviato la tua mail con successo, controlla la tua casella di posta');
    }


  
}
