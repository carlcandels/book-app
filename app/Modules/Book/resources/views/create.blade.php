@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'book.store', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
        @include('Book::form')
    {!! Form::close() !!}


@endsection()
