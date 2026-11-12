<?php

if(isset($_POST["item"])){
    $itemID = $_POST["itemID"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(loggedIn() !== true){
        header ("location: ../src/login.php?error=notloggedin");
        exit();
    }

    addToOrder($conn, $itemID, $_SESSION["uid"]);
}
else {
    header("location: ../src/menu.php");
}