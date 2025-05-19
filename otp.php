<?php
require_once('config/loader.php');
session_start();

if (isset($_POST['otpsubmit'])){
  try{
      $mobileNum = trim(htmlspecialchars($_POST['otpInput']));

      $query = "SELECT * FROM `users` WHERE mobile = ?";

      // stmt
      $stmt = $conn-> prepare($query);

      $stmt->bindValue(1 ,$mobileNum);

      $stmt->execute();
      
      $hasUser = $stmt->rowCount();
      if($hasUser>0 AND isset($_POST['otpsubmit'])){
        $otp = rand(1000,9999);
        //its just a sample here, do it with your sms panel document:)
        $api = "api from your sms panel here" .$otp. ";@&to".$_POST['otpInput'];
        $sms = file_get_contents($api);

        $updateQuery = "UPDATE `users` SET otp=? WHERE mobile=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindValue(1,$otp);
        $stmt->bindValue(2,$mobileNum);
        $stmt->execute();
      }else{
        $_SESSION['login_fail'] = "شماره موبایل وارد شده در سیستم یافت نشد.";
        echo "<div class='alert alert-danger'>{$_SESSION['login_fail']}</div>";
        unset($_SESSION['login_fail']);
      }

  }catch(Exception $e){
    echo "eror message is". $e->getMessage();
  }
}
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form>
        <span>or use your email to registration</span>
        <input type="text" placeholder="userName">
        <input type="email" placeholder="Email">
        <input type="text" placeholder="MObileNumber">
        <input type="password" placeholder="Password">
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form method="post">
        <h1>OTP</h1>
        <br>
        <input type="number" name="otpInput" placeholder="enter your mobile/email">
        <br>
        <a href="#">Forget your Password?</a>
        <div style="display: inline;">
            <button type="submit" name="otpsubmit">Send To MObile</button>
            <a style="margin-left: 15px" href="otp.php">To Email</a>        
        </div>
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
<script src="./assets/script/js/script.js"></script>
</html>