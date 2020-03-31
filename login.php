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
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <h1>Please log in</h1>
    <?php
    if (isset($_SESSION['message'])) {
      echo "<div id='error'>{$_SESSION['message']}</div>";
      unset($_SESSION['messsage']);
    }
    ?>
    <form action="login_handler.php" method="post">
      <div><label for="email">Email:<input type="textbox" id="email" name="email" /></div>
        <div><label for="password">Password:<input type="password" id="password" name="password" /></div>
          <div><input type="submit"/></div>
	</form>
	<?php
  include_once("footer.php")
?>
  </body>

</html>