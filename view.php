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
echo $data['id'];
echo $data['title'];


}
?>
<img src="<?php echo'files/'.$data['image']; ?>" style="width: 200px;">