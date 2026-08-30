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
    <?php
    $doctor_id = $_GET['doctor'];
    $doctorSql = fetchData("select * from doctors join Departments using(dept_id) where doctor_id = {$doctor_id}");
    $doctor = $doctorSql[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date_of_visit'])) {
        if(isset($_SESSION['patient_id'])){
        $sql = "INSERT INTO Appoint (patient_id, doctor_id, dateofvisit) VALUES ({$_SESSION['patient_id']}, {$doctor_id}, TO_DATE('{$_POST['date_of_visit']}', 'YYYY-MM-DD'))";
        executeSql($sql);
        }else{
            header('Location: login.php');
            exit();
        }
    }
    ?>
    <div class="main">
        <div class="doctor-profile">
            <h1><?php echo $doctor['FIRST_NAME']." ".$doctor['LAST_NAME'] ?></h1><hr><br>
            <P>Department: <b><?php echo $doctor['DEPT_NAME'];?></b></P>
            <P>Qualification: <b><?php echo $doctor['QUALIFICATION']; ?></b></P>
            <P>Email: <b><?php echo $doctor['EMAIL'];?></b></P>
        </div>
        <br><br>
        <hr><br>
        <div class="admin-form">
                <h2>Add Appointment:</h2><br>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="date_of_visit">Date of Visit:</label><br>
                        <input type="date" name="date_of_visit" id="date_of_visit" required><br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Appointment</button>
                    </div>
                </form>
        </div>
    </div>

</body>
</html>

<?php
include("footer.php");
oci_close($conn);
?>