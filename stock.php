
<?php

  require_once 'Dao.php';
  $dao = new Dao();

  $origin_preset = "";
  $varietal_preset = "";
  $roaster_preset = "";
  $elevation_preset = "";
  $notes_preset = "";
  $stock_preset = "";
  if (isset($_SESSION['form'])) {
    $origin_preset = $_SESSION['form']['origin'];
    $varietal_preset = $_SESSION['form']['varietal'];
    $roaster_preset = $_SESSION['form']['roaster'];
    $elevation_preset = $_SESSION['form']['elevation'];
    $notes_preset = $_SESSION['form']['notes'];
    $stock_preset = $_SESSION['form']['stock'];
  }
?>
<html>
<header><title>Neckar Coffee</title></header>
<head>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="stock.css">
</head>
<?php
require_once('header.php');
?>
<hr>
<?php
    if (isset($_SESSION['errors'])) {
      foreach ($_SESSION['errors'] as $error) {
         echo "<div id='error'>{$error}</div>";
      }
      unset($_SESSION['errors']);
    } ?>
  <body>
    <?php
    require_once('KLogger.php');
$logger = new KLogger('log.txt', KLogger::DEBUG);
  $Dao = new Dao();
  if(isset($_SESSION['id'])) :
  
  $id = $_SESSION['id'];
  $connection = $Dao->getConnection();
$stmt = $connection->prepare("SELECT first, last, email, admin FROM members WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch();
     if(!empty($user['admin'])) : ?>
    <h1>Add Stock</h1>
    <form method="POST" action="stock_handler.php" enctype="multipart/form-data">
      <div>Origin: <input value="<?php echo $origin_preset; ?>" type="text" id="origin" name="origin"></div>
      <div>Varietal: <input value="<?php echo $varietal_preset; ?>" type="text" id="varietal" name="varietal"></div>
      <div>Roaster: <input value="<?php echo $roaster_preset; ?>" type="text" id="roaster" name="roaster"></div>
      <div>Elevation: <input value="<?php echo $elevation_preset; ?>" type="text" id="elevation" name="elevation"></div>
      <div>Notes: <input value="<?php echo $notes_preset?>" type="text" id="notes" name="notes"></div>
      <div>Stock: <input value="<?php echo $stock_preset; ?>" type="text" id="stock" name="stock"></div>
        <input type="submit" value="Submit">
    </form>
     <?php endif;  ?>
     <?php endif;  ?>
        <table>
      <thead>
        <tr>
          <th>Origin</th>
          <th>Varietal</th>
          <th>Roaster</th>
          <th>Elevation</th>
          <th>Notes</th>
          <th>Stock</th>
       </tr>
      </thead>
      <tbody>
      <?php
         $lines = $dao->getStock();
  if (is_null($lines)) {
        echo "There was an error.";
  } else {
         foreach ($lines as $line) {
           echo "<tr><td>{$line['origin']}</td><td>{$line['varietal']}</td><td>{$line['roaster']}</td><td>{$line['elevation']}</td><td>{$line['notes']}</td><td>{$line['stock']}</td></tr>";
          }
      }
      ?>
      </tbody>
    </table>
        <div>
          <hr>
<?php
require_once('footer.php');
?>
        </div>
</body>
</html>

