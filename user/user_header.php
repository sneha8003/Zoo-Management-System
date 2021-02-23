 <!-- scripts-->
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- link for fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- links css  -->
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>

<header class="header">
  <nav class="navbar navbar-static-top" role="navigation">
  <!-- logo of the zoo -->
   <a href="user_home.php" class="logo"><img src="../img/logo.jpg"></a>
  <!--  when the page is in responsive then the toggle bar appears -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
            <span class="icon-bar bg-black"></span>
            <span class="icon-bar bg-black"></span>
            <span class="icon-bar bg-black"></span>
    </button>
  <div id="nav" class="navbar-right collapse navbar-collapse menubar">
   <!--  menubar of the user page -->
    <ul class="nav navbar-nav">
      <!-- link for home page -->
      <li><a href="user_home.php">Home</a></li>
      <!-- link for visitors -->
      <li class="dropdown"><a href="#">Visitor<b class="caret"></b></a>
        <ul class="nav navbar-nav menu">
          <div class="row">
            <!-- dropdown menu of visitors menu -->
            <div class="col-md-4 column">
              <!-- link for map page -->
              <li><a href="map.php">Zoo Map</a></li>
             <!--  link for ticket page -->
              <li><a href="ticket.php">Ticket</a></li>
            </div>
          </div>
        </ul>
    </li>
        <!-- link for animals page -->
        <li><a href="display_animals.php">Animals</a></li>  
        <!-- link for register page -->
        <li><a href="register.php">Register</a></li>  
        <!-- link for login page -->
        <li><a href="login.php">Login</a></li>     
     </ul>
  </div>
</nav>       
</header>

<!-- carousel of the user page -->
<div class="container-fluid">
  <div class="col-md-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">   
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

    <div class="carousel-inner"> 
      <div class="item active">
        <!-- first image of carousel  -->
        <img src="../img/carousel1.jpg" alt="First">
      </div>

      <div class="item">
      <!-- second image of carousel -->
       <img src="../img/carousel2.jpg" alt="Second">
       </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <!-- left arrow icon which shows the previous image -->
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <!-- right arrow icon which shows the next image -->
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
 </div>
<br>
