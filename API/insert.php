<?php 
require('../connect.php');
$password = $_POST['password'];
$eid = $_POST['eid'];
$date = $_POST['date'];
$time = $_POST['time'];

if($password == 'vatantexttile@2021')
{
     $query=mysqli_query($con,"insert into attendance (emp_id, date, time) values ('$eid', '$date', '$time')");
     if($query)
     {
         echo "done";
     }
     else
     {
         echo mysqli_error($con)."<br>";
         echo "failed";
     }
}
else{
    echo "invalid password";
}


?>