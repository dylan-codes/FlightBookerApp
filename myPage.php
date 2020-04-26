<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <img class= "logo" src="images/dodologo.png" alt="dodologo">
      <nav>
        <ul class="nav_links">
          <li><a href="homePage.php">Home</a></li>
          <li><a href="#">My Page</a></li>
          <li><a class="login">
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
    <div class="wrapper">
      <h1>Hello <u><?php echo"$_SESSION[user]";?></u>, here are your flights.</h1><br><br>
      <div class="bookings">
        <?php
        require 'phpDocs/display.php';
         ?>
      </div>
    </div>
  </body>
</html>
