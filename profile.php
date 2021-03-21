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
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/listStaff.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <?php include("navbar.php");?>
        <div class="main_content">
            <div class="header">Edit Profile</div>

            <br>
            <?php
            include('dbconnect.php');
            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                $n1 = $_GET["id"];
                $Query = "SELECT * from staff WHERE staff_id='$n1'";
                $result = mysqli_query($con, $Query);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        $fname = $row["firstname"];
                        $lname = $row["lastname"];
                        $sal=$row["sal"];
                        $position=$row["position"];
                        $email=$row["email"];
                        $photo=$row["photo"];
                        $phone=$row["phone"];

                    }
                }
            }

            //mysqli_close($conn);

            ?>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">

                    <form action="" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Firstname</label>
                                <input type="text" class="form-control" name="firstname"
                                    value="<?php echo "$fname"; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="<?php echo "$lname"; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail1">Phone No.</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo "$phone"; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword2">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo "$email"; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail8">Position</label>
                                <input type="text" class="form-control" name="position"
                                    value="<?php echo "$position"; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword9">Salary</label>
                                <input type="text" class="form-control" name="sal" value="<?php echo "$sal"; ?>">
                                <input type="hidden" name="idup" value="<?php echo $n1; ?>">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary" name="btn" value="submit">Submit</button>
                    </form>
                </div>
                <div class="col-sm-2">
                </div>

            </div>
            <?php
        //$lbl=$_GET["btn"];
        // $n1=$_GET["edit"];
        if (isset($_GET["btn"])) {
            $fn = $_GET["firstname"];
            $ln = $_GET["lastname"];
            $sal=$_GET["sal"];
            $position=$_GET["position"];
            $email=$_GET["email"];
            $phone=$_GET["phone"];  
            $n1 = $_GET["idup"];
            $updatequery = "UPDATE `staff` SET `firstname`='$fn',`lastname`='$ln',`email`='$email',`phone`='$phone',
            `position`='$position',`sal`='$sal' WHERE `staff_id`='$n1'";
            if (mysqli_query($con, $updatequery)) {
                echo '<meta http-equiv="refresh" content="0; URL=listStaff.php">';


            } else {
                echo "error" . $updatequery . "<br>" . mysqli_error($con);
            }


        }

        mysqli_close($con);

        ?>


        </div>
    </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
<?php } ?>