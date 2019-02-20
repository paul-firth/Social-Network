  
                 
@extends('layouts.master')

@section('makepost')
            <div class="panel-heading"> 
                <img src="/ass2/public/panda.jpg">
                <br>

            </div>
@endsection

@section('content')
 <div class="panel panel-default">
            <div class="panel-heading"> 
                <h3>Documentation page</h3>
            </div>
            <div class="panel-body"> 
                <h3>ER Diagram for the database</h3>
                <img src="/ass2/public/erdiagram.png">
                <p>
                    The diagram above shows the relationship between the four table's that make up the database.
                    
                </p>
                </div>
                <div class="panel-heading"> 
                    <h3>Implementation</h3>
                </div>
                <div class="panel-body"> 
                    I was able to implement most functions outlined in the assignment critera.
                </div>
                <div class="panel-heading"> 
                    <h4>Things that I was unable to implement or used unusal methods of making things work. </h4>
                 </div>   
                 <div class="panel-body">
                    Using a single Eloquent query to display the posts on the main page. - I had a few difficulties getting my head around eloquent and
                    have as such only used it a few times. The query for the main page still use's the DB class. Various CRUD functions alternate on DB and eloquent
                    depending on how I was managing.
                    <br>
                    <br>
                    User Registration works fine but does not use the register view file provided or the RegisterController. Instead I built my own page 
                    and it uses the route through the UserController. The functionality remains and it still auto logins in when registering.
                    I did try to use the RegisterController and my code still remains in the file as well as the provided Register view but eveytime I tired to register
                    an account it would just reload the page where as I was able to build my own with the same functionality in UserController. The route to use the laravel provided 
                    routes is commented out on the master template navigation bar.
                    <br>
                    <br>
                    Date of birth showing up as current age in the User profile does not work.
                    <br>
                    <br>
                    Privacy settings are not implemented.
                    <br>
                    <br>
                    You can add and delete friends but there is no page to view a list of a users friends.
                    <br><br>
                    Everything else should be functioning.
                </div>
            </div>
            
            <div class="panel-footer">
                <a href="http://web-app-dev-paulfirth.c9users.io">Home</a> 

            </div>
        </div>
@endsection