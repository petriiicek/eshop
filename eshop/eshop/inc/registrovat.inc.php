<?php
if (isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRep = $_POST["pwdrep"];
    
     require_once 'dbh.inc.php';
     require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRep) !== false) {
        header("location: ../registrace.php?error=emptyinput");
        exit();
    }    
    
    if (invalidUid($username) !== false) {
        header("location: ../registrace.php?error=invaliduid");
        exit();
    }   

    if (invalidEmail($email) !== false) {
        header("location: ../registrace.php?error=invalidemail");
        exit();
    }  

    if (pwdMatch($pwd, $pwdRep) !== false) {
        header("location: ../registrace.php?error=passworddontmatch");
        exit();
    }  

    if (uidExists($conn, $username, $username) !== false) {
        header("location: ../registrace.php?error=usernametaken");
        exit();
    }  

    createUser($conn, $name, $email, $username, $pwd);
    
}
else {
    header("location: ../registrace.php");
    exit();
}