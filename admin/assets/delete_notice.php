<?php
include "config.php";
$id=$_GET['id'];
$q = "delete from `notice` where id = '$id'";
$result = mysqli_query($conn,$q);
if($result>0){
    echo "<script>window.location.assign('view_notice.php?msg=Record Deleted');</script>";
}else{
    echo"<script>window.location.assign('view_notice.php?msg=Try Again.');</script>";
}
?>