<?php
session_start();
include('dbconnect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HR Module</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <div class="main_content" style="margin-top: 30px;">
            <h2 style="text-align:center">Salary Calculation</h2><br>
            <hr>

            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1">
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <form action="" method="post" id="my-form1">
                        <div class="form-group"><br><br>
                            <label for="name">Employee ID:</label>
                            <input type="text" class="form-control" id="langname" placeholder="Enter Employee ID" name="id">
                        </div>
                        <button type="submit" class="btn btn-primary align-right" name="btn" value="check">Check</button>

                    </form>
                    <pre id="result"></pre>
                    <?php
                    if (isset($_POST["btn"]) && !empty($_POST["btn"])) {
                        $id = $_POST["id"];
                        $sql = "SELECT * FROM emp WHERE empid=$id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $_SESSION['id'] = $_POST['id'];
                                $_SESSION['fname'] = $row['fname'];
                                $_SESSION['lname'] = $row['lname'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['position'] = $row['position'];
                    ?>

                                <hr>
                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">
                                        <h4 class="card-title">Employee Details</h4>
                                        <img src='img.png' height="150" width="150" style="border-radius: 50%;"><br><br>
                                        <h5 class="card-subtitle mb-2 text-muted">First name: <?php echo $row['fname']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Last name: <?php echo $row['lname']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Address: <?php echo $row['address']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Date of Birth: <?php echo $row['dob']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Contact number: <?php echo $row['contact']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Email: <?php echo $row['email']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Desgination: <?php echo $row['position']; ?></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">Salary: <?php echo $row['salary']; ?></h5>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>

                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <form action="" method="post" id="my-form">
                        <div class="form-group"><br><br>
                            <label for="name">Salary:</label>
                            <input type="text" class="form-control" id="langname" placeholder="Enter Salary" name="salary">
                        </div>
                        <div class="form-group">
                            <label for="name">PF Percentage:</label>
                            <input type="text" class="form-control" id="langname" placeholder="Enter PF Percentage" name="pf">
                        </div>
                        <button type="submit" class="btn btn-primary align-right" name="btnn" value="calc">Calculate</button>

                    </form>
                    <pre id="result"></pre>
                    <?php
                    if (isset($_POST["btnn"]) && !empty($_POST["btnn"])) {
                        $id1 = $_SESSION['id'];
                        $sal = $_POST["salary"];
                        $_SESSION['sal'] = $sal;
                        $pf = $_POST["pf"];
                        $_SESSION['pf'] = $pf;
                        $ded = ($pf / 100) * $sal;
                        $netsal = $sal - $ded;
                        $_SESSION['netsal'] = $netsal;
                        $insertQuery = "INSERT INTO staffsalary(empid,salary,pfpercent,netsal) VALUES ('$id1','$sal','$pf','$netsal')";
                        if (mysqli_query($conn, $insertQuery)) {
                    ?>

                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                </div>
            </div>

            <div class="row">
                <div class="col-2 col-md-2 col-lg-2"></div>
                <div class="col-8 col-md-8 col-lg-8 table-responsive">
                    <h4>Salary Details</h4>
                    <table class="table table-bordered">
                        <?php
                            $fname = $_SESSION['fname'];
                            $lname = $_SESSION['lname'];
                            $email = $_SESSION['email'];
                            $position = $_SESSION['position'];
                            $sal = $_SESSION['sal'];
                            $pf = $_SESSION['pf'];
                            $netsal = $_SESSION['netsal'];
                        ?>
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>PF Percentage</th>
                                <th>Net Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $fname; ?></td>
                                <td><?php echo $lname; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $position; ?></td>
                                <td><?php echo $sal; ?></td>
                                <td><?php echo $pf; ?></td>
                                <td><?php echo $netsal; ?></td>
                            </tr>
                        </tbody><br>
                    </table>
                </div>
        <?php
                        } else {
                            echo "error" . $insertQuery . "<br>" . mysqli_error($conn);
                        }
                    }
        ?>
        <div class="col-3 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </div>
    <script>
        function yesnoCheck(that) {
            if (that.value == "short") {
                document.getElementById("ifYes").style.display = "block";
            } else {
                document.getElementById("ifYes").style.display = "none";

            }
            if (that.value == "long") {
                document.getElementById("long").style.display = "block";
            } else {
                document.getElementById("long").style.display = "none";

            }

            if (that.value == "whole") {
                document.getElementById("whole").style.display = "block";

            } else {
                document.getElementById("whole").style.display = "none";

            }

        }
    </script>




</body>

</html>