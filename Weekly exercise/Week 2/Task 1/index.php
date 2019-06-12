<?php
  $posts = array();
  $posts[0] = array(
    'title' => 'A Most Unusual Paragraph',
    'date' => '7:27 Pm 9/07/2017',
    'post' => 'This is a most unusual paragraph. How quickly can you find out what is so unusual about it? It looks so ordinary you’d think nothing was wrong with it – and in fact, nothing is wrong with it. It is unusual though. Why? Study it, think about it, and you may find out. Try to do it without coaching. If you work at it for a bit it will dawn on you. So jump to it and try your skill at figuring it out. Good luck – don’t blow your cool!',
    'avatar'=> 'panda.jpg');
  $posts[1] = array(
    'title' => "Just doesn't add up",
    'date' => '7:18 Pm 9/07/2017',
    'post' => 'Pythagoras once fell off a ladder<br>
              And landed on a venomous adder<br>
              This adder couldnt add<br>
              Calculus made it sad<br>
              Algebra and theorems made it madder.<br>',
    'avatar'=> 'panda.jpg');
  $posts[2] = array(
    'title' => 'First Post',
    'date' => '5:08 Pm 9/07/2017',
    'post' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis convallis velit. Sed dignissim velit non tempor posuere. Quisque eleifend enim blandit, porta libero vel, ullamcorper tortor. Vestibulum mollis est in ipsum tristique varius. Morbi eleifend quam eu leo convallis, ut ultricies tellus lacinia. Curabitur quis auctor arcu. Donec quis tellus justo. Nulla sem elit, faucibus ac porta pellentesque, convallis nec diam. Duis iaculis at erat id pellentesque. Fusce efficitur dui elit, in mattis lectus pharetra eu. Nullam eget lacinia justo. Proin auctor nec orci nec tempor. Sed condimentum nisl at ante luctus volutpat.',
    'avatar'=> 'panda.jpg');
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
          <div class="panel-heading"><?= $apost['title'] ?></div>
            <div class="panel-body">
              <img src="<?= $apost['avatar'] ?>"> <?= $apost['date'] ?>
            </div>
            <div class="panel-body">
              <?= $apost['post'] ?>
            </div>
          </div>
        <?php  }  ?>      
        </div>
      </div>
    </div>
  </div>
  

</body>
</html>
