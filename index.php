<?php
session_start();
include('db_conn.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Index Page!</title>
  </head>
  <body>
<ul class="nav bg-light mb-2 navbar-expand-lg navbar-light justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="login.php"><button type="button" class="btn btn-success">Login</button></a>
  </li>
</ul>
    <div class="container">
    <table class="table table-hover ">
  <thead class="table-dark">
    <tr>
      <th scope="col">S.NO.</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">uploaded_by</th>
      <th scope="col">uploaded_date</th>
    </tr>
  </thead>
  <tbody>
   
<?php
$qry="select id,title,image,description,uploaded_by,uploaded_date from project";
$result=mysqli_query($conn,$qry);

 if (!$result)
  {
     echo "error".mysqli_error($conn);
  }
$s_no = 1;
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($records as $sno => $data) { ?>
  <tr>
      <th scope="row"><?php echo ++$sno; ?></th>
      <td><?php echo $data['title']; ?></td>
      <td><img src="<?php echo'files/'.$data['image']; ?>" style="width: 200px;"></td>
      <td><?php echo $data['description']; ?></td>
      <td><?php echo $data['uploaded_by']; ?></td>
      <td><?php echo date('d M Y H:i:s', strtotime($data['uploaded_date'])); ?></td>
    </tr>
<?php }

?>
</tbody>
</table>
</div>
  </body>
</html>