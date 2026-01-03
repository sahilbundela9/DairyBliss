<?php
    include('header.php');
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DairyBliss</title>
    <style>
        body {
            font-family: 'Alata', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        header {
            text-align: center;
            padding: 20px;
            background: #008000;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .content {
            padding: 20px;
            color: #008000;
            line-height: 1.8;
        }
        .content h2 {
            color: #008000;
        }
        .team {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .team-member {
            text-align: center;
            padding: 15px;
            width: 250px;
        }
        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background: #008000;
            color: white;
            border-radius: 0 0 10px 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
        <header>
            <h1>About DairyBliss</h1>
        </header>
        <div class="content">
            <h2>Who We Are</h2>
            <p>DairyBliss is a premium dairy product platform that ensures fresh, organic, and high-quality dairy products reach your doorstep. We focus on sustainability, ethical sourcing, and providing the best customer experience.</p>
            
            <h2>Our Mission</h2>
            <p>Our mission is to revolutionize the dairy industry by offering farm-fresh, chemical-free products directly from farmers to consumers. We aim to make dairy consumption healthier and more convenient.</p>
            
            <h2>Why Choose Us?</h2>
            <ul>
                <li>100% Organic & Fresh Products</li>
                <li>Direct Sourcing from Trusted Farmers</li>
                <li>Hygienic and Sustainable Practices</li>
                <li>Convenient Home Delivery</li>
                <li>Affordable and Transparent Pricing</li>
            </ul>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2025 DairyBliss. All Rights Reserved.</p>
        </div>
    </div>
    </div>
</body>
</html>
