@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <ul>
        @foreach ($products as $product)
            <a href="/product/{{$product->id}}"><li>{{ $product->name }}</li></a>
        @endforeach
    </ul>
    
    <p><a href='/product/create'>Create Product</a></p>
@endsection