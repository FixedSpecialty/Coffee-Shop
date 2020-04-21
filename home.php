<html>
<header><title>Neckar Coffee</title></header>
<head>
     <link rel="shortcut icon" type="image/png" href="favicon.png"/>
     <link rel="stylesheet" type="text/css" href="styles/home.css"/>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/home.js"></script>
</head>
<?php
$home_page = 1;
require_once('header.php');
?>
<div class="marquee">
<span>
<?php
require_once 'Dao.php';
$dao = new Dao();
$lines = $dao->getStock();
  if (is_null($lines)) {
        echo "There was an error.";
  } else {
         foreach ($lines as $line) {
           echo "ORIGIN: {$line['origin']},&nbsp&nbsp&nbspVARIETAL: {$line['varietal']},&nbsp&nbsp&nbspROASTER: {$line['roaster']},&nbsp&nbsp&nbspELEVATION: {$line['elevation']}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp/////&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
          }
      }
      ?>
      </span>
</div> 
<a href= "membership.php">
<div class="img-wrapper">
  <div class="overlay">
    <h2>Join Our Club</h2>
  </div>
</div>
</a>
<div id ="header1">
<h1>Browse our coffees</h1>
    </div>
<div id="slider">
  <a class="control_next">></a>
  <a class="control_prev"><</a>
  <ul>
    <li><a href="coffee1.php"><img src="images/battlecreek-coffee-roasters-_1wDmr4dtuk-unsplash.jpg"/></a></li>
    <li><a href="coffee2.php"><img src="images/battlecreek-coffee-roasters-MvOb1hRy_0M-unsplash.jpg"/></a></li>
    <li><a href="coffee3.php"><img src="images/battlecreek-coffee-roasters-rsnzc-8dVs0-unsplash.jpg"/></a></li>
    
  </ul>  
</div>


    
	<a href= "about.php">
<div class="img-wrapper1">
  <div class="overlay">
    <h2>About Us</h2>
  </div>
</div>
</a>
<div>
	<?php
require_once('footer.php');
?>
</body>

</html>

