<?php 

 function emptyInputSignup($email, $firstName, $lastName, $pwd, $pwdrepeat
) {
   $result;
   if (empty($email) ||empty($firstName) ||empty($lastName) ||empty($pwd) ||empty($pwdrepeat)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

 function invalidEmail($email) {
   $result;
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

function pwdMatch($pwd, $pwdrepeat) {
   $result;
   if ($pwd !== $pwdrepeat) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }


function emailExist($conn, $email) {
  $sql = "SELECT * FROM user WHERE email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=emailtaken");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  
  $resultData = mysqli_stmt_get_result($stmt);

  
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmts);
}


function create($conn, $email, $pwd, $firstName, $lastName) {
  $sql = "INSERT INTO user (email, passwords, firstName, lastName ) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  } 
  
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
  mysqli_stmt_bind_param($stmt, "ssss", $email, $hashedPwd, $firstName, $lastName);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmts);
  header("location: ../signup.php?error=none" );
  exit();
}

function emptyInputLogin($username, $pwd) {
   $result;
   if (empty($username) || empty($pwd)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

 function loginUser($conn, $username, $pwd){
  $emailExist = emailExist($conn, $username);

  if($emailExist === false) {
    header("location: ../login.php?error=wronglogin" );
    exit();
  } 

  $pwdHashed = $emailExist["passwords"]; 
  $checkPwd = password_verify($pwd, $pwdHashed);
  if ($checkPwd === false) {
    header("location: ../login.php?error=wronglogin" );
  }
  else if ($checkPwd === true) 
    {
    session_start();
    $_SESSION["userID"] = $emailExist["userID"];
    $_SESSION["email"] = $emailExist["email"];
    header("location: ../index.php" );
    exit(); 
  } 
}



function getUserLevel($conn, $email){
  $sql = "SELECT userLevel FROM user WHERE email = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=emailtaken");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  
  $resultData = mysqli_stmt_get_result($stmt);
return $resultData;
  echo $resultData;

}


function admin($conn, $username){
  $sql = "select userLevel FROM user where email = $username";
  $result = mysqli_query($conn, $sql);
  // $conn->close();
  
  while($row = mysqli_fetch_assoc($result)) {
      $mysqlResult = "{$row['userLevel']}<br>";
  }
  return $mysqlResult;
  }