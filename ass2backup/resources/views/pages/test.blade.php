@extends('layouts.master')

@section('makepost')
<form class="form-horizontal">
    <fieldset>
        <legend><br>Make Post</legend>
        <form method="post" action="/add_post_action">
            <div class="form-group" >
                
                <label for="inputTitl" class="col-lg-2 control-label">Name:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputTitle" placeholder="Name">
                    </div>
                <label for="inputTitl" class="col-lg-2 control-label">Title:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputTitle" placeholder="Title">
                    </div>
                <label for="inputPosr" class="col-lg-2 control-label">Post:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </fieldset>
</form> 
@endsection

@section('content')
  @if($posts)
    
    @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="panda.jpg"><b>{{$post->name}}</b> 
            </div>
            <div class="panel-body">
                <h4>{{$post->title}}</h4> 
            </div>
            <div class="panel-body">
                {{$post->message}} 
            </div>
            <div class="panel-footer">
                See Comments
            </div>
        </div>
    @endforeach
    
  @else
    No item Found.
  @endif
@endsection