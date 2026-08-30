<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments - East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <?php include('header.php'); ?>
    <?php
    if (!isset($_SESSION['name']) || $_SESSION['name'] !== "admin") {
        header('Location: index.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_appoint_id'])) {
        $delete_appoint_id = $_POST['delete_appoint_id'];
        $sql = "DELETE FROM Appoint WHERE appoint_id = {$delete_appoint_id}";
        executeSql($sql);
    }

    $appointments = fetchData("
        SELECT 
        appoint_id,
        Patients.patient_id, 
        Patients.first_name || ' ' || Patients.last_name as PATIENT_NAME, 
        Patients.age, 
        Patients.gender, 
        Patients.email, 
        Patients.address,
        Doctors.doctor_id, 
        Doctors.first_name || ' ' || Doctors.last_name AS doctor_name, 
        Departments.dept_id, 
        Departments.dept_name, 
        Appoint.dateofvisit
        FROM Appoint
        JOIN Patients ON Appoint.patient_id = Patients.patient_id
        JOIN Doctors ON Appoint.doctor_id = Doctors.doctor_id
        JOIN Departments ON Doctors.dept_id = Departments.dept_id
        ORDER BY Appoint.dateofvisit DESC");
    ?>
    <div class="admin">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <h1>Manage Appointments:</h1><br>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Date of Visit</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Doctor Name</th>
                        <th>Department</th>
                        <th width=200px>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo $appointment['DATEOFVISIT']; ?></td>
                        <td><?php echo $appointment['PATIENT_NAME']; ?></td>
                        <td><?php echo $appointment['AGE']; ?></td>
                        <td><?php echo $appointment['GENDER']; ?></td>
                        <td><?php echo $appointment['EMAIL']; ?></td>
                        <td><?php echo $appointment['ADDRESS']; ?></td>
                        <td><?php echo $appointment['DOCTOR_NAME']; ?></td>
                        <td><?php echo $appointment['DEPT_NAME']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_appoint_id" value="<?php echo $appointment['APPOINT_ID']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <br><br><br>
        </div>
    </div>
    <script src="script.js"></script>
    <?php
    include("footer.php");
    oci_close($conn);
    ?>
</body>
</html>
