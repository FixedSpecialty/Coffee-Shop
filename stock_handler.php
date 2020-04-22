<?php
session_start();
include('Dao.php');
 

  $errors = array();
  $Dao = new Dao();
  $connection = $Dao->getConnection();

  // validate
  $origin = $_POST['origin'];
  if(!preg_match('/^[A-Za-z\s]{0,20}$/', $_POST['origin'])&& !strlen($_POST['origin']) ==  0) {
    $errors[] = "Error, letters only in the origin";
  }

  if (strlen($_POST['origin']) ==  0) {
    $errors[] = "Error, please enter an origin";
  }

  if(!preg_match('/^[A-Za-z0-9\s]{0,20}+$/', $_POST['varietal']) && !strlen($_POST['varietal']) ==  0) {
    $errors[] = "Error, letters and numbers only in the origin";
  }
  if (strlen($_POST['varietal']) > 20) {
    $errors[] = "Error, varietal can only be 20 characters long";
  }

  if (strlen($_POST['varietal']) ==  0) {
    $errors[] = "Error, please enter an varietal";
  }

  if(!preg_match('/^[A-Za-z0-9\s]{0,30}+$/', $_POST['roaster'])&& !strlen($_POST['roaster']) ==  0) {
    $errors[] = "Error, letters and numbers only for roaster";
  }

  if (strlen($_POST['roaster']) ==  0) {
    $errors[] = "Error, please enter an roaster";
  }

  if (!preg_match('/^[0-9\,\s]+[A-Za-z]{0,20}$/', $_POST['elevation'])&& !strlen($_POST['elevation']) ==  0)
{
  $errors[] = "Error, elevation cannot have special chars";
}
  if (strlen($_POST['elevation']) ==  0) {
    $errors[] = "Error, please enter an elevation";
  }

  if (!preg_match('/^[0-9A-Za-z\.\,\s]{0,256}$/', $_POST['notes']) && !strlen($_POST['notes']) ==  0)
{
  $errors[] = "Error, notes cannot have special chars";
}

  if (strlen($_POST['notes']) ==  0) {
    $errors[] = "Error, please enter an notes";
  }

  if (!preg_match('/^[0-9\,\s]+[A-Za-z]{0,20}$/', $_POST['stock'])&& !strlen($_POST['stock']) ==  0)
{
  $errors[] = "Error, stock cannot have special chars";
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