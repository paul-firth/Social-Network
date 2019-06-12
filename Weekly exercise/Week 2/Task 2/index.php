<?php
  use wp\PostSeeder;
  include 'classes/postSeeder.php';
  $posts = postSeeder::seed();
  $posts[0]-> addComment('Bob', 'Totally makes sense');
  $posts[0]-> addComment('Dave', 'It most certianly does not.');
  $posts[1]-> addComment('James', 'A boring Post.');
  $posts[1]-> addComment('Dave', 'I agree.');
  $posts[2]-> addComment('Dave', 'This one needs a comment too.');
  
 // var_dump($posts[1]);
 // exit;
?>

<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social Network</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link href="style.css" rel="stylesheet">
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
            <a class="navbar-brand" href="#">Social Network</a>
        </div>
      
          <ul class="nav navbar-nav navbar-right">
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
        <form class="form-horizontal">
                <fieldset>
                  <legend><br>Make Post</legend>
                  <div class="form-group">
                    <label for="inputTitl" class="col-lg-2 control-label">Title:</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputTitle" placeholder="Title">
                    </div>
                    <label for="inputPosr" class="col-lg-2 control-label">Post:</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputPost" placeholder="Post">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="reset" class="btn btn-default">Clear</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
        </form>
      </div>
    </div>
  </div>
  
  
  
  <div class="col-lg-9">
    <div class="bs-component">
      <div class="well well-lg">
        <H3>Paul Firth</H3>
        <?php foreach ($posts as $apost) { ?>
        <div class="panel panel-default">
          <div class="panel-heading"> <?= $apost->getUser() ?> </div>
            <div class="panel-body">
              <img src="<?= $apost->getAvatar() ?>" <?= $apost->getTime() ?> </div>
            </div>
            <div class="panel-body">
              <?= $apost->getMessage() ?>
            </div>
            <?php $comments = $apost->getComments(); ?>
            <?php foreach ($comments as $comment){ ?>
            <div class="panel-heading">
              <?= $comment['user'] ?>
            </div>
          <div class="panel-body">
              <?= $comment['comment'] ?>
          </div>
          <?php  }  ?>
        </div>
        <?php  }  ?>
      </div>
    </div>
  </div>

  

</body>
</html>
