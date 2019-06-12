@extends('layouts.master')
@section('title')
    Products
@endsection

@section('content')
    <h1>Edit prodcut</h1>
    @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif    
    <form method="POST" action="/product/{{$product->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <p><label>Name</label>
        <input type="text" name="name" value="{{$product->name}}"value="{{old('name')}}"></p>
        <p><label>Price</label>
        <input type="text" name="price" value="{{$product->price}}"value="{{old('price')}}"><br></p>
        <p><select name="manufacturer">
            @foreach ($manufacturers as $manufacturer)
                @if($manufacturer->id==old('manufacturer'))
                    <option value="{{$manufacturer->id}}"selected="selected">{{$manufacturer->name}}</option>
                @else
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Update">
    </form>
@endsection