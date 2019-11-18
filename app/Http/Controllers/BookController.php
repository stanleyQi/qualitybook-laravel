<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $book = Book::with('supplier')->where('id', $id)->firstOrFail();

        // $book1 = DB::table('books')
        //     ->join('suppliers', 'books.supplier_id', '=', 'suppliers.id')
        //     ->where('books.id', ['id' => $id])
        //     ->select('books.*', 'suppliers.name as suppliername')
        //     ->get();
        // $book->offsetSet('suppliername',$book1[0]->suppliername);

        return view('book\bookdetails')->with('book', $book);
    }

    public function search()
    {
        //
        $pagination = 2;

        if (request()->searchCriteria==1) {
            $query = request()->input('search');
            $books = Book::where('BookName','like', "%$query%"); // return a query builder but not a collection
            $categories = Category::all();
        } else {
            $query = request()->input('search');
            $books = Book::where('Price', '=', $query);
            $categories = Category::all();
        }

        if (request()->sort === "low_high") {
            $books = $books->orderBy('Price')->paginate($pagination);
        } elseif (request()->sort === "high_low") {
            $books = $books->orderBy('Price', 'desc')->paginate($pagination);
        } else {
            $books = $books->paginate($pagination);
        }

        return view('book\booklist')->with(['books' => $books, 'categories' => $categories]);
    }
}
