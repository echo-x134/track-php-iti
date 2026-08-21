<?php

session_start();



if (empty($_SESSION["usersData"])) {

    header("Location: register.php?error_message=Please register first");
    exit;
}




if (isset($_GET["message"])) {

    echo "<p style='color:green; text-align:center;'>";
    echo $_GET["message"];
    echo "</p>";
}

if (isset($_GET["error_message"])) {

    echo "<p style='color:red; text-align:center;'>";
    echo $_GET["error_message"];
    echo "</p>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .login {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php require "./home.php"; ?>

    <div class="login">

        <h2>Login</h2>

        <form action="server.php" method="POST">

    <input
        type="email"
        name="userEmail"
        placeholder="Enter Email"
        required>

    <input
        type="password"
        name="userPassword"
        placeholder="Enter Password"
        required>

    <button type="submit" name="btn-login">
        Login
    </button>

</form>
    </div>

</body>

</html>