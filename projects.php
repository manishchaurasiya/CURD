<?php
session_start();
include('db_conn.php');
if (!isset($_SESSION['email_id'])) {
	header("location:login.php");
}
else
{
	$email= $_SESSION['email_id'];
	$qry="SELECT name FROM user WHERE email='$email'";
	$query=mysqli_query($conn,$qry);
	while($data = mysqli_fetch_assoc($query))
	{
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Projects!</title>

  <style>
		* {
	  box-sizing: border-box;
	    font-family: "Open Sans", sans-serif;
	}

	body {
	  margin: 0px;
	  /*font-family: "segoe ui";*/
	}

	.nav {
	  height: 50px;
	  width: 100%;
	  padding: 0 40px;
	  background-color: #4d4d4d;
	  position: relative;
	}

	.nav > .nav-header {
	  display: inline;
	}

	.nav > .nav-header > .nav-title {
	  display: inline-block;
	  font-size: 22px;
	  color: #fff;
	  padding: 10px 10px 10px 10px;
	}

	.nav > .nav-btn {
	  display: none;
	}

	.nav > .nav-links {
	  display: inline;
	  float: right;
	  font-size: 18px;
	}

	.nav > .nav-links > a {
	  display: inline-block;
	  padding: 13px 10px 13px 10px;
	  text-decoration: none;
	  color: #efefef;
	}

	.nav > .nav-links > a:hover {
	  background-color: rgba(0, 0, 0, 0.3);
	}

	.nav > #nav-check {
	  display: none;
	}

	@media (max-width: 600px) {
	  .nav > .nav-btn {
	    display: inline-block;
	    position: absolute;
	    right: 0px;
	    top: 0px;
	  }
	  .nav > .nav-btn > label {
	    display: inline-block;
	    width: 50px;
	    height: 50px;
	    padding: 13px;
	  }
	  .nav > .nav-btn > label:hover,
	  .nav #nav-check:checked ~ .nav-btn > label {
	    background-color: rgba(0, 0, 0, 0.3);
	  }
	  .nav > .nav-btn > label > span {
	    display: block;
	    width: 25px;
	    height: 10px;
	    border-top: 2px solid #eee;
	  }
	  .nav > .nav-links {
	    position: absolute;
	    display: block;
	    width: 100%;
	    background-color: #333;
	    height: 0px;
	    transition: all 0.3s ease-in;
	    overflow-y: hidden;
	    top: 50px;
	    left: 0px;
	  }
	  .nav > .nav-links > a {
	    display: block;
	    width: 100%;
	  }
	  .nav > #nav-check:not(:checked) ~ .nav-links {
	    height: 0px;
	  }
	  .nav > #nav-check:checked ~ .nav-links {
	    height: calc(100vh - 50px);
	    overflow-y: auto;
	  }
	}

	/*-----------------------table css------------------------------- */
	.rwd-table {
  margin: auto;
    min-width: 94vw;
    max-width: 100%;
    margin-top: 1rem;
    border-collapse: collapse;

	}

		.rwd-table tr:first-child {
		  border-top: none;
		  background: #428bca;
		  color: #fff;
		}

		.rwd-table tr {
		  border-top: 1px solid #ddd;
		  border-bottom: 1px solid #ddd;
		  background-color: #f5f9fc;
		}

		.rwd-table tr:nth-child(odd):not(:first-child) {
		  background-color: #ebf3f9;
		}

		.rwd-table th {
		  display: none;
		}

		.rwd-table td {
		  display: block;
		}

		.rwd-table td:first-child {
		  margin-top: 0.5em;
		}

		.rwd-table td:last-child {
		  margin-bottom: 0.5em;
		}

		.rwd-table td:before {
		  content: attr(data-th) ": ";
		  font-weight: bold;
		  width: 120px;
		  display: inline-block;
		  color: #000;
		}

		.rwd-table th,
		.rwd-table td {
		  text-align: left;
		}

		.rwd-table {
		  color: #333;
		  border-radius: 0.4em;
		  overflow: hidden;
		}

		.rwd-table tr {
		  border-color: #bfbfbf;
		}

		.rwd-table th,
		.rwd-table td {
		  padding: 0.5em 1em;
		}
		@media screen and (max-width: 601px) {
		  .rwd-table tr:nth-child(2) {
		    border-top: none;
		  }
		}
		@media screen and (min-width: 600px) {
		  .rwd-table tr:hover:not(:first-child) {
		    background-color: #d8e7f3;
		  }
		  .rwd-table td:before {
		    display: none;
		  }
		  .rwd-table th,
		  .rwd-table td {
		    display: table-cell;
		    padding: 0.25em 0.5em;
		  }
		  .rwd-table th:first-child,
		  .rwd-table td:first-child {
		    padding-left: 0;
		  }
		  .rwd-table th:last-child,
		  .rwd-table td:last-child {
		    padding-right: 0;
		  }
		  .rwd-table th,
		  .rwd-table td {
		    padding: 1em !important;
		  }
		}

		/* THE END OF THE IMPORTANT STUFF */

		/* Basic Styling */
		body {
		  background: #4b79a1;
		  background: -webkit-linear-gradient(to left, #4b79a1, #283e51);
		  background: linear-gradient(to left, #4b79a1, #283e51);
		}
		.container {
		  display: block;
		  text-align: center;
		}
	[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
     }	
	 .btn{
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	 }	
	.btn-success {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
	}
	.btn-danger {
	    color: #fff;
	    background-color: #dc3545;
	    border-color: #dc3545;
	}
	.btn-success {
	    color: #fff;
	    background-color: #198754;
	    border-color: #198754;
	}
	.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
    } 
	</style>
</head>
<body>
<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      <?php echo $data['name'];?>
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>

  <div class="nav-links">
  	<a href="add.php"><button type="button" class="btn btn-success">Add Article</button></a>
	<a href="logout.php" target="_blank">LOGOUT</a> 
  </div>

<!-- -------------------------table--------------------- -->
<div class="container">
  <table class="rwd-table">
    <tbody>
      <tr>
        <th>S.No.</th>
        <th>Title</th>
        <th>View</th>
        <th>Action</th>
      </tr>
<?php
 $query=mysqli_query($conn,"SELECT id, title FROM project WHERE email='$email'");
	$s_no=1;
	while($data = mysqli_fetch_assoc($query))
	{
		
	?>

      <tr>
        <td data-th="Supplier Code">
        <?php echo $s_no++; ?>
        </td>
        <td data-th="Supplier Name">
           <?php echo $data['title'] ?>
        </td>
        <td data-th="Supplier Name">
           <a href="view.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-success">View</button></a>
        </td>
        <td data-th="Invoice Number">
          <a href="edit.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-secondary">Edit</button></a>
          <a href="delete.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
          
        </td>
        
      </tr>
      <?php
		}
		?>
    </tbody>
  </table>
</div>



<?php	
}
}
?>

</div>
</body>
</html>