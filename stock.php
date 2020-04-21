
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
  <link rel="stylesheet" type="text/css" href="styles/stock.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="js/stock.js"></script>
</head>
<?php
$stock_page=1;
require_once('header.php');
?>
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
  

      <div class = "stock-page">
      
      <div class = "form">
      <?php
    if (isset($_SESSION['errors'])) {
      $logger->LogInfo("error in stock entry");
      foreach ($_SESSION['errors'] as $error) {
         echo "<div id='error'>{$error}<span class='close_error'>X</span></div>";
      }
      unset($_SESSION['errors']);
    } ?>
      <h1>ADD STOCK</h1>
    <form class = "form-css" method="POST" action="stock_handler.php" enctype="multipart/form-data">
      <input  value="<?php echo $origin_preset; ?>" type="text" placeholder="origin" id="origin" name="origin" />
        <input value="<?php echo $varietal_preset; ?>" type="text" placeholder="varietal" id="varietal" name="varietal" />
        <input value="<?php echo $roaster_preset; ?>" type="text" placeholder="roaster" id="roaster" name="roaster" />
        <input value="<?php echo $elevation_preset; ?>" type="text" placeholder="elevation" id="elevation" name="elevation" />
        <input value="<?php echo $notes_preset?>" type="text" placeholder="notes" id="notes" name="notes" />
        <input value="<?php echo $stock_preset; ?>" type="text" placeholder="stock" id="stock" name="stock" />
          <input type="submit" value="Submit"/>
                </form>
  </div>
  </div>
     <?php endif;  ?>
     <?php else:  ?>
      <div id ="noadmin">BROWSE<br>OUR<br>STOCK</div>
     <?php endif; ?>
        <table class = "table-fill">
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
      <tbody class = "table-hover">
        
      <?php
      if(isset($_SESSION['id'])) {
  
        $id = $_SESSION['id'];
        $connection = $Dao->getConnection();
      $stmt = $connection->prepare("SELECT first, last, email, admin FROM members WHERE id = ?");
      $stmt->execute([$_SESSION['id']]);
      $user = $stmt->fetch();
           if(!empty($user['admin'])) {
            $lines = $dao->getStock();
          if (is_null($lines)) {
            echo "There was an error.";
      } else {
             foreach ($lines as $line) {
               echo "<tr><td>{$line['origin']}</td><td>{$line['varietal']}</td><td>{$line['roaster']}</td><td>{$line['elevation']}</td><td>{$line['notes']}</td><td>{$line['stock']}</td><td class='delete'><a href='delete_stock.php?id={$line['id']}'>X</a></td></tr>";
              }
          }
        }
      }
        else{
         $lines = $dao->getStock();
  if (is_null($lines)) {
        echo "There was an error.";
  } else {
         foreach ($lines as $line) {
           echo "<tr><td class = \"text-left\">{$line['origin']}</td><td class = \"text-left\">{$line['varietal']}</td><td class =\"text-left\">{$line['roaster']}</td><td class = \"text-left\">{$line['elevation']}</td><td class = \"text-left\">{$line['notes']}</td><td class = \"text-left\">{$line['stock']}</td></tr>";
          }
      }
    }
      ?>
      </tbody>
    </table>
        <div>

<?php
require_once('footer.php');
?>
        </div>
</body>
</html>

