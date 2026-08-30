<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients - East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <?php include('header.php'); ?>
    <?php 
    if ($_SESSION['name'] != "admin") {
        header('Location: index.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete_id'])) {
            executeSql("DELETE FROM Patients WHERE Patient_id = {$_POST['delete_id']}");
        }
        else if (isset($_POST['update_id'], $_POST['column_name'], $_POST['column_value'])) {
            executeSql("UPDATE Patients SET {$_POST['column_name']} = '{$_POST['column_value']}' WHERE Patient_id = {$_POST['update_id']}");
        }
    }
    $PatientList = fetchData("select * from Patients order by Patient_id");
    ?>
    
    <div class="admin">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <h1>Patients:</h1><br>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th width=200px></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($PatientList as $Patient): ?>
                    <tr>
                        <td><?php echo $Patient['FIRST_NAME']." ".$Patient['LAST_NAME']; ?></td>
                        <td><?php echo $Patient['AGE']; ?></td>
                        <td><?php echo $Patient['GENDER']; ?></td>
                        <td><?php echo $Patient['EMAIL']; ?></td>
                        <td><?php echo $Patient['ADDRESS']; ?></td>
                        <td>
                            <button onclick="showUpdateForm(<?php echo $Patient['PATIENT_ID']; ?>)">Update</button>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $Patient['PATIENT_ID']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Patient?');">Delete</button>
                            </form>

                            <div id="update-form-<?php echo $Patient['PATIENT_ID']; ?>" style="display:none; margin-top:10px;">
                                <form method="POST" action="">
                                    <input type="hidden" name="update_id" value="<?php echo $Patient['PATIENT_ID']; ?>">
                                    <select name="column_name" required>
                                        <option value="" disabled selected>Select Column</option>
                                        <option value="first_name">First Name</option>
                                        <option value="last_name">Last Name</option>
                                        <option value="age">Age</option>
                                        <option value="Gender">Gender</option>
                                        <option value="Email">Email</option>
                                        <option value="Address">Address</option>
                                    </select><br>
                                    <input type="text" name="column_value" placeholder="Enter New Value" required>
                                    <button type="submit" class="ok">OK</button>
                                </form>
                            </div>
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
