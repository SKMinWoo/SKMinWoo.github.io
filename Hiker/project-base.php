<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css"> 
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><a href="project-base.php"><img src="Hiker_Text.svg" height=50px width=100px></a></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
			<a href="index.php?logout='1'" style="color: white;">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <a class="navbar-brand" href="#myPage"><a href="project-base.php"><img src="Hiker_Text.svg" height=200px width=300px></a></a>
  <p>Find your trail</p> 
</div>

<!-- Container (Forums Section) -->
<div id="forums" class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Forums</h2><br>
      <h4><strong>Hiking Trails:</strong> Reviews of trails sorted into 5 levels of difficulty</h4><br>
      <p><strong>Difficulty Levels:</strong><br>
	  Expert<br>
	  Advanced<br>
	  Intermediate<br>
	  Casual<br>
	  Beginner<br>
	  </p>
    </div>
  </div>
  <br><a href="Difficulty-Selection.php"><button class="btn btn-default btn-lg">Go to Forums</button></a>
</div>

<!-- Container (Merchandise Section) -->
<div id="merchandise" class="container-fluid">
  <div class="text-center">
    <h2>Merchandise</h2>
    <h4>Stickers, Shirts, Sweatshirts!</h4>
  </div>
  <div class="row">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Sticker Pack</h1>
        </div>
        <div class="panel-body">
          <p><strong>$10</strong></p>
          <p><strong>Per Pack</strong></p>
        </div>
        <form method='post' action="pay.php">
        <div class="panel-footer">
          <h3>$10</h3>
          <h4>5 Unique Stickers</h4>
          <button class="btn btn-lg" name="1">Buy Now</button>
        </div>
        </form>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>T-Shirt</h1>
        </div>
        <div class="panel-body">
          <p><strong>$20</strong> </p>
          <p><strong>Per Shirt</strong></p>
        </div>
        <form method='post' action="pay.php">
        <div class="panel-footer">
          <h3>$20</h3>
          <h4>Hiker T-Shirt</h4>
          <button class="btn btn-lg" name="2">Buy Now</button>
        </div>
        </form>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Sweat Shirt</h1>
        </div>
        <div class="panel-body">
          <p><strong>$40</strong></p>
          <p><strong>Per Sweat Shirt</strong></p>
        </div>
        <form method='post' action="pay.php">
        <div class="panel-footer">
          <h3>$40</h3>
          <h4>Hiker Sweat Shirt</h4>
          <button class="btn btn-lg" name="3">Buy Now</button>
        </div>
        </form>
      </div>      
    </div>    
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
