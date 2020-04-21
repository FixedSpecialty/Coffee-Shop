
<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="login.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="js/login.js"></script>
</head>
<?php
$login_page=1;
require_once('header.php');
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
  </head>
  <body>
    <div class = "login-page">
      <div class = "form">
    <?php
    if (isset($_SESSION['message'])) {
      echo "<div id='error'>{$_SESSION['message']}</div>";
      unset($_SESSION['messsage']);
    }
    ?>
    <form class = "login-form" action="login_handler.php" method="post">
      <input type="text" placeholder="email" id="email" name="email" />
        <input type="password" placeholder="password" id="password" name="password" />
          <input type="submit"/>
                <p class = "message"> Not Registered? <a href="register.php">Create an account</a></p>
                </form>
  </div>
  </div>

	<?php
  include_once("footer.php")
?>

  </body>

</html>