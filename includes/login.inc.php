<?php

if(isset($_POST["submit"])){
    $username = $_POST["Name"];
    $pwd = $_POST["Password"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../src/login.php");
}
