@extends('layouts.app')

@section('content')

    {!! Form::model($author, ['method' => 'PATCH', 'route' => ['author.update', $author->slug]]) !!}
        @include('Author::form', $author)
    {!! Form::close() !!}



@endsection()
