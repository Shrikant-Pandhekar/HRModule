<?php 
    session_start();
    error_reporting(0);
    include('connect.php');
    if(strlen($_SESSION['login'])==0)
    { 
    header('location:login.html');
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Attendance</title>

    <!-- Custom fonts for this template-->

    <!-- Bootstdap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admin.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

</head>

    <body id="page-top" >
        <div class="wrapper">
            <?php include("navbar.php");?>
        
       
                 <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-top: 40px;margin-left: 300px;width:100%">
                        <?php include('connect.php');?>
                        <h3>Monthly Attendance</h3>
                        <br><br>
                <?php

                    $month = $_GET['mid'];
                    $year = $_GET['yid'];

                    $start_date = "01-".$month."-".$year;
                    $start_time = strtotime($start_date);

                    $end_time = strtotime("+1 month", $start_time);

                    function minusTime($laterTime, $earlierTime)
                        {
                            $a = new DateTime($laterTime);
                            $b = new DateTime($earlierTime);
                            $interval = $a->diff($b);
                            return intval($interval->format("%H"))*60 + intval($interval->format("%i"));
                        }
                    ?>
                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead> 
                    <?php
                    
                    $att="";

                    for($i=$start_time; $i<$end_time; $i+=86400)
                    {
                        $check = date('Y-m-d', $i)." ";
                        #echo date('Y-m-d', $i)." ";
                        $query = "SELECT time FROM dummy_data WHERE emp_id='".$_GET['sid']."' and date = '$check' ";
                                    $result = mysqli_query($con,$query);
                                    $total_rows = mysqli_num_rows($result);
                                    #echo $total_rows;
                                    $time_array = array();
                                    if ($total_rows > 0) 
                                    {
                                        for($j=0; $j<$total_rows;$j++){
                                            $row = mysqli_fetch_assoc($result);
                                            $time_array[$j] = $row["time"];
                                        }
                                    
                                        $total_time = 0;
                                        $x = 0;
                                        while($x<$total_rows){
                                            $total_time += minusTime($time_array[$x+1],$time_array[$x]);
                                            $x+=2;
                                        }
                                        
                                        if ($total_time>54){    
                                            $att= "Present";
                                            // echo "<br>First in time is ".$time_array[0]." and last out time is ".$time_array[$total_rows-1]."Total time calculated is ".$total_time."<br>";
                                        }
                                        
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo date('Y-m-d', $i)." ";?></td>
                                                <td><?php echo $att;?></td>
                                            </tr>
                                        </tbody>   
                                    <?php                                
                                    }
                                    
                                    else {         
                                            $att= "Absent"; 
                                        }
                                    ?>
                                    <tbody>
                                            <tr>
                                                <td><?php echo date('Y-m-d', $i)." ";?></td>
                                                <td><?php echo $att;?></td>
                                            </tr>
                                    </tbody>
                    <?php
                                   
                    }

 
                ?>
                </table>
            </div>


            </div>
        
                    


                
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstdapcdn.com/bootstdap/4.0.0/js/bootstdap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>

</body>

</html>
<?php } ?>