@extends('layouts.user')

@section('content')
    <div id="catalogue">
        <catalogue-component :searchedProducts = "{{json_encode($searchedProducts)}}" ></catalogue-component>
    </div>
@endsection