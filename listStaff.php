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
    <meta charset="UTF-8">
    <title>HR Module</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">
            <div class="header">List Of Staff</div>
            <div class=row>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Staff ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                    $query=mysqli_query($con,"select * from staff");
                    while($row=mysqli_fetch_array($query))
                  {
                    ?>
                                <tr>
                                    <td><?php echo  $row['staff_id'];?></td>
                                    <td><?php echo $row['firstname'];?></td>
                                    <td><?php echo $row['lastname'];?></td>
                                    <td><?php echo  $row['gender'];?></td>
                                    <td><?php echo  $row['email'];?></td>
                                    <td><?php echo  $row['phone'];?></td>
                                    <td><?php echo  $row['position'];?></td>
                                    <td><?php echo  $row['sal'];?></td>
                                    <td>
                                        <a href="profile.php?id=<?php echo $row["staff_id"]; ?>">View</a>
                                        <a href="deletestaff.php?id=<?php echo $row["staff_id"]; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-1">
                </div>

            </div>


        </div>
    </div>

</body>

</html>
<?php } ?>
