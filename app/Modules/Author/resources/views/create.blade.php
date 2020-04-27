@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'author.store']) !!}
        @include('Author::form')
    {!! Form::close() !!}








@endsection()
