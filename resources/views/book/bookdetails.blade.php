@extends('layout')

@section('title', $book->BookName)

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/bookdetails.css') }}">
@endsection

@section('content')
<div class="container bookdetails-container">
    <div class="row bookdetails-row" style="margin-bottom:20px;">
        <div class="col-lg-5 col-md-12">
            <div class="text-center"><img src="{{ asset('storage/'.$book->ImageUrl) }}"></div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="row">
                <div class="col-md-12 bookdetails-bookname">
                    <h1>{{$book->BookName}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <h4 class="text-left">Author: {{$book->Author}}</h4>
                    <h4 class="text-left">Catetory:{{$book->categories()->first()->name}} </h4>
                {{-- <h4 class="text-left">Supplier: {{ $book->suppliername }}</h4> --}}
                <h4 class="text-left">Supplier: {{ $book->supplier->name }}</h4>
                <h4 class="text-left">Price: {{$book->presentPrice()}}</h4>
                    <div>
                        {{-- <br>
                        <div class="input-group bookdetails-amount">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                    data-type="minus" data-field="quant[1]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1"
                                max="10">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus"
                                    data-field="quant[1]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div> --}}
                        <br>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$book->id}}">
                            <input type="hidden" name="name" value="{{$book->BookName}}">
                            <input type="hidden" name="price" value="{{$book->Price}}">
                            <button class="btn btn-default bookdetails-addtocart" type="submit">Add to Cart</button>
                        </form>

                        <br /><br>
                        <a href="{{route('booklist')}}" class="bookdetails-goback">Go back to the list</a>
                    </div>
                </div>
                <div class="col-lg-7 col-lg-offset-0 col-md-12">
                    <h3 class="text-left">Description: &nbsp;</h3>
                    <p>{{$book->Description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    // $('.btn-number').click(function (e) {
    //         e.preventDefault();

    //         fieldName = $(this).attr('data-field');
    //         type = $(this).attr('data-type');
    //         var input = $("input[name='" + fieldName + "']");
    //         var currentVal = parseInt(input.val());
    //         if (!isNaN(currentVal)) {
    //             if (type == 'minus') {

    //                 if (currentVal > input.attr('min')) {
    //                     input.val(currentVal - 1).change();
    //                 }
    //                 if (parseInt(input.val()) == input.attr('min')) {
    //                     $(this).attr('disabled', true);
    //                 }

    //             } else if (type == 'plus') {

    //                 if (currentVal < input.attr('max')) {
    //                     input.val(currentVal + 1).change();
    //                 }
    //                 if (parseInt(input.val()) == input.attr('max')) {
    //                     $(this).attr('disabled', true);
    //                 }

    //             }
    //         } else {
    //             input.val(0);
    //         }
    //     });
    //     $('.input-number').focusin(function () {
    //         $(this).data('oldValue', $(this).val());
    //     });
    //     $('.input-number').change(function () {

    //         minValue = parseInt($(this).attr('min'));
    //         maxValue = parseInt($(this).attr('max'));
    //         valueCurrent = parseInt($(this).val());

    //         var name = $(this).attr('name');
    //         if (valueCurrent >= minValue) {
    //             $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    //         } else {
    //             alert('Sorry, the minimum value was reached');
    //             $(this).val($(this).data('oldValue'));
    //         }
    //         if (valueCurrent <= maxValue) {
    //             $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    //         } else {
    //             alert('Sorry, the maximum value was reached');
    //             $(this).val($(this).data('oldValue'));
    //         }


    //     });
    //     $(".input-number").keydown(function (e) {
    //         // Allow: backspace, delete, tab, escape, enter and .
    //         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
    //             // Allow: Ctrl+A
    //             (e.keyCode == 65 && e.ctrlKey === true) ||
    //             // Allow: home, end, left, right
    //             (e.keyCode >= 35 && e.keyCode <= 39)) {
    //             // let it happen, don't do anything
    //             return;
    //         }
    //         // Ensure that it is a number and stop the keypress
    //         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
    //             e.preventDefault();
    //         }
    //     });
</script>
@endsection
