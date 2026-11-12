<?php

if(isset($_POST["placeorder"])){
    session_start();

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    completeOrder($conn, $_SESSION["uid"]);
}
else {
    header("location: ../src/your-order.php");
}