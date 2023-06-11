<?php
include "config.php";
$id=$_GET['id'];
$q = "delete from `branch` where id = '$id'";
$result = mysqli_query($conn,$q);
if($result>0){
    echo "<script>window.location.assign('view_branch.php?msg=Record Deleted');</script>";
}else{
    echo"<script>window.location.assign('view_branch.php?msg=Try Again.');</script>";
}
?>