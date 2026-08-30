<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f8fa;
            margin: 0;
            padding: 0;
        }
        .service-container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }
        .section-title {
            text-align: center;
            font-size: 2rem;
            color: #0a3d62;
            margin-bottom: 20px;
        }
        /* Ambulance Section */
        .ambulance {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            overflow: hidden;
        }
        .ambulance img {
            width: 40%;
            object-fit: cover;
            padding: 100px
        }
        .ambulance-info {
            padding: 20px;
            flex: 1;
        }
        .ambulance-info h2 {
            color: #1e3799;
            margin-bottom: 10px;
        }
        .call-btn {
            background: #38ada9;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .call-btn:hover {
            background: #079992;
        }

        /* Feedback Section */
        .feedback {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        .feedback h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0a3d62;
        }
        .feedback form input, .feedback form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .feedback form button {
            background: #1e3799;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .feedback form button:hover {
            background: #0c2461;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>

    <div class="service-container">
        <!-- Ambulance Service -->
        <h1 class="section-title">Our Services</h1>
        <div class="ambulance">
            <img src="img/ambulance.jpg" alt="Ambulance Service">
            <div class="ambulance-info">
                <h2>24/7 Ambulance Service</h2>
                <p>Our hospital provides 24-hour ambulance service with advanced life support systems. Our trained medical staff ensures that patients receive immediate care on the way to the hospital.</p>
                <a href="tel:+880123456789" class="call-btn">📞 Call Ambulance</a>
            </div>
        </div>

        <!-- Feedback Section -->
        <div class="feedback">
            <h2>Give Us Your Feedback</h2>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Write your feedback here..." required></textarea>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
