<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $user = auth()->user();
        $sql = "select  orderdetail.orderid,orderdetail.created_at,
(case when orderdetail.status=1 then 'waiting'
when orderdetail.status=2 then 'shipped' else 'shipped' end) as status,
sum(orderdetail.quantity*books.Price) as subtotal,
sum(orderdetail.quantity*books.Price)*0.15 as gst,
sum(orderdetail.quantity*books.Price)*1.15 as grandtotal
from
 (select orders.id as orderid,orders.status as status,orders.created_at as created_at,order_book.book_id as bookid,order_book.quantity as quantity
  from order_book left join orders on order_book.order_id=orders.id where orders.user_id=:userid) as orderdetail
  join books on orderdetail.bookid=books.id
group by orderdetail.orderid,orderdetail.created_at,orderdetail.status
order by orderdetail.created_at desc";
        $orders = DB::select($sql, ['userid' => $user->id]);


        // var_dump($user);
        // var_dump($orders);

        $orderid = (request()->get('orderid') !== null) ? (int) request()->get('orderid') : 0;
        // var_dump($orderid);

        $sqlfororderbooks = "select order_book.book_id as bookid, books.BookName as bookname,
cat.category, books.Price, order_book.quantity, suppliers.name as suppliername
from order_book join books on order_book.book_id = books.id
join ( select book_category.book_id as bookid, GROUP_CONCAT(category.name SEPARATOR ',') as category
		from book_category left join category on book_category.category_id = category.id
        group by bookid ) as cat on books.id = cat.bookid
        join suppliers on books.supplier_id = suppliers.id
        where order_book.order_id=:orderid";
        $orderBooks = DB::select($sqlfororderbooks, ['orderid' => $orderid]);

        return view('myaccount')->with([
            'user' => $user,
            'orders' => $orders,
            'orderbooks'=> $orderBooks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
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
