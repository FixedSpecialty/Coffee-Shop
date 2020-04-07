<?php
  session_start();
  session_destroy();
  header("Location: http://localhost/cs401/CS401/login.php");
  exit;