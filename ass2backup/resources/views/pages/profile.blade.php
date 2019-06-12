                 
@extends('layouts.master')

@section('makepost')

    <div class="panel-heading"> 
        <img src="../{{$user->image}}" style="width:70px;height:70px;">
        <br>
        <h2>{{$user->name}}</h2>
    </div>
    <div class="panel-body"> 
        Hello {{$user->name}}
        <p>Profile Page</p>
        <p><a href="{{url("/user/$user->id/edit")}}">Delete Profile</a></p>
    </div>
@endsection

@section('content')

@if($posts)
    
    @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="../{{$post->image}}" style="width:70px;height:70px;"><b>{{$post->name}}</b> 
            </div>
            <div class="panel-body">
                <h4>{{$post->title}}</h4> 
            </div>
            <div class="panel-body">
                {{$post->message}} 
            </div>
            <div class="panel-footer">
                Number of comments {{$post->num_com}}<br>
                
                <a href="{{url("/post/$post->id")}}">See Comments</a>
                <a href="{{url("/post/$post->id/edit")}}">Update Post</a>
                <form method="POST" action="/post/{{$post->id}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="btn btn-default">
                </form>
            </div>
        </div>
    @endforeach
    
  @else
    No posts Found.
  @endif
            
            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 

            </div>
        </div>
@endsection