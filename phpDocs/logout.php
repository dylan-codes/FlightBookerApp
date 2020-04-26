<?php

//Logout handler, destroys the session that has been established.
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");

?>
