
<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="home.css">
</head>
<?php
require_once('header.php');
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <?php
    if (isset($_SESSION['errors'])) {
      foreach ($_SESSION['errors'] as $error) {
         echo "<div id='error'>{$error}</div>";
      }
      unset($_SESSION['error']);
    }
    ?>
  <body>
    <h1>Create an Account</h1>
    <form action="register_handler.php" method="post">
    <div><label for="first">First Name:<input type="textbox" id="first" name="first" /></div>
    <div><label for="last">Last Name:<input type="textbox" id="last" name="last" /></div>
      <div><label for="email">Email:<input type="textbox" id="email" name="email" /></div>
        <div><label for="password">Password:<input type="password" id="password" name="password" /></div>
          <div><input type="submit"/></div>
	</form>
	<?php
  include_once("footer.php")
?>
  </body>

</html>