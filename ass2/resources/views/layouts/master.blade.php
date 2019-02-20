
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social Panda</title>

  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css">
    
</head>
<body>


 
<!-- Navbar -->
  <div class="bs-component">
    <nav class="navbar navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href= "http://web-app-dev-paulfirth.c9users.io/ass2/public/">Social Panda</a>
        </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="/ass2/public/doc">Documentation</a></li>
            
            @if (Auth::guest())
              <li><a href="{{ route('login') }}">Profile</a></li>
             @else
              <li><a href="/user/{{ Auth::user()->id }}">Profile</a></li>     <!-- links to logged in users profile -->
             @endif
          
          <!-- Authentication Links -->
                        
                        @if (Auth::guest())                                     <!-- Cheacks if user is a guest and gives coresponging option to login or register -->
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="/ass2/user/create">Register</a></a></li>    <!-- Was using {{route('register')}} but wouldnt function correctly  --> 
                        @else
                            <li><a href="/user/{{ Auth::user()->id }}"> {{ Auth::user()->name }}</a></li>
                            
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>  <!-- logout  --> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}</form></li>
                        @endif
            </ul>            
        <form class="navbar-form navbar-right" role="search" method="POST" action="/search">  <!-- User search bar  --> 
          {{csrf_field()}}
          <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search User's">
          </div>                                                     
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
      </div>
    </nav>
  </div>

<!-- Posts Sections -->
  <div class="col-lg-3">
    <div class="bs-component">
      <div class="well well-sm">
        @yield('makepost')
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="bs-component">
      <div class="well well-lg">
        <H3>Pandamonium</H3>
            @yield('content')
      </div>
    </div>
  </div>

</body>
</html>
