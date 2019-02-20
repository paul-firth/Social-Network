@extends('layouts.master')

@section('makepost')

@if (Auth::guest())        <!-- If guest show Welcome if logged in show Post form  --> 
 <div class="panel panel-default">
    <div class="panel-heading"><h3>Welcome to Social Panda's</h3> </div>
</div>
@else
<form class="form-horizontal" method="post" action="/post">
  {{csrf_field()}}
    <fieldset>
        <legend><br>Make Post</legend>
            @if (count($errors) > 0)               <!-- Error cheacking form contents  --> 
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="form-group" >  
                
                
                <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}">           <!-- Includes logged in users name and id --> 
                <input type="hidden" class="form-control" name="name" value="{{ Auth::user()->name }}">
                    
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
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
    </fieldset>
</form> 
@endIf
@endsection

@section('content')
  @if($users)
    
    @foreach($users as $user)                    <!-- Loop to display posts   --> 
        <div class="panel panel-default">
            <div class="panel-heading"> 
                <img src="/ass2/public/{{$user->image}}" style="width:70px;height:70px;"><b><a href="{{url("/user/$user->user")}}">  {{$user->name}}</a> </b> 
            </div>
            <div class="panel-body">
                <h4>{{$user->title}}</h4> 
            </div>
            <div class="panel-body">
                {{$user->message}} 
            </div>
            <div class="panel-footer">
                Number of comments {{$user->num_com}} <br>
                @if (Auth::guest())
                    <a href="{{url("/post/$user->id")}}" class="btn btn-default">See Comments</a> 
                @else
                    @if (Auth::user()->id == $user->user)                    <!-- If logged in as the user who created post show delete and update options  --> 
                       
                        
                        <form method="POST" action="/post/{{$user->id}}">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{url("/post/$user->id")}}" class="btn btn-default">See Comments</a>
                            <a href="{{url("/post/$user->id/edit")}}" class="btn btn-default">Update Post</a>
                            <input type="submit" value="Delete" class="btn btn-default">
                        </form>
                    @else
                        <br>
                        <a href="{{url("/post/$user->id")}}" class="btn btn-default">See Comments</a>
                    @endIf 
                @endif    
            </div>
        </div>
    @endforeach
    
  @else
    No posts Found.
  @endif
@endsection