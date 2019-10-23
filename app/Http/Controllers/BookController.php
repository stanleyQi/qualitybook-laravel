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
        $pagination = 2;

        if(request()->category){
            $books = Book::with('categories')->whereHas('categories',function($query){
                $query->where('category_id',request()->category);
            });
            $categories = Category::all();
        }else{
            $books = Book::take(12);
            $categories = Category::all();
        }

    if (request()->sort==="low_high") {
        $books = $books->orderBy('Price')->paginate($pagination);
    }elseif (request()->sort==="high_low") {
        $books = $books->orderBy('Price','desc')->paginate($pagination);
    }else {
        $books = $books->paginate($pagination);
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
