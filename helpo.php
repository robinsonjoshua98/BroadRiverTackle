<?php

include_once 'includes/db-connection.php';
$query = "select * from user";
 $result = mysql_query($query);
 echo $result; 