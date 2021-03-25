<?php
define('DB_SERVER','remotemysql.com');
define('DB_USER','fzPexkCNFV');
define('DB_PASS' ,'3Yu8IYAx31');
define('DB_NAME', 'fzPexkCNFV');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
?>