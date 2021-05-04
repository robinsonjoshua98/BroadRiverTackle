<?php 


/**
 * Test for empty signup from the sign up page
 * 
 * 
 * @email string
 * @firstName string
 * @lastName string
 * @pwdrepeat string
 * @phone string
 * 
 * 
 * @return bool false if none are empty
 */
 function emptyInputSignup($email, $firstName, $lastName, $pwd, $pwdrepeat, $phone
) {
   $result;
   if (empty($email) ||empty($firstName) ||empty($lastName) ||empty($pwd) ||empty($pwdrepeat)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

/**
 * Test for empty inputs from the product upload
 * 
 * 
 * @product string
 * @description string
 * @category int
 * @price float
 * @phone decimal
 * 
 * 
 * @return bool false if none are empty
 */

 function emptyInputProduct($product, $description, $category, $price) {
    $result;
    if (empty($product) ||empty($description) ||empty($category) ||empty($price)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

/**
 * Test for valid email input
 * 
 * 
 * @email string
 * 
 * 
 * @return bool false if email is suffice
 */

 function invalidEmail($email) {
   $result;
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

 /**
 * Test to make sure two passwords are the same
 * 
 * 
 * @pwd string
 * @pwdrepeat string
 * 
 * 
 * @return bool false if both passwords are equivalent 
 */

function pwdMatch($pwd, $pwdrepeat) {
   $result;
   if ($pwd !== $pwdrepeat) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

 /**
 * Test to make sure 'email' exist in the database
 * 
 * 
 * @conn string
 * @email string
 *
 * 
 * 
 * @return bool false if email is not in database 
 */


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

/**
 * Creates a user in the database
 * 
 * 
 * @conn string
 * @email string
 * @pwd string
 * @firstName string
 * @lastName decimal
 * @phone decimal
 * 
 */

function create($conn, $email, $pwd, $firstName, $lastName, $phone) {
  $sql = "INSERT INTO user (email, passwords, firstName, lastName, phone) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  } 

 
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  
  mysqli_stmt_bind_param($stmt, "sssss", $email, $hashedPwd, $firstName, $lastName, $phone);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmts);
  header("location: ../signup.php?error=none" );
  exit();
}

/**
 * Creates a product in the database
 * 
 * 
 * @conn string
 * @product string
 * @description string
 * @category string
 * @price decimal
 * @userId decimal
 * 
 */

function createProduct($conn, $product, $description, $category, $price, $userId) {
  $sql = "INSERT INTO products (product_name, descriptions, category_id, list_price, userId) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../members.php?error=stmtfailed");
    exit();
  } 
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../members.php?error=stmtfailed");
    exit();
  } 
  
  
  mysqli_stmt_bind_param($stmt, "sssss", $product, $description, $category, $price, $userId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmts);
  header("location: ../members.php?error=none" );
  exit();
}

function createAdminProduct($conn, $product, $description, $category, $price, $userId) {
  $sql = "INSERT INTO products (product_name, descriptions, category_id, list_price, userId) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../admins.php?error=stmtfailed");
    exit();
  } 
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../admins.php?error=stmtfailed");
    exit();
  } 
  
  
  mysqli_stmt_bind_param($stmt, "sssss", $product, $description, $category, $price, $userId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmts);
  header("location: ../admins.php?error=none" );
  exit();
}

// function updateProduct($conn, $product, $description, $category, $price) {
//   $sql = "INSERT INTO products (product_name, descriptions, category_id, list_price) VALUES (?, ?, ?, ?)";
//   $sql = "update products set category_id = '$category_id', product_name='$product_name', descriptions='$descriptions', list_price='$list_price'where product_id='1'";
//   $stmt = mysqli_stmt_init($conn);
//   if (!mysqli_stmt_prepare($stmt, $sql)){
//     header("location: ../members.php?error=stmtfailed");
//     exit();
//   } 
  
  
//   mysqli_stmt_bind_param($stmt, "ssss", $product, $description, $category, $price);
//   mysqli_stmt_execute($stmt);
//   mysqli_stmt_close($stmts);
//   header("location: ../members.php?error=none" );
//   exit();
// }

/**
 * Checks for all fields filled in on login
 * 
 * 
 * @username string
 * @pwd string
 * 
 * 
 * returns false is both are filled in
 */



function emptyInputLogin($username, $pwd) {
   $result;
   if (empty($username) || empty($pwd)) {
     $result = true;
   } else {
     $result = false;
   }
   return $result;
 }

/**
 * Logs user into account
 * 
 * 
 * @conn string
 * @username string
 * @pwd string
 * 
 */


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
    header("location: ../index.php?error=none" );
    exit(); 
  } 
}

/**
 * Pulls the user level from the database
 * 
 * 
 * @conn string
 * @email string
 * 
 * return $resultData
 * 
 */


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


}
