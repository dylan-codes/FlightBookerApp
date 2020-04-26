<?php

require 'dbHandler.php';

//Accesses the Bookings table, queries the data, checks if there are any results,
//then prints the data included.

  $sql = "SELECT * FROM bookings WHERE userID='$_SESSION[uID]' ;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<p><strong>Destination:</strong> " .$row['destination'] ." <strong>Departure City:</strong> "
        .$row['departureCity'] ." <strong>Departure Date:</strong> ".$row['departureDate'] . "</p>";
      echo "<br>";
    }
  }
  else {
    echo "<p>You currently have no flights booked.</p>";
  }
