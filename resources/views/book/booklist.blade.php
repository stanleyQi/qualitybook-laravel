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
        <div class="col-lg-3 col-md-3 booklist-category">
            <h1>Categories</h1>
            <hr>
            <div class="booklist-category">
                <ul>
                    {{--                        --}}
                    <li><a href="{{route('booklist',['category'=>0])}}">All</a></li>
                    @foreach ($categories as $category)
                    <li><a href="{{route('booklist',['category'=>$category->id])}}">{{$category->name}}</a></li>
                    @endforeach
                    {{--                        --}}
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            {{-- //TODO:sorting by price --}}
            <div class="booklist-header" style="margin-bottom:20px;">
                <div style="display:inline-block;">
                    {{$books->appends(request()->input())->links()}}
                </div>
                <div class="booklist-sorting">
                    <strong>Price:&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    <a href="{{route('booklist',['category'=>request()->category,'sort'=>'low_high'])}}">Low to high</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="{{route('booklist',['category'=>request()->category,'sort'=>'high_low'])}}">High to low</a>
                    <div class="clearboth"></div>
                </div>

            </div>

            <div class="row">
                @forelse ($books as $book)
                <div class="col-lg-6 col-md-6">
                    <div class="thumbnail">
{{--                        <a href="{{route('book',$book->id)}}"><img src="{{ asset('img/book'.$book->id.'.jpg') }}" alt="..." class=".img-thumbnail" /></a>--}}
                        <a href="{{route('book',$book->id)}}"><img src="{{ asset('storage/'.$book->ImageUrl) }}" alt="book" class=".img-thumbnail" /></a>
                        <div class="caption">
                            <a href="{{route('book',$book->id)}}">
                                <h3>{{ $book->BookName }}</h3>
                            </a>
                            <p>{{ $book->Description }}</p>
                            <p class="home-p-price"></p>
                            <div class="home-div-btn"><a href="#" class="btn btn-primary home-btn-addtocart">Add to
                                    cart</a></div>
                            <div class="home-div-price"><span class="home-price">{{ $book->presentPrice() }}</span>
                            </div>
                            <p></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @empty
                <div>No items found.</div>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
