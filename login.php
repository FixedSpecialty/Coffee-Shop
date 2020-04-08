
<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="login.css">
</head>
<?php
require_once('header.php');
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comment.css">
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