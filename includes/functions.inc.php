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

function loggedIn(){
    session_start();
    if(isset($_SESSION["uid"])){
        return true;
    }
    else{
        return false;
    }
}

function addToOrder($conn, $itemID, $userID){
    $orderNum = 0;
    $orderStatus = "incomplete";
    $sql = "INSERT INTO orders (userID, itemID, order_number, order_status) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../src/menu.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userID, $itemID, $orderNum, $orderStatus);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header ("location: ../src/menu.php?error=none");
    exit();
}

function completeOrder($conn, $userID){
    $orderNum = generateOrderNum($conn);
    $orderStatus = "complete";
    $sql = "UPDATE orders SET order_number = (?) WHERE userID = $userID AND order_number = 0;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../src/your-order.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $orderNum);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "UPDATE orders SET order_status = (?) WHERE userID = $userID AND order_status = 'incomplete';";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../src/your-order.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $orderStatus);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header ("location: ../src/your-order.php?error=" . $orderNum);
    exit();
}

function generateOrderNum($conn){
    $orderNum = 0;
    $sql = "SELECT order_number FROM orders;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)){
            if($orderNum < $row['order_number']){
                $orderNum = $row['order_number'];
            }
        }
    }

    $orderNum += 1;
    return $orderNum;
}
