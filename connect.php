<?php
define('DB_SERVER','remotemysql.com');
define('DB_USER','wkqgOIzEHy');
define('DB_PASS' ,'wFiOGCJgsP');
define('DB_NAME', 'wkqgOIzEHy');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
?>