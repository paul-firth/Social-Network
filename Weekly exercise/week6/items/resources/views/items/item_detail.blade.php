@extends('layouts.master')

@section('title')
  Item Detail
@endsection

@section('content')
<h1>{{$item->summary}}</h1><br>
{{$item->details}}<br>

<p><a href="{{url("update_item/$item->id")}}">Update Item</a></p>
<p><a href="{{url("/")}}">Home</a></p>
<p>
    <form method="post" action="/delete_item_action">
    {{csrf_field()}}
        <input type='hidden' name="id" value="{{$item->id}}">
        <input type="submit" value="Delete Item">
      </form>
</p>
@endsection

