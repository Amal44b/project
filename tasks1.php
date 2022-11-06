<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المهام</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" >
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="task.php"
        class="text-light">Add Task</a>
            </button>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">TaskName</th>
      <th scope="col">Description</th>
      <th scope="col">ExpectedEndDate</th>
      <th scope="col">PercentageOfCompletion</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


  <?php
$sql="SELECT * FROM tasks";
$result=mysqli_query($con,$sql);
if($result){
   while($row=mysqli_fetch_assoc($result)){
    $Id=$row['Id'];
    $TaskName=$row['TaskName'];
    $Description=$row['Description'];
    $ExpectedEndDate=$row['EndDate'];
    $PercentageOfCompletion=$row['PofC'];
    echo '<tr>
    <th scope="row">'.$Id.'</th>
    <td>'.$TaskName.'</td>
    <td>'.$Description.'</td>
    <td>'.$ExpectedEndDate.'</td>
    <td>'.$PercentageOfCompletion.'</td>
    <td>
    <button class="btn btn-primary"><a href="UpdateT.php?
    updateId='.$Id.'"
    class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="DeleteT.php?
    deleteId='.$Id.'"
    class="text-light">Delete</a></button>
</td>
  </tr>';
   }
   
}

  ?>
  </tbody>
</table>
    </div>
    
</body>
</html>