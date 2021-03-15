<?php
$servername = "localhost";
$username = "umdhgxi7gchtt";
$password = "ijoyupxchzlb";
$dbname = "dbv3rwweayoouf";

// $DB_SERVER = "localhost";
// $DB_USER = "ulzqv8eys0mky";
// $DB_PASS = "joshuarob17!";
// $DB_NAME = "db4lyu9dfcaslk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Yo Connection failed dummy. You need to fix it before you screw everything up. It failed because " . $conn->connect_error);
// }
// else { 
//     echo " aye man you doin alight. Keep killing it and maybe soon you wont look like a dang fool <br>";
// }

$conn->select_db($dbname) or die( "Unable to select database from this website");


echo "<br>";
$sql = "SELECT email, firstName, lastName, passwords FROM user";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
    <head>
        <title>Broad River Tackle Company</title>
    </head>
    <body>
    <h1>Proof of database connection</h1>
<?php 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //
      
    echo "email: " . $row["email"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<body>
</html>