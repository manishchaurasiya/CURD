<?php
session_start();
include('db_conn.php');
if (isset($_POST['submit'])) 
{
  $email= mysqli_real_escape_string($conn,$_POST['email']);
  //echo $email;
  $pasword= mysqli_real_escape_string($conn,$_POST['pasword']);
  $result="select * from user where email='$email' and password='$pasword'";
  $query=mysqli_query($conn,$result);
  if (!(mysqli_num_rows($query))>0) 
  {
    echo "<script>alert('Username or password incorrect');</script>";
  }
  else
  {
   // echo"login successfully";
    $_SESSION['email_id']=$email;
    header("location:projects.php");
    //echo  $_SESSION['email_id'];

  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Form</title>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Raleway:300,400,700");

    * {
      margin: 0;
      padding: 0;
      outline: none;
      box-sizing: border-box;
      font-family: "Raleway", sans-serif;
    }

    body {
      background: #16a085;
    }

    .cont {
      position: relative;
      width: 25%;
      padding: 10px 25px;
      margin: 10vh auto;
      background: #fff;
      border-radius: 8px;
    }

    .form {
      width: 100%;
    }

    h1, .user, .pass {
      text-align: center;
      display: block;
    }

    h1 {
      color: #606060;
      font-weight: bold;
      font-size: 40px;
      margin: 30px auto;
    }
    a{
      text-decoration: none;
    }
    p
    {
      text-align: center;
    }
    .user, .pass, .login {
      width: 100%;
      height: 45px;
      border: none;
      border-radius: 5px;
      font-size: 20px;
      font-weight: lighter;
      margin-bottom: 30px;
    }

    .user, .pass {
      background: #ecf0f1;
    }

    .login {
      color: #fff;
      cursor: pointer;
      margin-top: 20px;
      background: #16a085;
      transition: background 0.4s ease;
    }

    .login:hover {
      background: #3570dc;
    }

    @media only screen and (min-width: 280px) {
      .cont {
        width: 90%;
      }
    }

    @media only screen and (min-width: 480px) {
      .cont {
        width: 60%;
      }
    }

    @media only screen and (min-width: 768px) {
      .cont {
        width: 40%;
      }
    }

    @media only screen and (min-width: 992px) {
      .cont {
        width: 30%;
      }
    }
  </style>
</head>
<body>
<div class="cont">
  <div class="form">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Login</h1>
      <input type="text" class="user" placeholder="Username" name="email" required />
      <input type="password" class="pass" placeholder="Password" name="pasword" required />
      <button class="login" name="submit">Login</button>
      <p style="margin: 20px 0;"><b>New user?</b> <a href="signup.php">Register Here!</a></p>
      <!-- <p style="margin: 20px 0;"><b><a href="forgot.php">Forgot Here!</a></b> </p> -->
    </form>
  </div>  
</div>
</body>
</html>