<?php
include('Dao.php');
  session_start();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $pdo = $Dao->getConnection();
  function emailExists($pdo, $email) {
    $stmt = $pdo->prepare("SELECT 1 FROM users WHERE email=?");
    $stmt->execute([$email]); 
    return $stmt->fetchColumn();
  }

if (emailExists($pdo, $email)) {
    // found
}


  $email = "andremurphy98@outlook.com";
  $password = "tempPASS";

  if ($email == $_POST['email'] && $password == $_POST['password']) {
    $_SESSION['auth'] = true;
    header("Location: http://localhost/cs401/CS401/profile.php");
    exit;
  } else {
    $_SESSION['auth'] = false;
    $_SESSION['message'] = "Invalid email or password";
    header("Location: http://localhost/cs401/CS401/login.php");
  }