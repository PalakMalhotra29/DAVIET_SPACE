<?php
include "config.php";
$id=$_GET['id'];
$q = "delete from `timetable` where id = '$id'";
$result = mysqli_query($conn,$q);
if($result>0){
    echo "<script>window.location.assign('view_timetable.php?msg=Record Deleted');</script>";
}else{
    echo"<script>window.location.assign('view_timetable.php?msg=Try Again.');</script>";
}
?>