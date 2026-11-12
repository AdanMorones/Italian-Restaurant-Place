<?php
require_once '../includes/db.inc.php';

$sql = "SELECT * FROM menu_items;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)){
        echo "<form type='submit' action='../includes/item-submit.inc.php' method='post' class='item'>";
        echo "<input type='hidden' name='itemID' value='" . $row['itemID'] . "'>";
        echo "<h4>" . $row['itemName'] . "</h4>";
        echo "<p>" . $row['itemDesc'] . "</p>";
        echo "<p class='price'>$" . $row['itemPrice'] . "</p>";
        echo "<img src='../img/" . $row['itemImgPath'] . "'>";
        echo "<input type='submit' class='menubtn w3-button w3-light-grey' name='item' value='Add to Order'>";
        echo "</form>";
    }
}
