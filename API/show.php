<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show live data</title>
</head>
<body>
    <table>
    <thead>
    <td>eid</td>
    <td>date</td>
    <td>time</td>
    </thead>
    <tbody>
    <?php 
    require("../connect.php");
    $query = "select * from attendance";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["eid"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
    }
    ?>
    </tbody>
    </table>
</body>
</html>