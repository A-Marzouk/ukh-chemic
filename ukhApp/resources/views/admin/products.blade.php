@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="products">
                <products-list-component saved_category="{{$savedCategory}}"></products-list-component>
            </div>
        </div>
    </div>
</div>
@endsection
