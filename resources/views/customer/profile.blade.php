@extends('layout')

@section('title', 'profile')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('extra-js')

@endsection

@section('content')
    <div class="container profile-container">
        <div class="row">
            <div class="col-md-12">
                <h2>LiQi</h2>
                <div class="row profile-customerinfo">
                    <div class="col-lg-6 col-md-12" style="padding: 10px 20px;">
                        <h4>Email: &nbsp; qili@gmail.com</h4>
                        <h4>Address: &nbsp; &nbsp;66 Rosetti Rise WestHarbour Auckland</h4><a class="btn btn-default"
                                                                                              role="button"
                                                                                              style="background-color: rgb(86,198,198);">Edit</a>
                    </div>
                    <div class="col-lg-6 col-md-12" style="padding: 10px 15px;">
                        <h4>Phone Number(Home): &nbsp; &nbsp;0987654321</h4>
                        <h4>Phone Number(Work): &nbsp; &nbsp;0987654321</h4>
                        <h4>Mobile: &nbsp; &nbsp;0216666666</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>Order History</h4>
            <table class="table profile-orderlist">
                <thead class="thead-dark" style="border-buttom:2px solid black">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">PlacedDateTime</th>
                    <th scope="col">Status</th>
                    <th scope="col">TotalAmount</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">GST</th>
                    <th scope="col">GrandTotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">11111111</th>
                    <td>12-08-2019 12:00:01</td>
                    <td>Shipped</td>
                    <td>2</td>
                    <td>$ 100</td>
                    <td>$ 15</td>
                    <td>$ 115</td>
                </tr>
                <tr>
                    <th scope="row">11111111</th>
                    <td>12-08-2019 12:00:01</td>
                    <td>Shipped</td>
                    <td>2</td>
                    <td>$ 100</td>
                    <td>$ 15</td>
                    <td>$ 115</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
