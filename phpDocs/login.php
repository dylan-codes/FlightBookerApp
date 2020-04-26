<?php

//Check if the button has been clicked
if (isset($_POST['login-submit'])) {
  //Connection to Database.
  require 'dbHandler.php';

  //Create variables = to Form data
  $mailuid = $_POST['mailuserID'];
  $password = $_POST['passID'];

  //Error Checking (Empty Fields)
  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
      $sql = "SELECT * FROM useraccount WHERE username=? OR email=?;";
      $statement = mysqli_stmt_init($conn);

      //Check for sql error
      if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else {
        //Bind variables to statement
        mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        //Create array of result, use password_verify to rehash and check inputted password.
        if ($row = mysqli_fetch_assoc($result)) {
          $passCheck = password_verify($password, $row['pass']);

          //Error Check (is password invalid)
          if ($passCheck == false) {
            header("Location: ../index.php?error=wrongPass");
            exit();
          }

          //If the rehashed password == the DB password, Log the user in.
          else if ($passCheck == true) {
            session_start();
            $_SESSION['uID'] = $row['userID'];
            $_SESSION['user'] = $row['username'];
            header("Location: ../homePage.php?login=success");
            exit();
          }
          else {
            header("Location: ../index.php?error=wrongPass");
            exit();
          }
        }
        //If all fails, there is no user match.
        else {
          header("Location: ../index.php?error=noUserMatch");
          exit();
        }
      }
  }
}
else {
  header("Location: ../index.php");
  exit();
}
