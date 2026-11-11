<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Mamma Mia</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../styles/restaurant-style.css">

<style>
body {font-family:"Times New Roman", serif}
h1,h2,h3,h4,h5,h6 {font-family:serif;letter-spacing:5px}
</style>

<body>

<div class="notbottom">

<!-- Navbar (Sits on top) -->
<div class="w3-flex w3-white w3-wide w3-padding w3-card topstuff">
  <a href="index.php" class="w3-button">Mamma Mia</a>

  <nav class="w3-flex w3-hide-small" style="margin-left:auto">
    <a href="index.php#about" class="w3-button">About</a>
    <a href="menu.php" class="w3-button">Menu</a>
    <?php
      if(isset($_SESSION["uid"])){
        echo "<a href='your-order.php' class='w3-button'>Your Order</a>";
        echo "<a href='../includes/logout.inc.php' class='w3-button'>Log Out</a>";
      }
      else {
        echo "<a href='login.php' class='w3-button'>Your Order</a>";
        echo "<a href='login.php' class='w3-button'>Log In</a>";
      }
    ?>
    <a href="index.php#contact" class="w3-button">Contact</a>
  </nav>
</div>

<!-- Header -->
<header class="w3-display-container">
  <img src="img_catering.jpg"
  style="width:100%" alt="Catering">
  <div class="w3-display-bottomleft w3-padding w3-text-white w3-opacity-min">
    <h1>Le Catering</h1>
  </div>
</header>