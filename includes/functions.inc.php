<?php 


//  function emptyInputSignup($email, $firstName, $lastName, $pwd, $pwdrepeat, $name) {
//    $result;
//    if (empty($email) ||empty($firstName) ||empty($lastName) ||empty($pwd) ||empty($pwdrepeat) ||empty($result)) {
//      $result = true;
//    } else {
//      $result = false;
//    }
//    return $result;
//  }

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
  $sql = "SELECT * FROM USER WHERE email = ?;";
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
?>