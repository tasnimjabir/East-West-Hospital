<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .contact-container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .contact-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd;
        }
        .contact-info {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .info-box {
            background: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            width: 250px;
            text-align: center;
        }
        form {
            display: grid;
            gap: 15px;
        }
        input, textarea {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 16px;
        }
        input:focus, textarea:focus {
            border-color: #0d6efd;
        }
        button {
            padding: 12px;
            background: #0d6efd;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #084298;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>

    <div class="contact-container">
        <h1>Contact Us</h1>

        <div class="contact-info">
            <div class="info-box">
                <h3>📍 Address</h3>
                <p>East West Hospital, Dhaka, Bangladesh</p>
            </div>
            <div class="info-box">
                <h3>📞 Phone</h3>
                <p>+880 1797946311</p>
            </div>
            <div class="info-box">
                <h3>📧 Email</h3>
                <p>info@ewhospital.com</p>
            </div>
        </div>

        <form action="send_contact.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
