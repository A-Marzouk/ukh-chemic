@extends('layouts.user')

@section('content')

    <div id="single_product">
        <single-product :product="{{$product}}" :category="{{$category}}"></single-product>
    </div>

@endsection