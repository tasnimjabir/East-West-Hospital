<?php 
require("connection.php");

$form = true;
$message = "";

if(isset($_POST['verify'])){
    $email = $_SESSION['email'];
    $token = $_POST['token'];

    $sql = "SELECT * FROM Patients WHERE Email='{$email}' AND Token='{$token}' AND Is_verified=0";
    $result = fetchData($sql);

    if(count($result) > 0){
        executeSql("UPDATE Patients SET Is_verified=1, Token=NULL WHERE Email='{$email}'");
        $message = "<div class='success'>✅ Email verified successfully! You can now <a href='login.php'>Login</a></div>";
        $form = false;
    } else {
        $message = "<div class='error'>❌ Invalid token.</div>";
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .verify-container {
        max-width: 400px;
        margin: 60px auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
    }
    .verify-container h2 {
        margin-bottom: 20px;
        color: #333;
    }
    input[type="text"] {
        width: 90%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    button {
        margin-top: 15px;
        background: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.3s;
    }
    button:hover {
        background: #0056b3;
    }
    .success {
        background: #d4edda;
        color: #155724;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 15px;
    }
    .success a {
        color: #155724;
        font-weight: bold;
        text-decoration: underline;
    }
    .error {
        background: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 15px;
    }
</style>

<div class="verify-container">
    <h2>Email Verification</h2>
    <?php echo $message; ?>

    <?php if($form): ?>
        <form method="POST">
            <input type="text" name="token" placeholder="Enter your pin" required><br>
            <button type="submit" name="verify">Verify Email</button>
        </form>
    <?php endif; ?>
</div>
