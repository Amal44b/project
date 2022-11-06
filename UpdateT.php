<?php
include 'connect.php';
$Id=$_GET['updateId'];
$sql="SELECT * FROM tasks WHERE Id=$Id";
$RESULT=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($RESULT);
$TaskName=$row['TaskName'];
$Description=$row['Description'];
$EndDate=$row['EndDate'];
$PofC=$row['PofC'];
$UserId=$row['UserId'];

$sqlUser="SELECT * FROM Users";
$RESULTUser=mysqli_query($con,$sqlUser);




if(isset($_POST['submit'])){
  $Id=$_GET['updateId'];
    $TaskName=$_POST['TaskName'];
    $Description=$_POST['Description'];
    $EndDate=$_POST['EndDate'];
    $PofC=$_POST['PofC'];
    $UserId = mysqli_real_escape_string($con,$_POST['User']);

    $sql="UPDATE tasks SET Id=$Id,TaskName='$TaskName',
    Description='$Description',EndDate='$EndDate',PofC='$PofC',UserId='$UserId'
    WHERE Id=$Id";
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
        //echo "Data updated successfully";
        header('location:tasks1.php');
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
    <title>تعديل المهمه</title>
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
    <label >TaskName</label>
    <input type="text" class="form-control" placeholder="Enter Project Name" name="TaskName" autocomplete="off" value=<?php
     echo $TaskName; ?>>
</div>
<div class="mb-3">
    <label >Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description" autocomplete="off" value=<?php
    echo $Description; ?>>
</div>
<div class="mb-3">
    <label >ExpectedEndDate</label>
    <input type="text" class="form-control" placeholder="Enter Expected End Date" name="EndDate" autocomplete="off" value=<?php
    echo $EndDate; ?>>
</div>
<div class="mb-3">
    <label >PercentageOfCompletion</label>
    <input type="text" class="form-control" placeholder="Enter Percentage Of Completion" name="PofC" autocomplete="off" value=<?php
    echo $PofC; ?>>
</div>
<div>
<label>Update User:</label>


<select name="User">
<?php 

    while ($UserId1 = mysqli_fetch_array(

            $RESULTUser,MYSQLI_ASSOC)):; 
?>

  <option value="<?php echo $UserId1["Id"]; ?>">
        <?php echo $UserId1["Name"];
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