<head>
<?php session_start(); ?>
  <link rel="stylesheet" href="styles/header.css">
</head>
<body>

<div class= "header">
<a href="home.php">
<h1>Coffee Shop</h1>
</a>
<nav class="dropdownmenu">
<ul>
        
 
        <?php if(isset($_SESSION['auth'])) :?>
                <li> <a href="logout.php">Logout</a></li>
                        <?php endif;?></li>
        <li><a href="Profile.php"class="<?php if($login_page == 1) { echo 'highlighted'; } ?>">Login</a>
        <li> <a href = "Profile.php"class="<?php if($profile_page == 1) { echo 'highlighted'; } ?>"> Profile</a></li>
        <li> <a href="membership.php"class="<?php if($membership_page == 1) { echo 'highlighted'; } ?>">Membership</a></li>
        <li> <a href="about.php"class="<?php if($about_page == 1) { echo 'highlighted'; } ?>">About</a></li>
        <li> <a href="stock.php"class="<?php if($stock_page == 1) { echo 'highlighted'; } ?>">Stock</a></li>
        <li><a href="shop.php"class="<?php if($shop_page == 1) { echo 'highlighted'; } ?>">Shop</a></li>
        
</ul>
</nav>
</div>

