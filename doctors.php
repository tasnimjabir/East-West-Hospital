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
        <?php
            $doctorlist = "";
            $dept_name = "";
            if(isset($_GET['department'])){
                $doctorlist = fetchData("SELECT * FROM Doctors JOIN Departments using (dept_id) WHERE dept_id = {$_GET['department']} order by doctor_id");
                $dept_sql = fetchData("SELECT * FROM Departments WHERE dept_id = {$_GET['department']}");
                $dept_name = " of ".$dept_sql[0]['DEPT_NAME'];
            }else{
                $doctorlist = fetchData("SELECT * FROM Doctors JOIN Departments using (dept_id) order by doctor_id");
            }
        ?>
        <div class="doctorList_wrap">
            <div>
                <br>
                <h1>Doctors<?php echo $dept_name; ?>:</h1>
                <br>
            </div>
            <table class="doctorList">
                <thead>
                <tr>
                    <th>Name</th>
                    <?php if(!isset($_GET['department'])):?>
                        <th>Depertment</th>
                    <?php endif?>
                    <th>Appoint</th>
                </tr>
                </thead>
                <?php 
                if(count($doctorlist)>0){
                    foreach($doctorlist as $doctor):?>
                        <tbody>
                            <tr>
                                <td>
                                    <h2><a href='<?php echo "doctor-profile.php?doctor=" . $doctor['DOCTOR_ID']?>'> <?php echo $doctor['FIRST_NAME'] . " " . $doctor['LAST_NAME']?> </a></h2>
                                    <p> Qualifications: <?php echo $doctor['QUALIFICATION'] ?></p>
                                    <p> Department: <?php echo $doctor['DEPT_NAME'] ?></p>
                                </td>
                                <?php if(!isset($_GET['department'])):?>
                                    <td style='text-align:center;'><h3><a href='<?php echo "doctors.php?department=". $doctor["DEPT_ID"]?>'><?php echo $doctor["DEPT_NAME"]?></a></h3></td>
                                <?php endif?>
                                <td class='appoint'><button><a href='<?php echo "doctor-profile.php?doctor=" . $doctor['DOCTOR_ID']?>'>Appoint</a></button></td>
                            </tr>
                        </tbody>
                <?php endforeach;
                }
                else echo "<tr><td colspan = '3'><h1>No Doctor</h1></td></tr>";
                ?>
            </table>
        </div>
    </div>
    <?php include("footer.php"); ?>

</body>
</html>

<?php oci_close($conn); ?>