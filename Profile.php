<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="styles/profile.css">
</head>
<?php
$profile_page=1;
include_once('header.php');
if ($_SESSION["auth"] == FALSE) {
     echo "FALSE";
     header("Location: login.php");
    exit;
}
    ?>
<div >
    <img id = holderpic src="images/placeholder.png"/>
 
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
     
     }
          ?>
          </tbody>
        </table>
        <div>
        <?php
include_once('footer.php');
?>
    </div>
</body>
</html>