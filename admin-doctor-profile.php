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
    <?php
    if($_SESSION['name'] != "admin"){
        header('Location: index.php');
        exit();
    }
    $doctor_id = $_GET['doctor'];
    $doctorSql = fetchData("select * from doctors join Departments using(dept_id) where doctor_id = {$doctor_id}");
    $doctor = $doctorSql[0];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $sql_last_id = fetchData("SELECT MAX(Patient_id) AS last_id FROM Patients");
        $patient_id = $sql_last_id[0]['LAST_ID'] + 1;
        echo $patient_id;
        executeSql("INSERT INTO Patients (Patient_id, First_name, Last_name, Age, Gender, Address)
                VALUES ({$patient_id}, '{$first_name}', '{$last_name}', '{$age}', '{$gender}', '{$address}')");
        executeSql("INSERT INTO Appoint (patient_id, doctor_id, dateofvisit) VALUES ('{$patient_id}', '{$doctor_id}', TO_DATE('{$_POST['date_of_visit']}', 'YYYY-MM-DD'))");
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
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" placeholder="Enter your age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_visit">Date of Visit:</label><br>
                        <input type="date" name="date_of_visit" id="date_of_visit" required><br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Appointment</button>
                    </div>
                </form>
        </div><br><br><br>
    </div>

</body>
</html>

<?php
include("footer.php");
oci_close($conn);
?>