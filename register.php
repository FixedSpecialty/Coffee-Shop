
<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="register.css">
</head>
<?php
require_once('header.php');
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="register.css">
  </head>
  <body>
  <div class = "login-page">
  <div class = "form">
  <?php
    if (isset($_SESSION['errors'])) {
      foreach ($_SESSION['errors'] as $error) {
         echo "<div id='error'>{$error}</div>";
      }
      unset($_SESSION['error']);
    }
    ?>

    <form class = "login-form" action="register_handler.php" method="post">
    <input type="text" placeholder="first" id="first" name="first" />
    <input type="text" placeholder="last"  id="last" name="last" />
    <input type="text" placeholder="email"  id="email" name="email" />
    <input type="password" placeholder="password"  id="password" name="password" />
    <input type="submit"/>
    <p class = "message"> Already have an account? <a href="login.php">Sign in</a></p>
  </form>
  </div>
  </div>
	<?php
  include_once("footer.php")
?>
  </body>

</html>