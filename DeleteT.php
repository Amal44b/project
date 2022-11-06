<?php
include 'connect.php';
if(isset($_GET['deleteId'])){
    $Id=$_GET['deleteId'];

    $sql="DELETE FROM tasks WHERE Id=$Id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Deleted successfull";
       header('location:tasks1.php');
    }else{
        die(mysqli_error($con));
    }
}
?>