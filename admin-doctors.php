<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors - East West Hospital</title>
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
            executeSql("DELETE FROM Doctors WHERE doctor_id = {$_POST['delete_id']}");
        }
        else if (isset($_POST['update_id'], $_POST['column_name'], $_POST['column_value'])) {
            executeSql("UPDATE Doctors SET {$_POST['column_name']} = '{$_POST['column_value']}' WHERE doctor_id = {$_POST['update_id']}");
        }
        else{
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $dept_id = $_POST['dept_id'];
            $qualification = $_POST['qualification'];
            $email = $_POST['email'];
            $sql = "INSERT INTO Doctors (first_name, last_name, dept_id, qualification, email) 
                    VALUES ('{$first_name}', '{$last_name}', {$dept_id}, '{$qualification}', '{$email}')";
            executeSql($sql);
        }
    }
    
    $doctorList = fetchData("SELECT * FROM Doctors
                             JOIN Departments using(dept_id)
                             ORDER BY doctor_id");

    $departmentList = fetchData("SELECT * FROM Departments ORDER BY dept_id");
    ?>
    
    <div class="admin">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <h1>Doctors:</h1><br>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Qualification</th>
                        <th>Email</th>
                        <th width=200px></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctorList as $doctor): ?>
                    <tr>
                        <td title="id: <?php echo $doctor['DOCTOR_ID']?>"><?php echo $doctor['FIRST_NAME']." ".$doctor['LAST_NAME']; ?></td>
                        <td><?php echo $doctor['DEPT_NAME']; ?></td>
                        <td><?php echo $doctor['QUALIFICATION']; ?></td>
                        <td><?php echo $doctor['EMAIL']; ?></td>
                        <td>
                            <button onclick="showUpdateForm(<?php echo $doctor['DOCTOR_ID']; ?>)">Update</button>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $doctor['DOCTOR_ID']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</button>
                            </form>

                            <button><a href='<?php echo "admin-doctor-profile.php?doctor=" . $doctor['DOCTOR_ID']?>'>Appoint</a></button>

                            <div id="update-form-<?php echo $doctor['DOCTOR_ID']; ?>" style="display:none; margin-top:10px;">
                                <form method="POST" action="">
                                    <input type="hidden" name="update_id" value="<?php echo $doctor['DOCTOR_ID']; ?>">
                                    <select name="column_name" required>
                                        <option value="" disabled selected>Select Column</option>
                                        <option value="first_name">First Name</option>
                                        <option value="last_name">Last Name</option>
                                        <option value="dept_id">Department</option>
                                        <option value="qualification">Qualification</option>
                                        <option value="email">Email</option>
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
            <div class="admin-form">
                <h2>Add Doctor:</h2><br>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="first_name">First Name:</label><br>
                        <input type="text" name="first_name" id="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label><br>
                        <input type="text" name="last_name" id="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="dept_id">Department:</label><br>
                        <select name="dept_id" id="dept_id" required>
                            <option value="" disabled selected>Select Department</option>
                            <?php foreach ($departmentList as $department): ?>
                                <option value="<?php echo $department['DEPT_ID']; ?>">
                                    <?php echo $department['DEPT_NAME']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qualification">Qualification:</label><br>
                        <input type="text" name="qualification" id="qualification" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" id="email" required><br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Doctor</button>
                    </div>
                </form>
            </div>
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
