<?php
require_once('./config/loader.php');
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <!-- signup -->
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form method="post" action="./actions/signup.php">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icons"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icons"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email to registration</span>
        <input type="text" name="username" placeholder="userName">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="mobile" placeholder="MobileNumber">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="signup">Sign Up</button>
      </form>
    </div>

    <!-- signin -->
    <div class="form-container sign-in">
      <form method="post" action="./actions/login.php">
        <h1>Sign In</h1>
 <br>
            <span>or use your email/password</span>
            <input type="text" name="key" placeholder="Mobile / Username / Email">
            <input type="password" name="password" placeholder="Password">
            <a href="#">Forget your Password?</a>
            <div style="display: inline;">
                <button type="submit" name="login"> Sign In</button>
                <a style="margin-left: 15px" href="otp.php">Send OTP</a>        
            </div>
            <?php
                session_start();
                if (isset($_SESSION['login success'])){
                  echo "<div class='alert alert-success'>{$_SESSION['login success']}</div>";
                  unset($_SESSION['login success']);
                }elseif(isset($_SESSION['login fail'])){
                  echo "<div class='alert alert-danger'>{$_SESSION['login fail']}</div>";
                  unset($_SESSION['login fail']);
                }
                ?>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your Personal details to use all of site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your Personal details to use all of site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="./assets/script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>