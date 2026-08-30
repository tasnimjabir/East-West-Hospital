<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - East West Hospital</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }

        .payment-container {
            max-width: 800px;
            margin: 200px auto;
            background: white;
            padding: 25px 100px;
            border-radius: 10px;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0073aa;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: #0073aa;
            background: #f0f8ff;
        }

        .payment-option img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: contain;
        }

        .payment-option span {
            font-size: 18px;
            font-weight: bold;
        }

        .methods {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .method {
            flex: 1;
            margin: 0 8px;
            padding: 15px;
            background: #e8e8e8;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }
        .method:hover {
            background: #d6d6d6;
        }
        .method.active {
            background: #4CAF50;
            color: white;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
        }

        .payment-container button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: #0073aa;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .payment-container button:hover {
            background: #005f88;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <?php include('menu.php'); ?>

<div class="payment-container">
    <h2>Choose Payment Method</h2>
    <div class="methods">
        <div class="method" onclick="selectMethod(this)">Bkash</div>
        <div class="method" onclick="selectMethod(this)">Nagad</div>
        <div class="method" onclick="selectMethod(this)">Bank</div>
    </div>
    <button>Proceed to Payment</button>
</div>

    <script>
        function selectMethod(selected) {
        document.querySelectorAll('.method').forEach(m => m.classList.remove('active'));
        selected.classList.add('active');
    }
    </script>

</body>
</html>

<?php include("footer.php"); ?>