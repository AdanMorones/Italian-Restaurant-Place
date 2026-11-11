<?php

if(isset($_POST["submit"])){
    $username = $_POST["Name"];
    $pwd = $_POST["Password"];
    $email = $_POST["Email"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(userExists($conn, $username) !== false){
        header ("location: ../src/register.php?error=userexists");
        exit();
    }

    createUser($conn, $username, $pwd, $email);
}
else {
    header("location: ../src/register.php");
}