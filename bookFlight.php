<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>SkyF-AIR | Book Flight</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.html"><img src="images/logo.jpg" alt="JustFly"/></a>
    </div>
 <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">HOME</a></li>
        <li><a href="viewFlights.php">FLIGHTS</a></li>
		
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
<h1>Book Flight </h1>
<div class="row">
			
			<br />
      <br />
      
      <!-- Reteriving information about the Passenger  -->
      <h3>Traveller Information: </h3>
      
      <!-- form's action set to passenger.php to store it in the phpmyadmin database  -->
			<form action="passenger.php" method="post" class="form" role="form">  
			   
				<label for = "firstname">Name: </label>
				<div  class = "form-inline">
					<input class="form-control" name="firstname" id = "firstname" placeholder="First Name" type="text" required autofocus />
                    <input class="form-control" name="lastname" id = "lastname" placeholder="Last Name" type="text" required />
				</div>
			<br/>
			<div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" > 
					<label for = "lastname">Date of Birth: </label><input class="form-control" name="dob" id = "dob" placeholder="Date of Birth" type="date" size = "10" required />
					<br />
					<select name="category" class="form-control" placeholder="Category">
						<option value="Economy">Economy</option>
						<option value="First Class">First Class</option>
						<option value="Business Economy">Business Economy</option>
						<option value="Business Class">Business Class</option>
					</select>
					<label for = "guests">Number of Passengers travelling with you: </label><input class="form-control" name="guests" id = "guests" placeholder="Number of co-passengers" type="text" size = "10" required />
			        <br />
					<button class="btn btn-lg btn-primary btn-block" type="submit">Book</button> 
			</div>
			</form>
		</div>   



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; SkyF-AIR. All Rights Reserved </p>
</footer>

</body>
</html>


