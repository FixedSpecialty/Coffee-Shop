<?php
  require_once 'Dao.php';
  $dao = new Dao();
  $logger = new KLogger('log.txt', KLogger::DEBUG);
  $logger->LogInfo("deleting stock with id [{$_GET['id']}]");
  $dao->deleteStock($_GET['id']);
  header("Location: stock.php");
  exit;