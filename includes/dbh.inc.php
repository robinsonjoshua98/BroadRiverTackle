<?php

  $DB_SERVER = "localhost";
 $DB_USER = "test1";
 $DB_PASS = "tackletest";
 $DB_NAME = "broadRiverFinal";


//  name dbvxgityoyxtht
//  u5vk6vs7g2ire
//  empgtgtiu2kc

// $DB_SERVER = "localhost";
// $DB_USER = "u5vk6vs7g2ire";
// $DB_PASS = "empgtgtiu2kc";
// $DB_NAME = "dbvxgityoyxtht";
$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
} 