@extends('layout')

@section('title', 'shoppingcart')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/shoppingcart.css') }}">
@endsection

@section('extra-js')

@endsection

@section('content')
<div class="container">
    <div class="shoppingcart-div">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
            @endif

            @if (Cart::count()==0)
            <h2>The shopping cart is empty.</h2>
            <div style="margin-bottom:20px;">
                <a type="button" class="btn btn-default" href="{{route('booklist')}}">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                </a>
            </div>
            @else
            <h2>There are {{ Cart::count() }} item(s) in the shopping cart.</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h3>Product</h3>
                        </th>
                        <th>
                            <h3>Quantity</h3>
                        </th>
                        <th class="text-center">
                            <h3>Price</h3>
                        </th>
                        <th class="text-center">
                            <h3>Tax</h3>
                        </th>
                        <th class="text-center">
                            <h3>Sub total</h3>
                        </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr class="shoppingcart-item">
                        <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="{{route('book',$item->model->id)}}"> <img
                                        class="media-object" src="{{ asset('img/book'.$item->model->id.'.jpg') }}"
                                        style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$item->model->BookName}}</a></h4>
                                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                </div>
                            </div>
                        </td>
                        <td class="col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="1" />
                        </td>
                        <td class="col-md-1 text-center"><strong>{{$item->model->presentPrice()}}</strong></td>
                        <td class="col-md-1 text-center"><strong>{{$item->model->presentTax()}}</strong></td>
                        <td class="col-md-1 text-center"><strong>{{$item->model->presentSubtotal()}}</strong></td>
                        <td class="col-md-1">
                            <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>Remove
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <h3 class="text-left">Subtotal</h3>
                        </td>
                        <td class="text-right">
                            <h3><strong>{{presentPrice(Cart::subtotal())}}</strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <h3 class="text-left">GST(15%)</h3>
                        </td>
                        <td class="text-right">
                            <h3><strong>{{presentPrice(Cart::tax())}}</strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <h1 class="text-left">Total</h1>
                        </td>
                        <td class="text-right">
                            <h1><strong>{{presentPrice(Cart::total())}}</strong></h1>
                        </td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <a href="{{route('cart.empty')}}">
                                <button type="button" class="btn btn-default">
                                    Clear Shopping Cart
                                </button>
                            </a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-default" href="{{route('booklist')}}">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success shoppingcart-checkout">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>
@endsection
