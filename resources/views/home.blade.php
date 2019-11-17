@extends('layout')

@section('title', 'home')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('extra-js')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Best seller</h2>
        </div>
    </div>

   {{-- {{dd($books)}} --}}

    <div class="row">
        @foreach($books['books1'] as $book)
        <div class="col-md-3">
            <div class="thumbnail">
                <a href="{{route('book',$book->id)}}"><img src="{{ asset('storage/'.$book->ImageUrl) }}" alt="..."
                        class=".img-thumbnail"></a>
                <div class="caption">
                    <a href="{{route('book',$book->id)}}">
                        <h3>{{ $book->BookName  }}</h3>
                    </a>
                    <p>{{ $book->ShortDescription }}</p>
                    <p class="home-p-price">
                        <div class="home-div-btn"><a href="{{route('book',$book->id)}}" class="btn btn-primary home-btn-addtocart"
                                role="button">View detail</a></div>
                        <div class="home-div-price"><span class="home-price">{{ $book->presentPrice() }}</span></div>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Promotion</h2>
        </div>
        <div class="row">
            @foreach($books['books2'] as $book)
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="{{route('book',$book->id)}}"><img src="{{ asset('storage/'.$book->ImageUrl) }}" alt="..."
                            class=".img-thumbnail"></a>
                    <div class="caption">
                        <a href="{{route('book',$book->id)}}">
                            <h3>{{ $book->BookName  }}</h3>
                        </a>
                        <p>{{ $book->ShortDescription }}</p>
                        <p class="home-p-price">
                            <div class="home-div-btn"><a href="{{route('book',$book->id)}}"
                                    class="btn btn-primary home-btn-addtocart" role="button">View detail</a></div>
                            <div class="home-div-price"><span class="home-price">{{ $book->presentPrice() }}</span></div>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h2>New books</h2>
        </div>
        <div class="row">
            @foreach($books['books3'] as $book)
           <div class="col-md-3">
            <div class="thumbnail">
                <a href="{{route('book',$book->id)}}"><img src="{{ asset('storage/'.$book->ImageUrl) }}" alt="..."
                        class=".img-thumbnail"></a>
                <div class="caption">
                    <a href="{{route('book',$book->id)}}">
                        <h3>{{ $book->BookName  }}</h3>
                    </a>
                    <p>{{ $book->ShortDescription }}</p>
                    <p class="home-p-price">
                        <div class="home-div-btn"><a href="{{route('book',$book->id)}}"
                                class="btn btn-primary home-btn-addtocart" role="button">View detail</a></div>
                        <div class="home-div-price"><span class="home-price">{{ $book->presentPrice() }}</span></div>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
            @endforeach

        </div>
    </div>


</div>
@endsection
