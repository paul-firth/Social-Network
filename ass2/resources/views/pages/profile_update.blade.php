                 
@extends('layouts.master')

@section('makepost')

    <div class="panel-heading"> 
        <img src="../../{{$user->image}}" style="width:70px;height:70px;">
        <br>
        <h2>Update {{$user->name}}'s profile</h2>
    </div>
    <div class="panel-body"> 
        Hello {{$user->name}}
        <p>Update Profile Page</p>
    </div>
@endsection

@section('content')

    @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 
    

    
    <div class="panel panel-default">
        <div class="panel-heading">Delete User</div>
            <div class="panel-body">
                Are you sure you would like to delete this user?
                <form method="POST" action="/user/{{$user->id}}">           <!-- Delete User   --> 
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="btn btn-default">
                </form>
            </div>
        </div>
        <div class="panel-footer">
            <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 
        </div>
    </div>

@endsection

           