  
                 
@extends('layouts.master')

@section('makepost')
            <div class="panel-heading"> 
                
                <h2>Editing {{$post->title}}</h2> 
            </div>
@endsection

@section('content')
 <div class="panel panel-default">
     @if (count($errors) > 0)
        <div class="alert">
            <ul>
            @foreach ($errors->all() as $error)        <!-- error cheacking --> 
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
            <div class="panel-heading"> 
                <h2>Update Post</h22>
            </div>  
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/post/{{$post->id}}">   <!-- update post form  --> 
                          {{csrf_field()}}
                          {{ method_field('PUT') }}
                    <fieldset>        
                            <div class="form-group" >
                                <label for="inputTitl" class="col-lg-2 control-label">Name:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="name"  value="{{$post->name}}">
                                    </div>
                                <label for="inputTitl" class="col-lg-2 control-label">Title:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                    </div>
                                <label for="inputPosr" class="col-lg-2 control-label">Post:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" class="form-control" rows="3" name="message">{{$post->message}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <input type='hidden' name="id" value="{{$post->id}}">
                                    <button type="reset" class="btn btn-default">Clear</button>
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </div>
                            </div>
                    </fieldset>
                </form> 
            </div>
            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Cancel</a> 

            </div>
        </div>
@endsection
