<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(request()->category){
            $books = Book::with('categories')->whereHas('categories',function($query){
                $query->where('category_id',request()->category);
            })->get();
            $categories = Category::all();
        }else{
            $books = Book::inRandomOrder()->take(12)->get();
            $categories = Category::all();
        }


        return view('book\booklist')->with(['books'=>$books,'categories'=>$categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::where('id', $id)->firstOrFail();

        return view('book\bookdetails')->with('book', $book);
    }
}
