<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="login.css">
   
</head>

<body>

  <div class="login-box">
    <h2>Login</h2>

    <form action="index.php" method="POST">
      <div class="input-box">
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required>
      </div>

      <div class="input-box">
        <label>Password</label>
        <input type="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="login-btn">
        Login
      </button>

      <a href="#" class="forgot">Forgot Password?</a>

      <p class="signup">
        Don't have an account?
        <a href="#">Sign Up</a>
      </p>
    </form>
  </div>

</body>
</html></body>
</html>