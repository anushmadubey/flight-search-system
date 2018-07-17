<?php
    //Establishing connection
    $con = mysqli_connect('localhost','root','','flightsearch');


    //checking for error in connection
    if(!con)
        echo('Not connected to server!');

    //getting the data from the bookFlight.php form
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $category = $_POST['category'];
    $guest = $_POST['guests'];

    //Inserting the data into database using the query
    $sql = "INSERT INTO passenger (firstname,lastname,dob,category,guest) VALUES ('$fname','$lname','$dob','$category','$guest');";
    $result = mysqli_query($con, $sql);

    //checking for null set
    if($result){
        echo("Booking Done!");
    }
    else{
        echo("Booking Unsuccessful.");
    }

    //redirecting the page
    header("Location: bookingSuccess.php");


?>