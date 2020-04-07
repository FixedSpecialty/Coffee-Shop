<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<?php
include_once('header.php');
if ($_SESSION["auth"] == FALSE) {
     echo "FALSE";
     header("Location: login.php");
    exit;
}
    ?>
<div >
    <img id = holderpic src="placeholder.png" height="400px" width="300px"/>
 
</div>
<?php
require_once('KLogger.php');
$logger = new KLogger('log.txt', KLogger::DEBUG);
include('Dao.php');
  $Dao = new Dao();
  $id = $_SESSION['id'];
  $connection = $Dao->getConnection();

$stmt = $connection->prepare("SELECT first, last, email, admin FROM members WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch();
  if ($user)
  {
     echo "<div id=name> <h3>First Name: {$user['first']}</h3><h3>Last Name: {$user['last']}</h3><h3>Email: {$user['email']}</h3></div>";
     if(!empty($user['admin']))
       {
          $logger->LogInfo("approved admin priveledge[{$user['email']}]");
            echo "
          <table>
          <thead>
            <tr>
              <th>Origin</th>
              <th>Varietal</th>
              <th>Roaster</th>
              <th>Elevation</th>
              <th>Notes</th>
              <th>Stock</th>
              <th>Delete</th>
           </tr>
          </thead>
          <tbody>";
             $lines = $Dao->getStock();
      if (is_null($lines)) {
            echo "There was an error.";
      } else {
             foreach ($lines as $line) {
               echo "<tr><td>{$line['origin']}</td><td>{$line['varietal']}</td><td>{$line['roaster']}</td><td>{$line['elevation']}</td><td>{$line['notes']}</td><td>{$line['stock']}</td><td class='delete'><a href='delete_stock.php?id={$line['id']}'>X</a></td></tr>";
              }
          }
     }
}
          ?>
          </tbody>
        </table>
</body>
</html>
<?php
include_once('footer.php');
?>