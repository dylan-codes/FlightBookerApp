<?php

//Start session so that userID variables are available.
session_start();

//If uID is avalilable, and the "bookNow_submit" button has been clicked continue.
if (isset($_SESSION['uID'])) {
  if (isset($_POST['bookNow_submit'])) {

    //Connection to our Database.
    require 'dbHandler.php';

    //setting variables = to Form data
    $userID = $_SESSION['uID'];
    $departureCity = $_POST['departID'];
    $destination = $_POST['destinationID'];
    $date = $_POST['dateID'];


      //Check if destination is already booked
      $sql = "SELECT destination FROM bookings WHERE destination=?";
      $statement = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../homePage.php?error=sqlError");
        exit();
      }
      else {

        //bind variable destination to statement, execute, and store the data
        mysqli_stmt_bind_param($statement, "s", $destination);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $resultCheck = mysqli_stmt_num_rows($statement);

        //If there is a result from the destination query, return "ALREADY BOOKED"
        if ($resultCheck > 0) {
          header("Location: ../homePage.php?error=alreadyBooked");
          exit();
        }

        //new Insertion SQL query
        else {

        $sql = "INSERT INTO bookings (userID, departureCity, destination, departureDate) VALUES (?, ?, ?, ?)";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)) {
          header("Location: ../homePage.php?error=sqlError");
          exit();
        }

        //bind variable data to the statement and execute it's insertion to the DB.
          else {
            mysqli_stmt_bind_param($statement, "ssss", $userID, $departureCity, $destination, $date);
            mysqli_stmt_execute($statement);
            header("Location: ../homePage.php?booking=success");
            exit();
      }
    }
  }
}
}
