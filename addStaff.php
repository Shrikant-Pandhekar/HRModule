<?php session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.html');
}
else{ 
    if(isset($_POST['submit']))
    {
        $firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
		$address = $_POST['address'];
		$dob = $_POST['DOB'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
		$position = $_POST['position'];
		$sal = $_POST['sal'];
        $filename = $_FILES['photo']['name'];
  
        $extension = substr($filename,strlen($filename)-4,strlen($filename));
        $allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".PNG");
        $imgnewfile=($filename).$extension;
       


        //creating staffid
		$letters = 'S';
		$numbers = '';
		 
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
        $staff_id = $letters.substr(str_shuffle($numbers), 0, 3);
        
        if(!in_array($extension,$allowed_extensions))
        {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        else
        {       
 
            move_uploaded_file($_FILES["photo"]["tmp_name"],"profilePhoto/".$imgnewfile);
            $query=mysqli_query($con,"insert into staff (staff_id, firstname, lastname, address, dob, gender, email, phone, position, sal, photo) values ('$staff_id', '$firstname', '$lastname', '$address', '$dob', '$gender', '$email' , '$phone' , '$position', '$sal', '$imgnewfile')");
                
                mysqli_query($con, $query);
                $last = mysqli_insert_id($con);
            $sid = mysqli_query($con,"SELECT staff_id FROM staff where id='$last'");
            while($row=mysqli_fetch_array($sid))
            {
                echo '<script> alert("Staff Member successfully inserted with staff id : "+"' . $row['staff_id']. '")</script>';
            }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Staff | Add Staff</title>

    <!-- Icons font CSS-->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link href="css/addStaff.css" rel="stylesheet" media="all">
      <link href="style.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   
</head>

<body>
     <div class="wrapper">
     <?php include("navbar.php");?>
     </div>
    <div class="main_content" class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" style="
    margin-top: 100px;
    margin-left: 300px;">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Add Staff Member</h2>
                    <form method="post"  enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                               <label class="label">Addess</label>
                               <input class="input--style-4" type="text" name="address">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">DOB</label>
                                    <input type="date" name="DOB">
                                    <div class="input-group-icon">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio"  name="gender"  value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender"  value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Position</label>
                                    <input class="input--style-4" type="text" name="position">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Salary</label>
                                    <input class="input--style-4" type="text" name="sal">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="exampleFormControlFile1" class="label">Photo</label>
                            <input type="file" class="form-control-file" name="photo"  id="exampleFormControlFile1">
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Vendor JS-->
 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
 
<!-- end document-->
<?php } ?>