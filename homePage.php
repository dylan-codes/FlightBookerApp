<?php
  session_start();
?>

<!-- This is the variation of the homepage shown when the user IS logged in. -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dodo Airways! Cheap Flights for All!</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jquery.js"></script>
  </head>
  <body>
    <header>
      <img class= "logo" src="images/dodologo.png" alt="dodologo">
      <nav>
        <ul class="nav_links">
          <li><a href="#">Home</a></li>
          <?php   if (isset($_SESSION['uID'])) {

            echo '<li><a href="myPage.php">My Page</a></li>';
          }
            ?>
          <li><a class="login">
            <!-- If the user is logged in (the session is started) a Logged In msg will show -->
            <!-- If not a Logged Out msg will appear. -->
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
    <section class="statusmsg">
      <!-- Check if the user is logged in, if so display LOGOUT, if not display LOGIN form -->
        <?php
          if (isset($_SESSION['uID'])) {
            echo '<p class="login-status"><i>You are Logged in!</i></p>';
          }
          else {
            echo '<p class="login-status"><i>You are Logged out!</i></p>';
          }
        ?>
    </section>
    <div class="banner">
      <a><img src="images/flightbanner.jpg" alt="banner" width="1200" height="700"></a>
    </div>
    <div id="headliner">
      <h1>Where will our flights take you? You're just one click away.</h1>
    </div>
    <div id="wrapper">
      <!-- Inside of the wrapper we include the Travel Cards -->
      <div class="travelCard">
        <a class="pic"><img src="images/parisfrance.jpg" alt="parisfrance" width="470" height="323">
          <div class="container">
            <h3>Summer Deal!</h3>
            <p>Departing City: Jacksonville, FL</p>
            <p>Destination: Paris, France</p>
            <p>Departure Date: July 10, 2020</p><br>
            <!-- Each travelCard contains a form -->
            <!-- These forms include invisible input data that is executed by the submit button -->
            <form action="phpDocs/booknowAction.php" method="post">
              <input type="hidden" name="departID" value="Jacksonville, FL">
              <input type="hidden" name="destinationID" value="Paris, France">
              <input type="hidden" name="dateID" value="July 10, 2020">
              <button type="submit" name="bookNow_submit">Book A Trip to Paris!</button>
            </form>
          </div>
      </div>
      <div class="travelCard">
        <a class="pic"><img src="images/tokyo.jpg" alt="tokyo" width="470" height="323">
          <div class="container">
            <h3>Summer Deal!</h3>
            <p>Departing City: Atlanta, GA</p>
            <p>Destination: Tokyo, Japan</p>
            <p>Departure Date: May 13, 2020</p><br>
            <form action="phpDocs/booknowAction.php" method="post">
              <input type="hidden" name="departID" value="Atlanta, GA">
              <input type="hidden" name="destinationID" value="Tokyo, Japan">
              <input type="hidden" name="dateID" value="May 13, 2020">
              <button type="submit" name="bookNow_submit">Book A Trip to Tokyo!</button>
            </form>
          </div>
      </div>
      <div class="travelCard">
        <a class="pic"><img src="images/vancouver.jpg" alt="vancouver" width="470" height="323">
          <div class="container">
            <h3>Summer Deal!</h3>
            <p>Departing City: Atlanta, GA</p>
            <p>Destination: Vancouver, Canada</p>
            <p>Departure Date: April 30, 2020</p><br>
            <form action="phpDocs/booknowAction.php" method="post">
              <input type="hidden" name="departID" value="Atlanta, GA">
              <input type="hidden" name="destinationID" value="Vancouver, Canada">
              <input type="hidden" name="dateID" value="April 30, 2020">
              <button type="submit" name="bookNow_submit">Book A Trip to Vancouver!</button>
            </form>
          </div>
      </div>
      <div class="travelCard">
        <a class="pic"><img src="images/reykjavik.jpg" alt="reykjavik" width="470" height="323">
          <div class="container">
            <h3>Summer Deal!</h3>
            <p>Departing City: Orlando, FL</p>
            <p>Destination: Reykjavik, Iceland</p>
            <p>Departure Date: June 5, 2020</p><br>
            <form action="phpDocs/booknowAction.php" method="post">
              <input type="hidden" name="departID" value="Orlando, FL">
              <input type="hidden" name="destinationID" value="Reykjavik, Iceland">
              <input type="hidden" name="dateID" value="June 5, 2020">
              <button type="submit" name="bookNow_submit">Book A Trip to Reykjavik!</button>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>
