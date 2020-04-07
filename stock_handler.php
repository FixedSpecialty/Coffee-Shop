<?php
session_start();
include('Dao.php');
 

  $errors = array();
  $Dao = new Dao();
  $connection = $Dao->getConnection();

  // validate
  $origin = $_POST['origin'];
  if(!ctype_alpha($origin)) {
    $errors[] = "Error, alpha characters only in the origin";
  }

  if (strlen($_POST['origin']) > 70) {
    $errors[] = "Error, origin can only be 70 characters long";
  }

  if (strlen($_POST['origin']) ==  0) {
    $errors[] = "Error, please enter an origin";
  }

  if (strlen($_POST['varietal']) > 20) {
    $errors[] = "Error, varietal can only be 20 characters long";
  }

  if (strlen($_POST['varietal']) ==  0) {
    $errors[] = "Error, please enter an varietal";
  }

  $roaster = $_POST['roaster'];
  if(!ctype_alpha($roaster)) {
    $errors[] = "Error, alpha characters only in the roaster";
  }

  if (strlen($_POST['roaster']) > 80) {
    $errors[] = "Error, roaster can only be 80 characters long";
  }

  if (strlen($_POST['roaster']) ==  0) {
    $errors[] = "Error, please enter an roaster";
  }

  if (strlen($_POST['elevation']) > 256) {
    $errors[] = "Error, elevation can only be 256 characters long";
  }

  if (strlen($_POST['elevation']) ==  0) {
    $errors[] = "Error, please enter an elevation";
  }

  if (strlen($_POST['notes']) > 256) {
    $errors[] = "Error, notes can only be 256 characters long";
  }

  if (strlen($_POST['notes']) ==  0) {
    $errors[] = "Error, please enter an notes";
  }

  if (strlen($_POST['stock']) > 256) {
    $errors[] = "Error, stock can only be 256 characters long";
  }

  if (strlen($_POST['stock']) ==  0) {
    $errors[] = "Error, please enter an stock";
  }

  if (0 < count($errors)) {
    $_SESSION['form'] = $_POST;
    $_SESSION['errors'] = $errors;
    header("Location: http://localhost/cs401/CS401/stock.php");
    exit;
  }

  $Dao->saveStock(htmlspecialchars($_POST['origin']),htmlspecialchars($_POST['varietal']),htmlspecialchars($_POST['roaster']),htmlspecialchars($_POST['elevation']),htmlspecialchars($_POST['notes']),htmlspecialchars($_POST['stock']));
  $logger = new KLogger('log.txt', KLogger::DEBUG);
  $logger->LogInfo("inserting a stock[{$_POST['origin']},{$_POST['varietal']},{$_POST['roaster']},{$_POST['elevation']},{$_POST['notes']},{$_POST['stock']}]");
  header("Location: http://localhost/cs401/CS401/stock.php");
  exit;