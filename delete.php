<?php
session_start();

if (!isset($_SESSION['email_id'])) {
	header("location:login.php");
}
else
{

	include('db_conn.php');
    //	echo "hello".$_SESSION['email_id'];

    $id=$_GET['id'];
    $qry="delete from project where id=$id";
    $result=mysqli_query($conn,$qry);
    if ($result) 
    {
    	header("location:projects.php");
    	exit();
    }
    else
    {
      echo mysqli_error($conn);
    }
}

?>