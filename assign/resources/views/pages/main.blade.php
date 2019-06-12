@extends('layouts.master')

@section('makepost')
<form class="form-horizontal" method="post" action="/add_post_action">
  {{csrf_field()}}
    <fieldset>
        <legend><br>Make Post</legend>
            <div class="form-group" >
                
                <label for="inputTitl" class="col-lg-2 control-label">Name:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                <label for="inputTitl" class="col-lg-2 control-label">Title:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                <label for="inputPosr" class="col-lg-2 control-label">Post:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </fieldset>
</form> 
@endsection

@section('content')
  @if($posts)
    
    @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="/panda.jpg" style="width:70px;height:70px;"><b>{{$post->name}}</b> 
            </div>
            <div class="panel-body">
                <h4>{{$post->title}}</h4> 
            </div>
            <div class="panel-body">
                {{$post->message}} 
            </div>
            <div class="panel-footer">
                Number of comments {{$post->num_com}}<br>
                
                <a href="{{url("post_detail/$post->postid")}}">See Comments</a>
                <a href="{{url("update_post/$post->postid")}}">Update Post</a>
                <form method="post" action="/delete_post_action">
                    {{csrf_field()}}
                    <input type='hidden' name="id" value="{{$post->postid}}">
                    <input type="submit" value="Delete Post">
                 </form>
            </div>
        </div>
    @endforeach
    
  @else
    No posts Found.
  @endif
@endsection