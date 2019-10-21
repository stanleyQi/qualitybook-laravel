@extends('layout')

@section('title', 'booklist')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/booklist.css') }}">
@endsection

@section('extra-js')

@endsection

@section('content')

    <div class="container">
        <div class="row booklist-row">
            <div class="col-lg-3 col-md-3 booklist-category"><h1>Categories</h1>
                <hr>
                <div class="booklist-category">
                    <ul>
{{--                        --}}
                        <li><a href="{{route('booklist')}}">All</a></li>
                        <li><a href="#">Maori Culture</a></li>
                        <li><a href="#">Category2</a></li>
                        <li><a href="#">Category3</a></li>
                        <li><a href="#">Category4</a></li>
{{--                        --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
{{--                    --}}
                    @foreach($books as $book)
                    <div class="col-lg-6 col-md-6">
                        <div class="thumbnail">
                            <a href="{{route('book',$book->id)}}"><img src="{{ asset('img/book'.$book->id.'.jpg') }}" alt="..." class=".img-thumbnail"/></a>
                            <div class="caption">
                                <a href="{{route('book',$book->id)}}"><h3>{{ $book->BookName }}</h3></a>
                                <p>{{ $book->Description }}</p>
                                <p class="home-p-price"></p>
                                <div class="home-div-btn"><a href="#" class="btn btn-primary home-btn-addtocart">Add to
                                        cart</a></div>
                                <div class="home-div-price"><span class="home-price">{{ $book->presentPrice() }}</span></div>
                                <p></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    --}}
                </div>
            </div>
        </div>
    </div>
@endsection
