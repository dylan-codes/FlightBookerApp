<!DOCTYPE html>

<!-- This is the signup page -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dodo Airlines Sign-up!</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <img class= "logo" src="images/dodologo.png" alt="dodologo">
      <nav>
        <ul class="nav_links">
          <li><a href="index.php">Home</a></li>
          <?php   if (isset($_SESSION['uID'])) {

            echo '<li><a href="myPage.php">My Page</a></li>';
          }
            ?>
          <li><a class="login">
            <!-- Check if the user is logged in, if so display LOGOUT, if not display LOGIN form -->
            <?php
              if (isset($_SESSION['uID'])) {
                echo '<form action="phpDocs/logout.php" method="post">
                      <button type="submit" name="logout-submit">Logout</button>
                      </form>';
              }
              else {
                echo '<form action="phpDocs/login.php" method="post">
                      <label for="username">Username/E-mail:</label><br>
                      <input type="text" name="mailuserID"><br>
                      <label for="password">Password:</label><br>
                      <input type="password" name="passID"<br><br><br>
                      <button type="submit" name="login-submit">Login</button>
                      </form>
                     <p>Don\'t have an account? Sign up <a href=signup.php>here!</a></p>';
              }
           ?>
         </a></li>
        </ul>
      </nav>
    </header>
    <hr><br>

    <div>
      <br><br><h1>Sign Up!</h1><br><br>
      <!-- Error Hanlders -->
      <!-- Check if fields = empty, user = taken, email = invalid, etc. -->
      <!-- If the error passes it will be displayed to the user.  -->
      <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo '<p class="signuperror">It seems you\'ve left some fields empty!</p></br>';
          }
          else if ($_GET['error'] == "invalidUserMailID") {
            echo '<p class="signuperror">Invalid Username/Email!</p><br>';
          }
          else if ($_GET['error'] == "invalidmail") {
            echo '<p class="signuperror">Invalid E-mail!</p><br>';
          }
          else if ($_GET['error'] == "passwordcheck") {
            echo '<p class="signuperror">Your passwords do not match!</p><br>';
          }
          else if ($_GET['error'] == "usertaken") {
            echo '<p class="signuperror">The Username has already been taken!</p><br>';
          }
        }
        if (isset($_GET['signup'])) {
          if ($_GET['signup'] == "success") {
            echo '<p class="signupsuccess">You have successfully signed up!</p><br>';
          }
        }
      ?>

      <!-- Form input will be sent to the PHP handler "signupAction.php" -->
      <form action="phpDocs/signupAction.php" method="post">
        <label for="firstName">First Name:</label><br>
        <input type="text" name="firstName"><br><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" name="lastName"<br><br><br>
        <label for="email">Email:</label><br>
        <input type="text" name="mail"<br><br><br>
        <label for="billingAddress">Billing Address:</label><br>
        <input type="text" name="billID"><br><br>
        <label for="username">Username:</label><br>
        <input type="text" name="userID"> <br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="passID" <br><br><br>
        <input type="password" name="passIDcheck" placeholder="Repeat Password"<br><br><br>
        <button type="submit" name="signup-submit">Sign up</button>
      </form>
    </div>
  </body>
</html>
