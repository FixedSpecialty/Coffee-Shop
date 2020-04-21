<?php
include('Dao.php');
  session_start();
  $Dao = new Dao();
  $email = $_POST['email'];
  $password = $_POST['password'];
  $connection = $Dao->getConnection();

$stmt = $connection->prepare("SELECT * FROM members WHERE email = ?");
$stmt->execute([$_POST['email']]);
$user = $stmt->fetch();
  if ($user && password_verify($_POST['password'], $user['password']))
  {
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $user['id'];
    header("Location: Profile.php");
    exit;
  } else {
    $_SESSION['message'] = "Invalid email or password";
    header("Location: login.php");
  }
  

 

  // if ($email == $_POST['email'] && $password == $_POST['password']) {
  //   $_SESSION['auth'] = true;
  //   header("Location: http://localhost/cs401/CS401/profile.php");
  //   exit;
  // } else {
  //   $_SESSION['auth'] = false;
  //   $_SESSION['message'] = "Invalid email or password";
  //   header("Location: http://localhost/cs401/CS401/login.php");
  // }