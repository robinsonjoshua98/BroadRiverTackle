<?php

// $DB_SERVER = "localhost";
// $DB_USER = "test1";
// $DB_PASS = "tackletest";
// $DB_NAME = "broad_river_tackle";


$DB_SERVER = "localhost";
$DB_USER = "ulzqv8eys0mky";
$DB_PASS = "joshuarob17!";
$DB_NAME = "db4lyu9dfcaslk";

$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

if(mysqli_connect_errno()){
    echo "failed";
    exit();
}
echo "connection success";