<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books1 = Book::where('PreferredFlag',1)->take(3)->get();
        $books2 = Book::where('PreferredFlag',2)->take(3)->get();
        $books3 = Book::where('PreferredFlag',3)->take(3)->get();

        return view('home')->with('books',['books1'=>$books1,'books2'=>$books2,'books3'=>$books3]);
    }

}
