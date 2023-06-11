<?php
include "config.php";
$id=$_GET['id'];
$q = "delete from `datesheet` where id = '$id'";
$result = mysqli_query($conn,$q);
if($result>0){
    echo "<script>window.location.assign('view_datesheet.php?msg=Record Deleted');</script>";
}else{
    echo"<script>window.location.assign('view_datesheet.php?msg=Try Again.');</script>";
}
?>