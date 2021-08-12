<?php
include 'init2.php';
  if(isset($_POST['login']) && !empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) or !empty($password)) {
      $email = $getFromU->checkInput($email);
      $password = $getFromU->checkInput($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg = "Invalid format";
      }else {
        if($getFromU->login($email, $password) === false){
          $errorMsg = " The email or password is incorrect!";
        }
      }
    }else {
      $errorMsg = " Please enter email and password!";
    }
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    
    <style>
    
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-image:  linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url("p5.jpg");
  background-size: cover;
}
.login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
.span-fp-error
{

  margin-top: 10px;
  font-size: 150%;
}


     </style> 
  </head>
  <body>
<div class="login-box">
  <form method="post">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="email" placeholder="Email">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password">
  </div>

  <input type="submit" class="btn"  name="login" value="Login">
  <input type="checkbox" Value="Remember me">Remember me

   <?php
      
      if(isset($errorMsg)){
        echo '<div class="span-fp-error">'.$errorMsg.'</div>';
      }
    ?>
  </form>
</div>

  </body>
</html>