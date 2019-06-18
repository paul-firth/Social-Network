@extends('layouts.master')

@section('makepost')
@if (Auth::guest()) 
    <div class="panel-heading"> 
        <img src="../{{$user->image}}" style="width:70px;height:70px;">
        <br>
        <h2>{{$user->name}}</h2> 
    </div>
    <div class="panel-body"> 
            <p>{{$user->name}}'s Profile Page</p>
    </div>
@else
    <div class="panel-heading"> 
        <img src="../{{$user->image}}" style="width:70px;height:70px;">
        <br>
        <h2>{{$user->name}}</h2> 
    </div>
    <div class="panel-body"> 
        @if (Auth::guest())                                  <!--  Cheacks fr guest or the owner of profile show delete option if owner  --> 
            <p>{{$user->name}}'s Profile Page</p>
            
        @else
            <p>{{$user->name}}'s Profile Page</p>

            <p>Date of Birth {{$user->dob}}</p>
            @if (Auth::user()->id == $user->id)
                <p><a href="{{url("/user/$user->id/edit")}}">Delete Profile</a></p>
          
            @endif
        @endif    
    </div>
    
    
    @if($friends)                         <!--  loop  through friends   -->
        <?php $notfriend = 0 ; ?>        <!-- A varible I used to help prevent an add friend button up showing when users had multiple friends  -->
        @foreach($friends as $friend)
                    @if ($friend->usera == $user->id && $friend->userb == Auth::user()->id )  <!-- checking for friendship if found shows unfriend button  -->
                        <div class="panel-body">
                            <form method="POST" action="/friend/{{$user->id}}">          
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type='hidden' name="delid" value="{{$friend->id}}">
                                <input type='hidden' name="id" value="{{Auth::user()->id}}">
                                <input type='hidden' name="friendid" value="{{$user->id}}">
                                <input type="submit" value="Unfriend" class="btn btn-default">
                            </form>
                        </div>
                    
                    @elseif ($user->id == Auth::user()->id)
                        
                    @elseif ($friend->userb == $user->id && $friend->usera == Auth::user()->id ) <!-- checking for friendship if found shows unfriend button just reversing the positions  -->
                        <div class="panel-body">
                            <form method="POST" action="/friend/{{$user->id}}">          
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input type='hidden' name="delid" value="{{$friend->id}}">
                                <input type='hidden' name="id" value="{{Auth::user()->id}}">
                                <input type='hidden' name="friendid" value="{{$user->id}}">
                                <input type="submit" value="Unfriend" class="btn btn-default">
                            </form>
                        </div>

                    @else
                         <?php $notfriend = $notfriend + 1 ; ?>        <!-- if loops through and finds your not friends adds one  -->
                    @endif 
        @endforeach

        @if (Auth::guest())  <!--  if guest as guests cant add friends  -->
                                    
        @else
            @if (Auth::user()->id == $user->id)  <!-- if your viewing you own profile So cant friend yourself -->
                
            @else
                @if ($notfriend = 0)                  <!-- if 0 your not friends so shows add friend -->
                    <div class="panel-body">
                        <form method="POST" action="/friend">          
                            {{csrf_field()}}
                            <input type='hidden' name="id" value="{{Auth::user()->id}}">
                            <input type='hidden' name="friendid" value="{{$user->id}}">
                            <input type="submit" value="Add Friend" class="btn btn-default">
                        </form>
                    </div>
                @endif
            @endif
        @endif
    @else                            <!-- if nothing was in the friends array then shows add friend  -->
        @if (Auth::guest())  <!--  if guest as guests cant add friends  -->
                                    
        @else
            @if (Auth::user()->id == $user->id)  <!-- if your viewing you own profile So cant friend yourself -->
            
            @else
                <div class="panel-body">
                    <form method="POST" action="/friend">          
                        {{csrf_field()}}
                        <input type='hidden' name="id" value="{{Auth::user()->id}}">
                        <input type='hidden' name="friendid" value="{{$user->id}}">
                        <input type="submit" value="Add Friend" class="btn btn-default">
                    </form>
                </div>
            @endif
        @endif
    @endif
@endif
@endsection

@section('content')

@if (Auth::guest()) 
    Post's only viewable to logged in user's and friends.
@else
<!-- Check for Friends if friend Show Posts if not Do not show posts -->

    @if (Auth::user()->id == $user->id)
                
        @if($posts)
                                                             <!-- Loops through posts  --> 
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
                        @if (Auth::guest())
                            <a href="{{url("/post/$post->id")}}" class="btn btn-default">See Comments</a>
                        @else     
                            @if (Auth::user()->id == $user->id)
                                <form method="POST" action="/post/{{$post->id}}">           <!-- if it your post can delete or update --> 
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <a href="{{url("/post/$user->id")}}" class="btn btn-default">See Comments</a>
                                    <a href="{{url("/post/$user->id/edit")}}" class="btn btn-default">Update Post</a>
                                    <input type="submit" value="Delete" class="btn btn-default">
                                </form>
                            @else 
                                <a href="{{url("/post/$post->id")}}" class="btn btn-default">See Comments</a>
                            @endif 
                        @endif    
                    </div>
                </div>
            @endforeach
        @endif          
    @elseif (Auth::guest()) 
        No Posts Found..      
    @else
    
        @if($friends)                         <!--  loop  through friends   -->
            <?php $notfriend = 0 ; ?>        <!-- A varible I used to help prevent an add friend button up showing when users had multiple friends  -->
            @foreach($friends as $friend)
                @if ($friend->usera == $user->id && $friend->userb == Auth::user()->id )  <!-- checking for friendship -->
                
                    @if($posts)
                                                             <!-- Loops through posts  --> 
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
                                    @if (Auth::guest())
                                        <a href="{{url("/post/$post->id")}}" class="btn btn-default">See Comments</a>
                                    @else     
                                        @if (Auth::user()->id == $user->id)
                                          
                                            <form method="POST" action="/post/{{$post->id}}">           <!-- if it your post can delete or update --> 
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <a href="{{url("/post/$user->id")}}" class="btn btn-default">See Comments</a>
                                                <a href="{{url("/post/$user->id/edit")}}" class="btn btn-default">Update Post</a>
                                                <input type="submit" value="Delete" class="btn btn-default">
                                            </form>
                                        @else 
                                            <a href="{{url("/post/$post->id")}}" class="btn btn-default">See Comments</a>
                                        @endif 
                                    @endif    
                                </div>
                            </div>
                        @endforeach
                    @endif
                @elseif (Auth::guest()) 
                    No Posts Found..
                @else (Auth::guest()) 
                    No Posts Found.    
                @endif 
            @endforeach
            @else
                Only Friends can view each others post lists.
        @endif 
    @endif
@endif
    <div class="panel-footer">
        <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 
    </div>
</div>
@endsection