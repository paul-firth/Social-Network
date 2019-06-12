<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social Panda</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<style>
    html, body {
        background-color: #272b30;
    }
</style>
                
</head>
<body>


 
<!-- Navbar -->
  <div class="bs-component">
    <nav class="navbar navbar-inverse">
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
            <li><a href="#">Photos</a></li>
            <li><a href="#">Friends</a></li>
            <li><a href="#">Login</a></a></li>
          </ul>
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
        <H3>Paul's Page</H3>
            @yield('content')
      </div>
    </div>
  </div>

</body>
</html>
