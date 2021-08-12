<?php
include 'init2.php';
if(isset($_POST['signup'])){
  $screenName = $_POST['screenName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $error = '';

  if(empty($screenName) or empty($password) or empty($email)){
    $error = 'All fields are required';
  }else {
    $email = $getFromU->checkInput($email);
    $screenName = $getFromU->checkInput($screenName);
    $password = $getFromU->checkInput($password);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format";
    }
    else if(strlen($screenName) > 20){
      $error = 'Name must be between in 6-20 characters';
    }else if(strlen($password) < 5){
      $error = 'Password is too short';
    }else {
      if($getFromU->checkEmail($email) === true){
        $error = 'Email is already in use';
      }else {
        $password = md5($password);
        $user_id = $getFromU->create('users', array('email' => $email, 'password' => $password , 'screenName' => $screenName, 'profileImage' => 'dp.jpg', 'profileCover' => 'pic4.jpg'));
        $_SESSION['user_id'] = $user_id;
        header('Location:main.php?step=1');
      }
    }
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
  <h1>Sign Up</h1>

  <div class="textbox">
    <i class="fas fa-user"></i>
     <input type="text" name="screenName" placeholder="Full Name"/>
  </div> 
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="email" placeholder="Email">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password">
  </div>

  <input type="submit" class="btn"   name="signup" Value="Signup">


   <?php
      if(isset($error)){
        echo '
        <div class="span-fp-error">'.$error.'</div>
        ';
      }
    ?>
  </form>
</div>

  </body>
</html>