<?php
include 'connect.php';
$sql="SELECT * FROM groups";
$RESULT=mysqli_query($con,$sql);



if(isset($_POST['submit'])){
    $ProjectName=$_POST['ProjectName'];
    $Description=$_POST['Description'];
    $groupid = mysqli_real_escape_string($con,$_POST['Group']);

    $sql="INSERT INTO projects (ProjectName,Description,groupid)
    values('$ProjectName','$Description','$groupid')";
    $RESULT = mysqli_query ($con,$sql);
    if($RESULT){
        //echo "Data inserted successfully";
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
    <title>إضافة مشروع</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label >ProjectName</label>
    <input type="text" class="form-control" placeholder="Enter Project Name" name="ProjectName" autocomplete="off">
</div>
<div class="mb-3">
    <label >Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description" autocomplete="off">
</div>
<div>
<label>add group:</label>


<select name="Group">

<?php 

    while ($groupid = mysqli_fetch_array(

            $RESULT,MYSQLI_ASSOC)):; 
?>
    <option value="<?php echo $groupid["Id"]; ?>">
        <?php echo $groupid["GroupName"];
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