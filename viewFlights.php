<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>JustFly - The easiest way to fly</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
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
       <a class="navbar-brand" href="home.html"><img id="logo" src="images/logo.jpg" alt="JustFly"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">HOME</a></li>
        <li><a href="viewFlights.php">FLIGHTS</a></li>
		    </ul>
    </div>
  </div>
</nav>

<!--Select Flights-->
<div class="jumbotron text-center">
<form action="viewFlights.php">
<div class="container">


  <h1>SkyF-AIR </h1>
  <p>Where would you like to fly??</p>
  <label class="radio-inline">
      <input type="radio" name="optradio" value="roundtrip">Round Trip
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="oneway">One way
    </label>
</div>
  <br>
<div class="form-inline" >
  <select name="Guests" class="form-control"  placeholder="Guests" required>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>

 </select>

   <select name="From" class="form-control" placeholder="From" required>
   <option value="Bangalore">Bangalore</option>
    <option value="Chennai">Chennai</option>
    <option value="Delhi">Delhi</option>
    <option value="Kolkata">Kolkata</option>
  	<option value="Mumbai">Mumbai</option>
  </select>
   <select name="To" class="form-control"  placeholder="To" required>

   <option value="Delhi">Delhi</option>
   <option value="Bangalore">Bangalore</option>
    <option value="Chennai">Chennai</option>
    <option value="Kolkata">Kolkata</option>
	  <option value="Mumbai">Mumbai</option>

  </select>
  <button type="submit" class="btn btn-danger">Search Flights</button>
</div>
</form>
<?php
	$fromAirport = $_GET['From'];
	$toAirport = $_GET['To'];
	echo("<h3>Showing flights from ".$fromAirport." to ".$toAirport."</h3>");

  ?>
</div>
<!-- Display filghts -->
<div id="services" class="container-fluid text-center">
 <?php
	$fromAirport = $_GET['From'];
	$toAirport = $_GET['To'];
  $link = mysqli_connect('localhost', 'root', '', 'flightsearch');
  $count = 1;

  // Assigning the city ID from the acquired City name
  if($fromAirport == 'Bangalore')
    $f_airport = 1;
  elseif($fromAirport == 'Mumbai')
    $f_airport = 2;
  elseif($fromAirport == 'Delhi')
    $f_airport = 3;
  elseif($fromAirport == 'Chennai')
    $f_airport = 4;
  elseif($fromAirport == 'Kolkata')
   $f_airport = 5;


   if($toAirport == 'Bangalore')
   $t_airport = 1;
 elseif($toAirport == 'Mumbai')
   $t_airport = 2;
 elseif($toAirport == 'Delhi')
   $t_airport = 3;
 elseif($toAirport == 'Chennai')
   $t_airport = 4;
 elseif($toAirport == 'Kolkata')
   $t_airport = 5;

	//retrieve flights through sql query

 $sql = "SELECT ID, flight_name, departure_date, departure_time, dest_arr_time, total_duration, price FROM flights WHERE to_arpt = '".$t_airport."' AND from_arpt = '".$f_airport."';";


  $result = mysqli_query($link,$sql);

  //displaying the result
	if (mysqli_num_rows($result)>0)
	{
		
		echo("<table id='onwardFlight' class='table table-hover' name='onwardflight' data-toggle='table' data-pagination='true' data-search='true'  data-fixed-columns='true'
       data-fixed-number='2'>");
		echo("<thead><th style=\"display: none;\">Sr. No.</th><th>Flight Number</th><th data-sortable='true'>Flight Name</th><th data-sortable='true'>Departure Date</th><th data-sortable='true'>Departure Time<th>Arrival Time</th><th>Total Duration</th><th>Fare</th></thead><tbody>");
    while(($row = mysqli_fetch_row($result))!=null)
    {

        echo("<tr><td id='InstanceId' style=\"display: none;\">".$count."</td><td>".$row[0]."</td><td>"
      . $row[1]. "</td><td>" .$row[2]. "</td><td>" .$row[3]. "</td><td>" .$row[4]. "</td><td>".$row[5]." minutes</td><td>Rs. ".$row[6]."</td></tr>");
       $count++; 
    }
		echo("</tbody></table>");
	}
	else
	{
		echo("We are sorry! We do not have any onward flights for this route.");
	}
  ?>
  <button id="bookFlights">Book Flight</button>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; SkyF-AIR. All Rights Reserved </p>
</footer>
<script>
$(document).ready(function(){
var onwardInstnceId = null;
var returnInstanceId = null;
$('#bookFlights').hide();
$('#onwardFlight').on('click-row.bs.table', function(e, row, $element){$('#onwardFlight').find('tbody tr.active').removeClass('active'); $element.addClass('active'); onwardInstanceId = $element.find('#InstanceId').html(); $('#bookFlights').show();});



//Functionality of book tickets button
$('#bookFlights').click(function post(path, parameters) {
    var form = $('<form></form>');

    form.attr("method", "post");
    form.attr("action", "bookFlight.php");
        var field1 = $('<input></input>');
		var field2 = $('<input></input>');

        field1.attr("type", "text");
        field1.attr("name", "OnwardInstanceID");
        field1.attr("value", onwardInstanceId);

		field2.attr("type", "text");
        field2.attr("name", "ReturnInstanceID");
        field2.attr("value", returnInstanceId);

        form.append(field1);
		form.append(field2);


    // The form needs to be a part of the document in
    // order for us to be able to submit it.
    $(document.body).append(form);
    form.submit();
});
});
</script>

</body>
</html>