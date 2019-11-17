<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\OrderBook;
use App\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //get shoppingcart items and insert the order into orders table of db
        $order = Order::create([
            'user_id'=>auth()->user()?auth()->user()->id:null,
            // 'user_id'=>2,
            'status'=>1
        ]);
        // dd($request);
        //insert them into order_book table of db
        foreach (Cart::content() as $item) {
            OrderBook::create([
                'order_id'=>$order->id,
                'book_id'=>$item->model->id,
                'quantity'=>$item->qty,
            ]);
        }

        //clear shopping cart
        Cart::destroy();

        Log::info(auth()->user()->name." are placed an order(orderid:".$order->id.").");

        //return
        return view('cart/checkout');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
