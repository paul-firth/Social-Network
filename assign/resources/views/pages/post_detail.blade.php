@extends('layouts.master')

@section('makepost')
<form class="form-horizontal" method="post" action="/add_comment_action">
  {{csrf_field()}}
    <fieldset>
        <legend><br>Add Comment</legend>
            <div class="form-group" >
                
                <label for="inputTitl" class="col-lg-2 control-label">Name:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                <label for="inputPosr" class="col-lg-2 control-label">Comment:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" name="message" placeholder="Comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type='hidden' name="id" value="{{$post->postid}}">
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </fieldset>
</form> 
@endsection

@section('content')
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
            <div class="panel-body">
                 @if($comments)
                    @foreach($comments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                               <b>{{$comment->name}}</b> 
                            </div>
                            <div class="panel-body">
                                {{$comment->message}}
                            </div>
                            <div class="panel-footer">
                                <form method="post" action="/delete_comment_action">
                                    {{csrf_field()}}
                                    <input type='hidden' name="id" value="{{$comment->commentid}}">
                                    <input type='hidden' name="postid" value="{{$post->postid}}">
                                    <input type="submit" value="Delete Comment">
                                 </form>
                            </div>
                        </div>
                      
                    @endforeach
                  @else
                    <div class="panel-heading">
                        No Comments Found 
                    </div>
                  @endif 
            </div>
            <div class="panel-footer">
                <a href="{{url("update_post/$post->postid")}}">Update Post</a>
                <form method="post" action="/delete_post_action">
                    {{csrf_field()}}
                    <input type='hidden' name="id" value="{{$post->postid}}">
                    <input type="submit" value="Delete Post">
                 </form>
            </div>
        </div>
@endsection

