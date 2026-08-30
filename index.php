<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>

    <div class="cover">
        <div class="main">
            <h1>SMART HEALTHCARE SOLUTION</h1>
            <div class="boxes">
                <a href="doctors.php?department=10"><div>Emergency</div></a>
                <a href="department.php"><div>Departments</div></a>
                <a href="doctors.php"><div>Find a Doctor</div></a>
                <a href="service.php"><div>Services</div></a>
                <a href="payment.php"><div>Payment</div></a>
                <a href="contact.php"><div>Contact</div></a>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
include("footer.php");
oci_close($conn);
?>
