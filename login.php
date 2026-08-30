<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sgn Up EWU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
    <style> 
    </style>
</head>
<body>
    <?php
    require("connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $adminPasswordHash = '$2y$10$zT4s9ff.VCGvqFIQR7XsMODgJUPy2pEBCWXrXfklMXKfJYA9fLiOS';
        if ($email === 'admin' && password_verify($password, $adminPasswordHash)) {
            $_SESSION['name'] = 'admin';
            header('Location: admin-department.php');
            exit();
        }

        $email_sql = escape($email);
        $patient = fetchData("SELECT Patient_id, First_name, Last_name, Passwords FROM Patients WHERE Email = '{$email_sql}'");

        if (count($patient) > 0) {
            $storedPassword = $patient[0]['PASSWORDS'];
            $passwordIsValid = false;

            if (!empty($storedPassword)) {
                if (password_verify($password, $storedPassword)) {
                    $passwordIsValid = true;
                } elseif ($password === $storedPassword) {
                    $passwordIsValid = true;
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    executeSql("UPDATE Patients SET Passwords = '" . escape($newHash) . "' WHERE Patient_id = " . (int)$patient[0]['PATIENT_ID']);
                }
            }

            if ($passwordIsValid) {
                $_SESSION['patient_id'] = $patient[0]['PATIENT_ID'];
                $_SESSION['name'] = $patient[0]['FIRST_NAME'] . ' ' . $patient[0]['LAST_NAME'];
                header('Location: index.php');
                exit();
            }
        }

        echo "Invalid email or password";
    }
    ?>
    <div class="signup-page">
        <div class="form-container">
        <h1>Login</h1>
            <?php if (!empty($error)) echo "<p class='message'>$error</p>"; ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php oci_close($conn); ?>