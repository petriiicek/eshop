<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRep) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRep))
    {
        $result = true;
    }
    else {
        $result = false;
    }
        return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    }

function invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
        }

function pwdMatch($pwd, $pwdRep) {
        $result;
        if ($pwd !== $pwdRep) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

function uidExists($conn, $username, $email) {

    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registrace.php?error=stmtfailed");
    exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
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

function createUser($conn, $name, $email, $username, $pwd) {

    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersType) VALUE (?, ?, ?, ?, 'user');";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registrace.php?error=stmtfailed");
    exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../registrace.php?error=none");
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd))
    {
        $result = true;
    }
    else {
        $result = false;
    }
        return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../prihlaseni.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../prihlaseni.php?error=wrongLogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["usersType"] = $uidExists["usersType"];
        header("location: ../index.php");
        exit();

    }
  

}

