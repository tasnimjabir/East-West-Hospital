<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up EWU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
<style>
    .verify-message {
        background-color: #f0f8ff;
        border: 1px solid #b3d7ff;
        padding: 100px;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333;
        max-width: 1000px;
        margin: 30px auto;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .verify-message a {
        display: inline-block;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }
    .verify-message a:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>  
<?php
require("connection.php");
require 'env.php';
require 'auth/PHPMailer-master/src/PHPMailer.php';
require 'auth/PHPMailer-master/src/SMTP.php';
require 'auth/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $age = (int) $_POST['age'];
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = trim($_POST['address']);

    $email_sql = escape($email);
    $first_name_sql = escape($first_name);
    $last_name_sql = escape($last_name);
    $gender_sql = escape($gender);
    $address_sql = escape($address);

    // Check if email exists
    $emailSql = fetchData("SELECT Email FROM Patients WHERE Email = '{$email_sql}'");
    if (count($emailSql) > 0) {
        echo "Email already exists. Please use another email.";
    } else {
        // Generate 6-digit token
        $token = rand(100000, 999999);

        // Insert user into DB with token
        $sql = "INSERT INTO Patients (First_name, Last_name, Age, Gender, Email, Passwords, Address, Token, Is_verified)
                VALUES ('{$first_name_sql}', '{$last_name_sql}', {$age}, '{$gender_sql}', '{$email_sql}', '{$password}', '{$address_sql}', '{$token}', 0)";
        executeSql($sql);

        // Send token via Gmail SMTP using App Password
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom(MAIL_USERNAME, 'East West Hospital');
            $mail->addAddress($email, $first_name);

            $mail->isHTML(true);
            $mail->Subject = 'Verify Your Email';
            $mail->Body    = "<p>Dear {$first_name},</p>
                              <p>Your email verification token is: <b>{$token}</b></p>
                              <p>Enter this token in the website to verify your email.</p>";

            $mail->send();

            // Save email in session to use in verify.php
            $_SESSION['email'] = $email;
            echo "
<div class='verify-message'>
    Token sent to your email.<br>
    <a href='verify.php'>Verify Here</a>
</div>
";

            exit();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

    <div class="signup-page">
        <div class="form-container">
            <h1>Sign Up</h1>
            <form method="POST" action="signup.php">
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
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter a strong password" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php oci_close($conn); ?>