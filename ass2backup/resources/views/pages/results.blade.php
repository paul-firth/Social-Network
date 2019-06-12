                 
@extends('layouts.master')

@section('makepost')

    <div class="panel-heading"> 
        <h2>Search Results</h2>
    </div>
    
@endsection

@section('content')

@if($results)
    
    @foreach($results as $result)
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="../{{$result->image}}" style="width:70px;height:70px;"><b>{{$result->name}}</b> 
            </div>
            <div class="panel-body">
                <a href="{{url("/user/$result->id")}}">Vist Profile Page</a> 
            </div>
        </div>

    @endforeach
    
  @else
    No posts Found.
  @endif
        <div class="panel panel-default">    
            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 

            </div>
        </div>
@endsection