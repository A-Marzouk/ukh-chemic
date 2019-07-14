@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 p-4">
            <a href="{{route('admin.products')}}" class="btn btn-dark">
                Products
            </a>
        </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-5 p-4">
                <a href="{{route('admin.category.products',$category->ID_NAME)}}" class="btn btn-outline-primary btn-block">
                    {{$category->title}}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
