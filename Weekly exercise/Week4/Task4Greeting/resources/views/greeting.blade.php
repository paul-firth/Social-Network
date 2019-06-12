@extends('layouts.master')

@section('title')
  Greeting result
@endsection

@section('content')
    <p>
    Hello {{$name}}.
    Next year, you will be {{$age}} years old.
@endsection

