<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Rooms - East West Hospital</title>
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
            executeSql("DELETE FROM Room WHERE room_no = {$_POST['delete_id']}");
        }
        else if (isset($_POST['update_id'], $_POST['column_name'], $_POST['column_value'])) {
            executeSql("UPDATE Room SET {$_POST['column_name']} = '{$_POST['column_value']}' WHERE room_no = {$_POST['update_id']}");
        }
        else{
            executeSql("INSERT INTO Room (room_no, cost) VALUES ({$_POST['room_no']}, {$_POST['cost']})");
        }
    }
    
    $roomList = fetchData("SELECT * FROM Room ORDER BY room_no");
    ?>
    <div class="admin">
        <?php include('sidebar.php'); ?>
        <div class="content">
            <h1>Rooms:</h1><br>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Cost</th>
                        <th width=200px></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roomList as $room): ?>
                    <tr>
                        <td><?php echo $room['ROOM_NO']; ?></td>
                        <td><?php echo $room['COST']; ?></td>
                        <td>
                            <button onclick="showUpdateForm(<?php echo $room['ROOM_NO']; ?>)">Update</button>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $room['ROOM_NO']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this room?');">
                                    Delete
                                </button>
                            </form>
                            <div id="update-form-<?php echo $room['ROOM_NO']; ?>" style="display:none; margin-top:10px;">
                                <form method="POST" action="">
                                    <input type="hidden" name="update_id" value="<?php echo $room['ROOM_NO']; ?>">
                                    <select name="column_name" required>
                                        <option value="" disabled selected>Select Column</option>
                                        <option value="room_no">Room Number</option>
                                        <option value="cost">Cost</option>
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
                <h2>Add Room:</h2><br>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="room_no">Room Number:</label><br>
                        <input type="number" name="room_no" id="room_no" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost:</label><br>
                        <input type="number" name="cost" id="cost" required><br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Room</button>
                    </div>
                </form>
            </div>
            <br><br><br>
        </div>
        <script src="script.js"></script>
    </div>
    <?php
    include("footer.php");
    oci_close($conn);
    ?>
</body>
</html>
