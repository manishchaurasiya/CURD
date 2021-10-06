<?php
session_start();
if (!isset($_SESSION['email_id'])) {
	header("location:login.php");
}
else
{
	//echo "hello".$_SESSION['email_id'];

include('db_conn.php');
$id = $_GET['id']; 
//echo $id;
$qry="select * from project where id='$id'";
$result = mysqli_query($conn,$qry);
$data = mysqli_fetch_array($result);
if (isset($_POST['upload']) && (isset($_FILES['image']))) 
{
	$title=$_POST['title'];
	$description=$_POST['description'];
	$uploaded_by=$_POST['uploaded_by'];

	$file_name = $_FILES['image']['name'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$status= move_uploaded_file($file_tmp,"files/".$file_name);

	//$date=date("d F Y h:i:s A");

	$edit = mysqli_query($conn,"update project set title='$title',description='$description',image='$file_name', uploaded_by='$uploaded_by' where id='$id'");
	 if($edit)
    { 
	     mysqli_close($conn);
        header("location:projects.php"); 
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }   
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit data</title>
  <style>
  @import url("https://fonts.googleapis.com/css?family=Raleway:300,400,700");
  *{
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
	  height: 100%;
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
	input[type='file']
	{
		padding: 7px 0 0 50px;
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
  <div class="form" >
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
      <h1 > Edit Data </h1>
      <input type="text" value="<?php echo $data['title']; ?>" class="user" placeholder="Title" name="title" />

      <input type="text" class="user" value="<?php echo $data['description'];?>" placeholder="Description" name="description">

      <input type="file"  class="user" name="image" accept="image/png, image/jpg, image/jpeg" id="fileToUpload">
      <div class="user" style="height: auto;" >
      	<img src="<?php echo'files/'.$data['image']; ?>" style="width: 200px;">
      </div>

      <input type="text" value="<?php echo $data['uploaded_by']; ?>" class="pass" placeholder="Uploaded by" name="uploaded_by" />
      <button class="login" name="upload">UPDATE</button>
    </form>
  </div>  
</div>
</body>
</html>
<?php 
}
?>