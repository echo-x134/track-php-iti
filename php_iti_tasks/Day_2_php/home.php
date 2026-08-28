<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }

        nav a:hover {
            color: yellow;
        }

        .content {
            text-align: center;
            margin-top: 100px;
        }

        .content h1 {
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>

    <div class="content">
        <h1>Welcome To Home Page</h1>
        
    </div>

</body>

</html>