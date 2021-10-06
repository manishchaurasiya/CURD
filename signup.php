<?php
include('db_conn.php');
$message_name="";
$message_password="";
$message_email="";
if ((isset($_POST['register'])) && (isset($_POST['Username'])) && (isset($_POST['pasword']))) 
{
  $error="false";
  if (strlen(mysqli_real_escape_string($conn,$_POST['Username']))<5) 
  {
    $message_name= "name must greter than 5.";
    $error="true";
   }

  if (!preg_match("/^[a-zA-Z ]+$/",$_POST['Username'])) 
  {
    $message_name = "Name must contain only alphabets and space";
    $error="true";
  } 
    if ((!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,3}$/ix", $_POST['email']))) {
      $message_email="please enter valid email address!";
      $error="true";
    }


  if(strlen($_POST['pasword']) < 8) 
  {
    $message_password = "Password must be minimum of 8 characters";
    $error="true";
  }       
 if ($error=='false') 
  {
    $email= $_POST['email'];
    $name= $_POST['Username'];
    $pasword= $_POST['pasword'];
    $result="select * from user where email='$email'";
    $query=mysqli_query($conn,$result);
    if ((mysqli_num_rows($query))>0) 
    {
      echo "<script>alert('User already exist!');</script>";
    }
    else
    {
      $upd="insert into user(name,email,password) values('$name','$email','$pasword')";
      $upd_query=mysqli_query($conn,$upd);
      if (!$upd_query) {
        echo"not inserted".mysql_error($conn);
      }
      else
      {
         echo "<script>alert('register successfully!');</script>";
        include("login.php");
        exit();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Signup Form</title>
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
      <h1>Signup</h1>
      <input type="text" class="user" placeholder="name" name="Username" required />
      <span><?php echo $message_name ;?></span>
      <input type="email" class="user" placeholder="Email" name="email" required />
           <span><?php echo $message_email ;?></span>
      <input type="password" class="pass" placeholder="Password" name="pasword" required />
       <span><?php echo $message_password ;?></span>
      <button class="login" name="register">Register</button>
    </form>
  </div>  
</div>
</body>
</html>