<?php

require "./connection.php";
require './index.php';

$allUsers = $db->index("users");
   if(empty($allUsers))

        {
            header("location:allUsers?message=NoData");
            exit;

        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>



    <?php 
 
    foreach ($allUsers as $user): ?>

        <tr>
            <td>
                <?= $user["id"] ?>
            </td>

            <td>
                <?= $user["name"] ?>
            </td>

            <td>
                <?= $user["email"] ?>
            </td>

            <td>
                <a href="edit.php?id=<?= $user["id"] ?>">Edit</a>
                <a href="delete.php?id=<?= $user["id"] ?>">Delete</a>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>

</body>
</html>