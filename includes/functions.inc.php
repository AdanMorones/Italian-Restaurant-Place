<?php

function userExists($conn, $username){
    $sql = "SELECT * FROM users WHERE userName = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../src/register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pwd, $email){
    $admin = FALSE;
    $sql = "INSERT INTO users (userName, userPwd, userEmail, userAdmin) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../src/register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPwd, $email, $admin);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
        header ("location: ../src/login.php?error=registersuccessful");
        exit();
}

function loginUser($conn, $username, $pwd){
    $userExists = userExists($conn, $username);

    if($userExists === false){
        header ("location: ../src/login.php?error=incorrectusername");
        exit();
    }

    $pwdHashed = $userExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header ("location: ../src/login.php?error=incorrectpwd");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["username"] = $userExists["userName"];
        $_SESSION["uid"] = $userExists["userID"];
        header ("location: ../src/login.php?error=none");
        exit();
    }
}