@extends('layouts.user')

@section('content')
    <div id="catalogue">
        <catalogue-component :searchedProducts = "{{json_encode($searchedProducts)}}" category="{{$category_name}}" ></catalogue-component>
    </div>
@endsection
