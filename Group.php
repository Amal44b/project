<?php 
include 'connect.php';
if(isset($_POST['submit'])){
    $GroupName=$_POST['GroupName'];
    $Bio=$_POST['Bio'];

    $sql="INSERT INTO groups (GroupName,Bio)
    values('$GroupName','$Bio')";
     // echo $sql;
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
       // echo "Data inserted successfully";
       header('location:Groups1.php');
    } 
     else{
        die(mysqli_error($con));
  }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" >
    <title>إضافة مجموعة</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label >GroupName</label>
    <input type="text" class="form-control" placeholder="Enter Group Name" name="GroupName" autocomplete="off">
</div>
<div class="mb-3">
    <label >Bio</label>
    <input type="text" class="form-control" placeholder="Enter Bio" name="Bio" autocomplete="off">
</div>

  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
</form>

    </div>

    
  </body>
</html>