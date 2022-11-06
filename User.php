

<?php

include 'connect.php';
$sql="SELECT * FROM groups";
$RESULT=mysqli_query($con,$sql);
//$row=mysqli_fetch_assoc($RESULT);
//if(isset($_POST['submit'])){
  //$GroupId = mysqli_real_escape_string($con,$_POST['GroupId']);
  //$sql="INSERT INTO users (GroupId)
  //values ('$GroupId')";
  //echo $sql;
  //if(mysqli_query($con,$sql))

 // {
     // echo "Product added successfully";
  //}
//}

 

if(isset($_POST['submit'])){
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $Mobile=$_POST['Mobile'];
    $GroupId = mysqli_real_escape_string($con,$_POST['Group']);

    $sql="INSERT INTO users (Name,Email,Password,Mobile,GroupId)
    values('$Name','$Email','$Password','$Mobile','$GroupId')";
     // echo $sql;
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
       // echo "Data inserted successfully";
       header('location:Users1.php');
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
    <label >Name</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="Name" autocomplete="off">
</div>
<div class="mb-3">
    <label >Email</label>
    <input type="email" class="form-control" placeholder="Enter Your Email" name="Email" autocomplete="off">
</div>
<div class="mb-3">
    <label >Password</label>
    <input type="text" class="form-control" placeholder="Enter Your Password" name="Password" autocomplete="off">
</div>
<div class="mb-3">
    <label >Mobile</label>
    <input type="text" class="form-control" placeholder="Enter Your Mobile Number" name="Mobile" autocomplete="off">
</div>
<div>
<label>add group:</label>


<select name="Group">

<?php 

    while ($GroupId = mysqli_fetch_array(

            $RESULT,MYSQLI_ASSOC)):; 
?>
    <option value="<?php echo $GroupId["Id"]; ?>">
        <?php echo $GroupId["GroupName"];
        ?>
    </option>
<?php 
    endwhile;?>
    </select>
  
    </div>
  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
</form>

    </div>

    
  </body>
</html>