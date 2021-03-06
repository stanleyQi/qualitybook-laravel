<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        // if (auth()->check()) {
        //     $this->middleware(['auth', 'verified']);
        //     // auth()->logout();
        //     // return redirect()->route('login');
        // }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()&&auth()->user()->email_verified_at==null) {
            return view('auth.login');
        }

        $books1 = Book::where('PreferredFlag',1)->orderBy('created_at')->take(3)->get();
        $books2 = Book::where('PreferredFlag',2)->orderBy('created_at')->take(3)->get();
        $books3 = Book::where('PreferredFlag',3)->orderBy('created_at')->take(3)->get();
        $books = ['books1'=>$books1,'books2'=>$books2,'books3'=>$books3];

        return view('home')->with('books', $books);
    }

    public function contactus()
    {
        return view('contactus');
    }
}
