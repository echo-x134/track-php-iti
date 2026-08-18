<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>

  <div class="register-box">

    <h2>Create Account</h2>

    <form action="index.php" method="POST">

      <div class="input-box">
        <label>Full Name</label>
        <input type="text" placeholder="Enter your full name" required>
      </div>

      <div class="input-box">
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required>
      </div>

      <div class="input-box">
        <label>Password</label>
        <input type="password" placeholder="Create a password" required>
      </div>

      <div class="input-box">
        <label>Confirm Password</label>
        <input type="password" placeholder="Confirm your password" required>
      </div>

      <button type="submit" class="register-btn">
        Register
      </button>

    </form>

    <p class="login">
      Already have an account?
      <a href="index.html">Login</a>
    </p>

  </div>

</body>
</html>

</body>
</html>