<?php
//By requiring this file on pages that use table manipulation I can connect to
//the DB without having to type/retype the same thing on each page.
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection Failed:".mysqli_connect_error());
}
