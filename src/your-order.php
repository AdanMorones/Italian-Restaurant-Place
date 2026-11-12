<?php 
  include_once 'header.php';
?>

<!-- Page Content -->
<main id="home" class="w3-content" style="max-width:1000px">

<!-- Your Order -->
<section id="about" class="w3-padding-64">
<h1 class="w3-center">Italian Menu</h1>
<hr>

<div class="order">


<?php

require_once '../includes/db.inc.php';

$sql = "SELECT * FROM orders INNER JOIN menu_items ON orders.itemID = menu_items.itemID WHERE userID = '$_SESSION[uid]' AND order_status = 'incomplete';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$total = 0;

if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)){
      echo "<p class='orderItem'>" . $row['itemName'] . "</p>";
      echo "<p class='orderPrice'>$" . $row['itemPrice'] . "</p>";
      $total += $row['itemPrice'];
    }
}

echo "</div>";
echo "<hr>";

echo "<div class='order'>";
echo "<p class='orderItem'>Total</p>";
echo "<p class='orderPrice'>$" . $total . "</p>";
echo "</div>";

?>

<form type='submit' action='../includes/place-order.inc.php' method='post'>
<input type='submit' class='w3-button w3-light-grey' name='placeorder' value='Place Order'>
</form>

<?php
  if (isset($_GET["error"])){
    if($_GET["error"] == "stmtfailed"){
      echo "<p class=errorText >Something went wrong.</p>";
    }
    else{
      echo "<p class=errorText >Order placed successfully! Your order number is: " . $_GET['error'] . "</p>";
    }
  }
?>

</section>
</main>
</div>

<?php 
  include_once 'footer.php';
?>
