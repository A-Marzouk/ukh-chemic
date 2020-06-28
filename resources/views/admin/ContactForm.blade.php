@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Title</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <th scope="col">{{$contact->id}}</th>
                    <th scope="col">{{$contact->name}}</th>
                    <th scope="col">{{$contact->email}}</th>
                    <th scope="col">{{$contact->telephone}}</th>
                    <th scope="col">{{$contact->title}}</th>
                    <th scope="col">{{$contact->message}}</th>
                    <th scope="col"><a href="/admin/contact/delete/{{$contact->id}}" class="btn btn-sm btn-danger">Delete</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
