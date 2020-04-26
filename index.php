<?php
  session_start();
?>

<!-- This is the variation of the homepage shown when the user is NOT logged in. -->
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
          <!-- If user is logged in, show "My Page" -->
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
    <section class="statusmsg">
      <!-- If the user is logged in (the session is started) a Logged In msg will show -->
      <!-- If not a Logged Out msg will appear. -->
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
      <h1>Where will our flights take you? You're just one click away!</h1>
      <h2>Please Log In To See Our Exclusive Deals.
    </div>
  </body>
</html>
