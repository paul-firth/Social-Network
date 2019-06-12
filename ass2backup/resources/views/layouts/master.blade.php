
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
            <a class="navbar-brand" href= "http://web-app-dev-paulfirth.c9users.io/">Social Panda</a>
        </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="/doc">Documentation</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Friends</a></li>
            <li><a href="#">Login</a></a></li>
            <li><a href="/user/create">Register</a></a></li>
          </ul>         
        <form class="navbar-form navbar-right" role="search" method="POST" action="/search">
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
