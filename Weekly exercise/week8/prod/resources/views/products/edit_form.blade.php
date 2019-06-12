@extends('layouts.master')
@section('title')
    Products
@endsection

@section('content')
    <form method="POST" action="/product/{{$product->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <p><label>Name</label>
        <input type="text" name="name" value="{{$product->name}}"></p>
        <p><label>Price</label>
        <input type="text" name="price" value="{{$product->price}}"><br></p>
        <p><select name="manufacturer">
             @foreach ($manufacturers as $manufacturer)
                @if($manufacturer->id === $product->manufacturer_id)
                    <option value="{{$product->manufacturer->name}}" selected="selected">{{$$product->manufacturer->name}}</option>
                @else
                    <option value="{{$product->manufacturer_name}}">{{$manufacturer->name}}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Update">
    </form>
@endsection