<?php
include('Dao.php');
  session_start();
  $logger = new KLogger('log.txt', KLogger::DEBUG);
  $stockerr = array();
  $Dao = new Dao();

  $first = $_POST['first'];
  if(!preg_match('/^[a-zA-Z\s]*$/',$first)) {
    $stockerr[] = "Error, letters only in the name";
  }

  $last = $_POST['last'];
  if(!preg_match('/^[a-zA-Z\s]*$/',$last)) {
    $stockerr[] = "Error, letters only in the name";
  }

  $email = $_POST['email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stockerr[] = "Invalid email format";
  }

  $password = $_POST['password'];
  $connection = $Dao->getConnection();
  function emailExists($connection, $email) {
    $stmt = $connection->prepare("SELECT 1 FROM members WHERE email=?");
    $stmt->execute([$email]); 
    return $stmt->fetchColumn();
  }
  if (emailExists($connection, $email)) {
    $stockerr[] = "email exists";
    $logger->LogInfo("checking email[{$email}]");
  }
    if (0 < count($stockerr)) {
      $_SESSION['errors'] = $stockerr;
      header("Location: register.php");
      exit;
    }
    $Dao->saveUser(htmlspecialchars($_POST['first']),htmlspecialchars($_POST['last']),$_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT));
    $logger->LogInfo("creating a user[{$_POST['first']},{$_POST['last']},{$_POST['email']},{$_POST['password']}]");
    header("Location: login.php");
    exit;

 

  // if ($email == $_POST['email'] && $password == $_POST['password']) {
  //   $_SESSION['auth'] = true;
  //   header("Location: http://localhost/cs401/CS401/profile.php");
  //   exit;
  // } else {
  //   $_SESSION['auth'] = false;
  //   $_SESSION['message'] = "Invalid email or password";
  //   header("Location: http://localhost/cs401/CS401/login.php");
  // }