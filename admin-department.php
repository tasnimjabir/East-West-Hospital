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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['delete_id'])){
            executeSql("DELETE FROM Departments WHERE dept_id = {$_POST['delete_id']}");
        }
        else if(isset($_POST['update_id'], $_POST['column_name'], $_POST['column_value'])){
            executeSql("UPDATE Departments SET {$_POST['column_name']} = '{$_POST['column_value']}' WHERE dept_id = {$_POST['update_id']}");
        }
        else{
            executeSql("INSERT INTO Departments (dept_name)
                        VALUES ('{$_POST['dept_name']}')");
        }
    }
    ?>
    <div class="admin">
    <?php include('sidebar.php'); ?>
        <div class="content">

            <h1>Departments:</h1><br>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th width=200px></th>
                    </tr>
                </thead>
                <?php
                $deptlist = fetchData("SELECT * FROM Departments order by dept_id");
                if(count($deptlist)>0){
                    foreach($deptlist as $dept):?>
                        <tr>
                            <td title="id: <?php echo $dept['DEPT_ID']?>"><?php echo $dept['DEPT_NAME']?></td>
                            <td>
                                <button onclick="showUpdateForm(<?php echo $dept['DEPT_ID']; ?>)">Update</button>
                                
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?php echo $dept['DEPT_ID']; ?>">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                                </form>
                                
                                <div id="update-form-<?php echo $dept['DEPT_ID']; ?>" style="display:none; margin-top:10px;">
                                    <form method="POST" action="">
                                        <input type="hidden" name="update_id" value="<?php echo $dept['DEPT_ID']; ?>">
                                        <select name="column_name" required>
                                            <option value="" disabled selected>Select Column</option>
                                            <option value="dept_name">Department Name</option>
                                        </select><br>
                                        <input type="text" name="column_value" placeholder="Enter New Value" required><br>
                                        <button type="submit" class="ok">OK</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;
                }
                else echo "<tr><td colspan = '3'><h1>No Doctor</h1></td></tr>";?>

            </table>
            <br>
        <div class="admin-form">
            <h2>Add Department:</h2><br>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="dept_name">Department Name:</label><br>
                    <input type="text" name="dept_name" id="dept_name" required><br><br>
                </div>
                <div class="form-group">
                <button type="submit">Add Department</button>
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