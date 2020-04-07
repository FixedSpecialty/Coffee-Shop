<?php
include('Dao.php');
  session_start();

 // probably check in a database using "userExists($username, $password)" or something
 // BUT... i'll just hardcode it for now...


  $email = "andremurphy98@outlook.com";
  $password = "tempPASS";

  if ($email == $_POST['email'] && $password == $_POST['password']) {
    $_SESSION['auth'] = true;
    header("Location: profile.php");
    exit;
  } else {
    $_SESSION['auth'] = false;
    $_SESSION['message'] = "Invalid email or password";
    header("Location: login.php");
  }