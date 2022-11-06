<?php
include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المجموعات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" >

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="Group.php" class="text-light">Add Group</a>
       </button>
       <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Group Name</th>
      <th scope="col">Bio</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM groups";
    $result=mysqli_query($con,$sql);
    if($result){
       while($row=mysqli_fetch_assoc($result)){
        $Id=$row['Id'];
        $GroupName=$row['GroupName'];
        $Bio=$row['Bio'];
        echo '<tr>
        <th scope="row">'.$Id.'</th>
        <td>'.$GroupName.'</td>
        <td>'.$Bio.'</td>
        <td>
    <button class="btn btn-primary"><a href="UpdateG.php?
    updateId='.$Id.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="DeleteG.php?
    deleteId='.$Id.'"class="text-light">Delete</a></button>
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