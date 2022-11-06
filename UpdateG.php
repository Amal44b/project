<?php 
include 'connect.php';
$Id=$_GET['updateId'];
$sql="SELECT * FROM groups WHERE Id=$Id";
$RESULT=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($RESULT);
$GroupName=$row['GroupName'];
$Bio=$row['Bio'];

if(isset($_POST['submit'])){
    $GroupName=$_POST['GroupName'];
    $Bio=$_POST['Bio'];

    $sql="UPDATE groups SET Id=$Id,GroupName='$GroupName',Bio='$Bio'
    WHERE Id=$Id";
     // echo $sql;
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
        //echo "Data updated successfully";
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
    <title>Update</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label >GroupName</label>
    <input type="text" class="form-control" placeholder="Enter Group Name" name="GroupName" autocomplete="off" value=<?php
     echo $GroupName;?>>
</div>
<div class="mb-3">
    <label >Bio</label>
    <input type="text" class="form-control" placeholder="Enter Bio" name="Bio" autocomplete="off" value=<?php
     echo $Bio;?>>
</div>

  <button type="submit" class="btn btn-primary" name = "submit">Update</button>
</form>

    </div>

    
  </body>
</html>