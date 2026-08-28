<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

</head>

<body>
    <?php require "./index.php";
    
     if(isset($_GET["errorMessage"]))
        {
         echo "<p class=' mt-5 alert alert-danger w-75 m-auto text-center'>". $_GET["errorMessage"]."</p>";
        }
    ?>
    
    
    
    ?>
    <section class="m-3">
        <form action="server.php" method="post" class="border border-primary w-75 m-auto p-5">
            <input class="form-control m-3" type="text" name="userName" id="" placeholder="Enter Your Name">

            <input class="form-control  m-3" type="email" name="userEmail" id="" placeholder="Enter Your Email">

            <input class="form-control  m-3" type="password" name="userPassword" id="" placeholder="Enter Your Password">

            <input class="btn btn-primary" type="submit" value="Register" name="btn-register">
        </form>
    </section>
</body>

</html>