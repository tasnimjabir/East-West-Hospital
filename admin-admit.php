<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admitions - East West Hospital</title>
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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_Admit_id'])) {
            $delete_Admit_id = $_POST['delete_Admit_id'];
            $sql = "DELETE FROM Admit WHERE Admit_id = {$delete_Admit_id}";
            executeSql($sql);
        }else{
        $doctor_id = $_POST['doctor_id'];
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
        executeSql("INSERT INTO Admit (patient_id, doctor_id, AdmmitDate, Room_no) VALUES ('{$patient_id}', '{$doctor_id}', TO_DATE('{$_POST['AdmmitDate']}', 'YYYY-MM-DD'), '{$_POST['Room_no']}')");
    }
    }

    $Admitions = fetchData("
        SELECT 
        Admit_id,
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
        Admit.AdmmitDate,
        Admit.Room_no
        FROM Admit
        JOIN Patients ON Admit.patient_id = Patients.patient_id
        JOIN Doctors ON Admit.doctor_id = Doctors.doctor_id
        JOIN Departments ON Doctors.dept_id = Departments.dept_id
        ORDER BY Admit.AdmmitDate DESC");
    $doctors = fetchData("
        SELECT doctor_id, first_name || ' ' || last_name AS doctor_name, dept_name
        FROM Doctors
        JOIN Departments using(dept_id)
        ORDER BY first_name
    ");
    ?>
    <div class="admin">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <div class="admin-form">
                <h2>Admit Patient:</h2><br>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="doctor_id">Doctor:</label><br>
                        <select name="doctor_id" id="doctor_id" required>
                            <option value="" disabled selected>Select Doctor</option>
                            <?php foreach ($doctors as $doctor): ?>
                            <option value="<?php echo $doctor['DOCTOR_ID']; ?>">
                                <?php echo $doctor['DOCTOR_NAME'] . ' (' . $doctor['DEPT_NAME'] . ')'; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
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
                        <label for="AdmmitDate">Admit Date:</label><br>
                        <input type="date" name="AdmmitDate" id="AdmmitDate" required><br><br>
                    </div>
                    <div class="form-group">
                        <label for="AdmmitDate">Room no:</label><br>
                        <input type="text" name="Room_no" id="Room_no" required><br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Admit</button>
                    </div>
                </form>
        </div><br><br><br>
            <h1>Admited Patients:</h1><br>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Admmit Date</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Doctor Name</th>
                        <th>Department</th>
                        <th>Room no</th>
                        <th width=200px></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Admitions as $Admit): ?>
                    <tr>
                        <td><?php echo $Admit['ADMMITDATE']; ?></td>
                        <td><?php echo $Admit['PATIENT_NAME']; ?></td>
                        <td><?php echo $Admit['AGE']; ?></td>
                        <td><?php echo $Admit['GENDER']; ?></td>
                        <td><?php echo $Admit['EMAIL']; ?></td>
                        <td><?php echo $Admit['ADDRESS']; ?></td>
                        <td><?php echo $Admit['DOCTOR_NAME']; ?></td>
                        <td><?php echo $Admit['DEPT_NAME']; ?></td>
                        <td><?php echo $Admit['ROOM_NO']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_Admit_id" value="<?php echo $Admit['ADMIT_ID']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Admit?');">Delete</button>
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
