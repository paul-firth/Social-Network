@extends('layouts.master')

@section('makepost')
@if (Auth::guest())                <!-- If guest dont display comments form  --> 
 <div class="panel panel-default">
    <div class="panel-heading"><h3>Comments</h3> </div>
</div>
@else
<form class="form-horizontal" method="post" action="/comment">
  {{csrf_field()}}
    <fieldset>
        <legend><br>Add Comment</legend>
            @if (count($errors) > 0)       <!-- error cheacking  --> 
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group" >
                
                <input type="hidden" class="form-control" name="userid" value="{{ Auth::user()->id }}">   <!-- adds users details --> 
                <input type="hidden" class="form-control" name="name" value="{{ Auth::user()->name }}">
                    
                <label for="inputPosr" class="col-lg-2 control-label">Comment:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" name="message" placeholder="Comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type='hidden' name="id" value="{{$post->id}}">
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
    </fieldset>
</form> 
@endif
@endsection

@section('content')
 <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="../{{$image->image}}" style="width:70px;height:70px;"><b>{{$post->name}}</b> 
            </div>
            <div class="panel-body">
                <h4>{{$post->title}}</h4> 
            </div>
            <div class="panel-body">
                {{$post->message}} 
            </div>
           <div class="panel-body">
                 @if($comments)
                 
                   @foreach($comments as $comment)                <!--loops through comments  --> 
                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                               <b>{{$comment->name}}</b> 
                            </div>
                            <div class="panel-body">
                                {{$comment->message}}
                            </div>                      
                            @if (Auth::guest())
                            
                            @else
                            
                                @if (Auth::user()->id == $comment->user)                <!-- If its your comment show delete  --> 
                                <div class="panel-footer">
                                    <form method="POST" action="/comment/{{$comment->commentid}}">          
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <input type='hidden' name="id" value="{{$comment->commentid}}">
                                        <input type='hidden' name="postid" value="{{$post->id}}">
                                        <input type="submit" value="Delete" class="btn btn-default">
                                    </form>
                                </div>
                               @endif 
                           @endif 
                        </div>
                      
                 @endforeach 
                 @else 
                    <div class="panel-heading">
                        No Comments Found 
                    </div>
                  @endif 
           </div>
            <div class="panel-footer">                      <!-- If its you post show update and delete --> 
                {{ $comments->links() }}
                <br>
                @if (Auth::guest())
                     <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 
                @else 
                     @if (Auth::user()->id == $post->user) 
                        <form method="POST" action="/post/{{$post->id}}">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{url("/post/$post->id/edit")}}"><input type="" value="Update" class="btn btn-default" style="height:38px; width:72px"></a>
                            <input type="submit" value="Delete" class="btn btn-default">
                        </form>
                    
                     @else 
                        
                        <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 
                           
                    @endif  
                @endif 
            </div>
        </div>
@endsection

