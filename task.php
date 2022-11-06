<?php
include 'connect.php';
$sql="SELECT * FROM users";
$RESULT=mysqli_query($con,$sql);



if(isset($_POST['submit'])){
    $TaskName=$_POST['TaskName'];
    $Description=$_POST['Description'];
    $EndDate=$_POST['EndDate'];
    $PofC=$_POST['PofC'];
    $UserId = mysqli_real_escape_string($con,$_POST['User']);

    $sql="INSERT INTO tasks (TaskName,Description,EndDate,PofC,UserId)
    values('$TaskName','$Description','$EndDate','$PofC','$UserId')";
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
       // echo "Data inserted successfully";
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
    <title>إضافة مهمة</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label >TaskName</label>
    <input type="text" class="form-control" placeholder="Enter Task Name" name="TaskName" autocomplete="off">
</div>
<div class="mb-3">
    <label >Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description" autocomplete="off">
</div>
<div class="mb-3">
    <label >ExpectedEndDate</label>
    <input type="text" class="form-control" placeholder="Enter ExpectedEndDate" name="EndDate" autocomplete="off">
</div>
<div class="mb-3">
    <label >PercentageOfCompletion</label>
    <input type="text" class="form-control" placeholder="Enter PercentageOfCompletion" name="PofC" autocomplete="off">
</div>
<div>
<label>add User:</label>


<select name="User">

<?php 

    while ($UserId = mysqli_fetch_array(

            $RESULT,MYSQLI_ASSOC)):; 
?>
    <option value="<?php echo $UserId["Id"]; ?>">
        <?php echo $UserId["Name"];
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