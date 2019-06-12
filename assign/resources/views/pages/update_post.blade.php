  
                 
@extends('layouts.master')

@section('makepost')
            <div class="panel-heading"> 
                <img src="/panda.jpg">
                <br>
                <h2>{{$post->name}}</h2> 
            </div>
@endsection

@section('content')
 <div class="panel panel-default">
            <div class="panel-heading"> 
                <form class="form-horizontal" method="post" action="/update_post_action">
                  {{csrf_field()}}
                    <fieldset>
                        <legend><br>Update Post</legend>
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
                                    <textarea class="form-control" rows="3" name="message" placeholder="{{$post->message}}"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <input type='hidden' name="id" value="{{$post->postid}}">
                                    <button type="reset" class="btn btn-default">Clear</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
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
