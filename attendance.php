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

    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/admin.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

</head>

    <body>
        <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">
            <div class="header">Attendance</div>

            <div class="info">
                <div>
                <div class="container">
                        <br><br>
                        
                        <form action="" method="post" id="my-form1">
                                    <div class="form-group">
                                        <label for="name">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date" style="width:50%"><br>
                                        <button type="submit" class="btn btn-primary align-right" name="btn" value="check">Check</button><br>
                                    </div>
                              <div class="form-group">
                                    <label for="name">Employee ID:</label>
                                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="To check for specific employee enter employee ID" style="width:50%">
                            </div>
                            
                        </form>
                        
                        <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                        
                          <thead>
                              <tr>
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Punch In</th>
                              <th>Punch Out</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>View Monthly</th>
                          </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $islate="";
                                $overlate="";
                                $selectQuery1 = "Select * from staff";
                                          $result1 = mysqli_query($con, $selectQuery1);
                                          if (mysqli_num_rows($result1)>0) {
                                            $staff_start_time = '07:00:00';
                                            $staff_buffer_time = '07:05:00';
                                              while ($row1 = mysqli_fetch_assoc($result1)) {
                                                          $id = $row1["staff_id"];
                                                          $fname = $row1["firstname"];
                                                          $lname = $row1["lastname"];
                                              
                                              
                                              if (isset($_POST["date"]))
                                              { 
                                                  $date = $_POST["date"];
                                                  // echo $date."<br>";
                                              

                                              
                                              $query = "SELECT time FROM dummy_data WHERE emp_id= '$id' AND date='$date' ORDER BY time";
                                              $result = mysqli_query($con,$query);
                                              $total_rows = mysqli_num_rows($result);
                                              // echo $total_rows;
                                              $time_array = array();
                                              if ($total_rows > 0) {
                                              // output data of each row
                                              for($i=0; $i<$total_rows;$i++){
                                                  $row = mysqli_fetch_assoc($result);
                                                  $time_array[$i] = $row["time"];
                                                  //   echo $i." - ".$row["time"]."<br>";
                                              }
                                              // print_r($time_array);
                                ?> 
                              <tr>
                              <td><?php echo $id; ?></td>
                              <td><?php echo $fname." ".$lname; ?></td>
                              <td><?php echo $time_array[0]; ?></td>
                              <td><?php echo $time_array[$total_rows-1]; ?></td>
                              <td><?php echo $date?></td>
                              <td><?php if(($time_array[0]) <= $staff_start_time )
                                        {
                                          echo "On time";
                                        }
                                        elseif(($time_array[0]) <= $staff_buffer_time)
                                          {
                                            echo "In buffer";
                                          }
                                        elseif(($time_array[0]) >= $staff_start_time ) 
                                        {
                                          $islate = 'late';
                                          echo $islate;
                                          // $query1=mysqli_query($con,"SELECT * FROM staff WHERE staff_id='$id'");
                                          //  while ($row1 = mysqli_fetch_assoc($query1)) {
                                          //                 $isl = $row1["isLate"];
                                          //                 $overlate = $row1["leaves"];}
                                          // if ($isl>=3) 
                                          // {
                                          //   $overlate=$overlate+1;
                                          //   $query=mysqli_query($con,"UPDATE staff SET isLate = '0' where staff_id='$id'");
                                          //   $query2=mysqli_query($con,"UPDATE staff SET leaves = '$overlate' where staff_id='$id'");
                                          // }
                                          // else 
                                          // {
                                          //   $isl=$isl+1;
                                          //   $query=mysqli_query($con,"UPDATE staff SET isLate = '$isl' where staff_id='$id'");
                                          // }
                                         

                                          }
                                           ?></td>
                              <td><a class="btn btn-info" href="Test.php?mid=<?php echo date("m",strtotime($date));?>&sid=<?php echo $id;?>&yid=<?php echo date("Y",strtotime($date)) ?>">View</a></td>
                              </tr>
                              <?php } } } } ?>
                          </tbody>
                        
                        </table>
                        </div>
                </div>
                </div>
                </div>
                </div>
                </div>
              
         
                    


                
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstdapcdn.com/bootstdap/4.0.0/js/bootstdap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>

                <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>

</html>
<?php } ?>