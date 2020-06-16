@extends('layouts.user')

@section('content')
    <div id="catalogue">
        <catalogue-component :searchedProducts = "{{json_encode($searchedProducts)}}" category="{{$category_name}}" @if(isset($error_in_search) && !empty($error_in_search)) error_in_search="{{$error_in_search}}" @endif></catalogue-component>
    </div>
@endsection
