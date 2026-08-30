<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors: East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.png">
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>
    <div class="main">
        <br><h1>Our Departments: </h1><br>
        <div class="dept_wrap">
        <?php
        $deptlist = fetchData("SELECT * FROM Departments order by dept_id");
        foreach($deptlist as $dept){
            echo "<h2><a href='doctors.php?departments=". $dept["DEPT_ID"]."'>".$dept['DEPT_NAME']."</a></h2>";
        }
        ?>
        </div>
    </div><?php include("footer.php"); ?>

</body>
</html>

<?php oci_close($conn); ?>