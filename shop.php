<html>
<header><title>Neckar Coffee</title></header>
<head>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="styles/shop.css">
</head>
<?php
$shop_page=1;
require_once('header.php');
?>	
    
    <h2 id = holdercaption> Coffee </h2>
    <div id="images">
		<a href="coffee1.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px">
			<div class="caption">Coffee 1</div>
		</a>
		<a href="coffee2.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px"> 
			<div class="caption">Coffee 2</div>
		</a>
		<a href="coffee3.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px"> 
			<div class="caption">Coffee 3</div>
		</a>
    </div>
    <h2 id = holdercaption> Merchandise </h2>
    <div id="images">
		<a href="merch1.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px">
			<div class="caption">Merch 1</div>
		</a>
		<a href="merch2.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px"> 
			<div class="caption">Merch 2</div>
		</a>
		<a href="merch3.php">
			<img class =coffees src="images/placeholder.png" width="100px" height="100px"> 
			<div class="caption">Merch 3</div>
		</a>
    </div>
    <a href= "membership.php">
<div class="img-wrapper">
  <div class="overlay">
    <h2>Join Our Club</h2>
  </div>
</div>
</a>
	<div>

<?php
require_once('footer.php');
?>
	</div>
</body>
</html>

