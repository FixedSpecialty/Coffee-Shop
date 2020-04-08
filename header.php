<head>
<?php session_start(); ?>
  <link rel="stylesheet" href="header.css">
</head>
<body>

<div class= "header">
<a href="home.php">
<h1>Coffee Shop</h1>
</a>
<nav class="dropdownmenu">
<ul>
        
        
        <li> <a href = "checkout.php"> Cart</li></a>
        <li> <a href = "Profile.php"> Profile</a>
                <ul id = "submenu">
                        <?php if(isset($_SESSION['auth'])) :?>
                <li> <a href="logout.php">Logout</a></li>
                        <?php endif;?>
                </ul>
</li>
        <li> <a href="membership.php">Membership</a></li>
        <li> <a href="about.php">About</a></li>
        <li> <a href="stock.php">Stock</a></li>
        <li><a href="shop.php">Shop</a></li>
</ul>        
</nav>
</div>

