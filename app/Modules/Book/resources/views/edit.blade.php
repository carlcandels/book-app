@extends('layouts.app')

@section('content')

    {!! Form::model($book, ['method' => 'PATCH', 'route' => ['book.update', $book->slug], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
        @include('Book::form', $book)
    {!! Form::close() !!}



@endsection()
