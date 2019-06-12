 
                 
@extends('layouts.master')

@section('makepost')
            <div class="panel-heading"> 
                <img src="/panda.jpg">
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
             <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form method="POST" action="/user" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name: </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email: </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="dob" class="col-md-4 control-label">Date of Birth: </label>
                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="password" class="col-md-4 control-label">Password: </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="password_confirm" class="col-md-4 control-label">Confirm Password: </label>
                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="image" class="col-md-4 control-label">Profile Picture </label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>    
                    </form>

            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Cancel</a> 

            </div>
        </div>
@endsection
