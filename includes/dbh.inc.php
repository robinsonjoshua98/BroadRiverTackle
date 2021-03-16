<?php

  $DB_SERVER = "localhost";
 $DB_USER = "test1";
 $DB_PASS = "tackletest";
 $DB_NAME = "broad_river_tackle";


// $DB_SERVER = "localhost";
// $DB_USER = "ugsxyahonfdqu";
// $DB_PASS = "gjxt5uygaid7";
// $DB_NAME = "dbz6rt2ohqxank";
$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
} 