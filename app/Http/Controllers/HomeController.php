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
        $books = Book::inRandomOrder()->take(3)->get();

        return view('home')->with('books',$books);
    }

}
