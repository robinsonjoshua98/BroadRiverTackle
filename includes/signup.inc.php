<?php

  if(isset($_POST["submit"])) {
    $email =  $_POST["email"];
    $firstName =  $_POST["firstName"];
    $lastName =  $_POST["lastName"];
    $pwd =  $_POST["pwd"];
    $pwdrepeat =  $_POST["pwdrepeat"];
    $phone = $_POST["phone"];
  
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($email, $firstName, $lastName, $pwd, $pwdrepeat, $phone) !== false){
      header("location: ../signup.php?error=emptyInput");
      exit();
    }
    
    if (invalidEmail($email) !== false){
      header("location: ../signup.php?error=invalidemail");
      exit();
    }
    
    if (invalidEmail($email) !== false){
      header("location: ../signup.php?error=emptyinput");
      exit();
    }
    
    if (pwdMatch($pwd, $pwdrepeat) !== false){
      header("location: ../signup.php?error=passwordsdontmatch");
      exit();
    }
    
    if (emailExist($conn, $email ) !== false){
      header("location: ../signup.php?error=emailTaken");
      exit();
    }
    
    create($conn, $email, $pwd, $firstName, $lastName, $phone);

    }
    else {
      header("location: ../signup.php?error=bad");
    exit();
  }