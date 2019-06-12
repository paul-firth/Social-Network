  
                 
@extends('layouts.master')

@section('makepost')
            <div class="panel-heading"> 
                <img src="/panda.jpg">
                <br>

            </div>
@endsection

@section('content')
 <div class="panel panel-default">
            <div class="panel-heading"> 
                <h2>Documentation page for Paul Firth's Social network.</h2>
            </div>
            <div class="panel-body"> 
                <h3>ER Diagram for the database</h3>
                <img src="/erdiagram.png">
                <p>
                    The diagram above shows the relationship between the two table's that make up the database.
                    <br>
                    The first table named posts has 5 columns postid is the primary key which autoincrments. The remaining columns store the name, title, message and num of comments.
                    The second table named comments is linked to the posts table by its foreign key the colum named posts which is linked to the postid from posts. The primary key is commentid and the remaining columns store name and message.
                    <br>
                    The relationship is 1 to many with one post having many comments.
                </p>
                <h3>Implmentation</h3>
                <p>I was able to implement all function outlined in the assignment critera using Laraval and the DB Class.</p>
            </div>
            
            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 

            </div>
        </div>
@endsection