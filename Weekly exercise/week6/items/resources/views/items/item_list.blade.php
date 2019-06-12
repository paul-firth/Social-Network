@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
  <h1>Items</h1>
  @if($items)
    <ul>
    @foreach($items as $item)
      <li><a href="{{url("item_detail/$item->id")}}">{{$item->summary}}</a></li> 
    @endforeach
    </ul>
  @else
    No item Found.
  @endif
  <p>
    <a href="/add_item"> Add a new item</a>
  </p>
@endsection

