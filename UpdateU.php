<?php

include 'connect.php';
//$Id=$_GET['updateId'];
//$sql="SELECT * FROM groups";
//$sql="UPDATE groups SET Id=$Id WHERE Id=$Id";
//$RESULT=mysqli_query($con,$sql);
//$row=mysqli_fetch_assoc($RESULT);
//$Id=$row['Id'];
//echo $sql;

$Id=$_GET['updateId'];
$sql="SELECT * FROM users WHERE Id=$Id";
$RESULT=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($RESULT);
$Name=$row['Name'];
$Email=$row['Email'];
$Password=$row['Password'];
$Mobile=$row['Mobile'];
$GroupId=$row['GroupId'];
//echo $GroupId;
$sqlGroup="SELECT * FROM groups";
$RESULTGroup=mysqli_query($con,$sqlGroup);







//$sql="SELECT * FROM groups";
//$RESULT=mysqli_query($con,$sql);
//$row=mysqli_fetch_assoc($RESULT);


if(isset($_POST['submit'])){
  $Id=$_GET['updateId'];
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $Mobile=$_POST['Mobile'];
    $GroupId = mysqli_real_escape_string($con,$_POST['Group']);
     
    $sql="UPDATE users SET Id=$Id,Name='$Name',
    Email='$Email',Password='$Password',Mobile='$Mobile',GroupId='$GroupId'
    WHERE Id=$Id";
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
        echo "updated successfully";
      // header('location:Users1.php');
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
    <title>إضافة مستخدمين</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
    <div class="mb-3">
    <label >Id</label>
    <input type="int" class="form-control" placeholder="Enter Your Id" name="Id" autocomplete="off" disabled value=<?php
    echo $Id; ?>>
</div>
  <div class="mb-3">
    <label >Name</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="Name" autocomplete="off" value=<?php
    echo $Name; ?>>
</div>
<div class="mb-3">
    <label >Email</label>
    <input type="email" class="form-control" placeholder="Enter Your Email" name="Email" autocomplete="off" value=<?php
    echo $Email; ?>>
</div>
<div class="mb-3">
    <label >Password</label>
    <input type="text" class="form-control" placeholder="Enter Your Password" name="Password" autocomplete="off" value=<?php
    echo $Password; ?>>
</div>
<div class="mb-3">
    <label >Mobile</label>
    <input type="text" class="form-control" placeholder="Enter Your Mobile Number" name="Mobile" autocomplete="off" value=<?php
    echo $Mobile; ?>>
</div>
<div>
<label>add group:</label>


<select name="Group">
<?php 

    while ($GroupId1 = mysqli_fetch_array(

            $RESULTGroup,MYSQLI_ASSOC)):; 
?>

  <option value="<?php echo $GroupId1["Id"]; ?>">
        <?php echo $GroupId1["GroupName"];
        ?>
    </option>
<?php 
    endwhile;?>
    </select>
  
    </div>


    
  
  <button type="submit" class="btn btn-primary" name = "submit">Update</button>
</form>

    </div>

    
  </body>
</html>