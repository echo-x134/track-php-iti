<?php

session_start();



if (!isset($_SESSION["login"]) || $_SESSION["login"] != true) {

    header("Location: login.php?error_message=Please login first");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Users</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        .delete {
            background-color: red;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .update {
            background-color: green;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>

</head>

<body>

<?php require "./home.php"; ?>

<div class="container">

    <h1>All Users Data</h1>

    <table>

        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Actions</th>
        </tr>

        <?php

        foreach ($_SESSION["usersData"] as $index => $user) {

            echo "<tr>";

            echo "<td>" . ($index + 1) . "</td>";

            echo "<td>" . $user["userName"] . "</td>";

            echo "<td>" . $user["userEmail"] . "</td>";

            echo "<td>";

            echo "<a class='delete' href='server.php?delete=" . $index . "'>Delete</a>";

            echo " ";

            echo "<a class='update' href='update.php?id=" . $index . "'>Update</a>";

            echo "</td>";

            echo "</tr>";
        }

        ?>

    </table>

</div>

</body>

</html>