<?php
include 'connect.php';
$Id=$_GET['updateId'];
$sql="SELECT * FROM projects WHERE Id=$Id";
$RESULT=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($RESULT);
$ProjectName=$row['ProjectName'];
$Description=$row['Description'];
$GroupId=$row['groupid'];

$sqlGroup="SELECT * FROM groups";
$RESULTGroup=mysqli_query($con,$sqlGroup);




if(isset($_POST['submit'])){
  $Id=$_GET['updateId'];
    $ProjectName=$_POST['ProjectName'];
    $Description=$_POST['Description'];
    $GroupId = mysqli_real_escape_string($con,$_POST['Group']);

    $sql="UPDATE projects SET Id=$Id,ProjectName='$ProjectName',
    Description='$Description',groupid='$GroupId'
    WHERE Id=$Id";
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
        //echo "Data updated successfully";
        header('location:projects1.php');
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
    <title>تعديل المشروع</title>
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
    <label >ProjectName</label>
    <input type="text" class="form-control" placeholder="Enter Project Name" name="ProjectName" autocomplete="off" value=<?php
     echo $ProjectName; ?>>
</div>
<div class="mb-3">
    <label >Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description" autocomplete="off" value=<?php
    echo $Description; ?>>
</div>
<div>
<label>Update group:</label>


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