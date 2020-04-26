<?php

//Check if the "signup-submit" button has been clicked
if (isset($_POST['signup-submit'])) {
  //Connection to Database.
  require 'dbHandler.php';

  //assign variables = to form data.
  $username = $_POST['userID'];
  $password = $_POST['passID'];
  $passwordrepeat = $_POST['passIDcheck'];
  $billingAddress = $_POST['billID'];
  $email = $_POST['mail'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];


  //Error checking (empty fields, invalid email/username, passwordCheck fail, and SQL errors.)
  if (empty($username) || empty($password) || empty($passwordrepeat) || empty($billingAddress) ||
  empty($email)|| empty($firstName) || empty($lastName) ) {
    header("Location: ../signup.php?error=emptyfields&userID=".$username."&mail=".$email."&billID=".$billingAddress);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
    header("Location: ../signup.php?error=invalidUserMailID");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&userID=".$username."&billID=".$billingAddress);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidmail&mail=".$email."&billID=".$billingAddress);
    exit();
  }
  else if ($password !== $passwordrepeat) {
    header("Location: ../signup.php?error=passwordcheck&userID=".$username."&mail=".$email."&billID=".$billingAddress);
    exit();
  }

  else {
    //Check if username is taken
    $sql = "SELECT username FROM useraccount WHERE username=?";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
      header("Location: ../signup.php?error=sqlError");
      exit();
    }
    else {

      //bind variable username to statement, execute, and store the data
      mysqli_stmt_bind_param($statement, "s", $username);
      mysqli_stmt_execute($statement);
      mysqli_stmt_store_result($statement);
      $resultCheck = mysqli_stmt_num_rows($statement);

      //If there is a result from the username query, return "USER TAKEN"
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email."&billID=".$billingAddress);
        exit();
      }

      //Create SQL query
      else {
        $sql = "INSERT INTO useraccount (username, email, pass, billingAddress, firstName, lastName) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)) {
          header("Location: ../signup.php?error=sqlError");
          exit();
      }
      else {

        //Hash the password before inserting data.
        $hashPass = password_hash($password, PASSWORD_DEFAULT);

        //bind variables to statement and execute the insertion.
        mysqli_stmt_bind_param($statement, "ssssss", $username, $email, $hashPass, $billingAddress, $firstName, $lastName);
        mysqli_stmt_execute($statement);
        header("Location: ../signup.php?signup=success");
        exit();
      }
    }
  }
}
mysqli_stmt_close($statement);
mysqli_close($conn);

}
else{
  header("Location: ../signup.php");
  exit();
}
