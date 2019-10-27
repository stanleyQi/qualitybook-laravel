@extends('layout')

@section('title', 'profile')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('extra-js')

@endsection

@section('content')
<div class="container profile-container">
    <div class="row profile-row">
        <div>
            <h1 style="display:inline-block">Profile</h1>
            {{-- <span style="margin-left:20px;"><a href="">edit</a></span> --}}
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <div style="display:inline-block;margin-right:20px;">UserId: {{ $user->id }}</div>
                <div style="display:inline-block;margin-right:20px;">UserName: {{ $user->name }}</div>
                <div style="display:inline-block;margin-right:20px;">Email: {{ $user->email }}</div>
                {{-- <h3>LockEnd: XXXX/XX/xx</h3> --}}
            </div>
            {{-- <div class="col-lg-6 col-md-9">
                <h3>Address: </h3>
                <h3>Contact Number : </h3>
            </div> --}}
        </div>
        <br />
        <div>
            <h2>Orders</h2>
            <table class="table table2" style="border:2px solid white;">
                <thead class="thead-light" style="border:2px solid white;">
                    <tr>
                        <th scope="col">OrderId</th>
                        <th scope="col">Placed DateTime</th>
                        <th scope="col">Status</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">GST</th>
                        <th scope="col">GrandTotal</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr tabindex="2">
                        <td>{{$order->orderid}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{presentPrice($order->subtotal)}}</td>
                        <td>{{presentPrice($order->gst)}}</td>
                        <td>{{presentPrice($order->grandtotal)}}</td>
                        <td class="adminindex-operation">
                            <a href="#">Select</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br />

        <h2>Order Details</h2>
        <table class="table table3" style="border:2px solid white;">
            <thead class="thead-light" style="border:2px solid white;">
                <tr>
                    <th scope="col">Book Id</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
