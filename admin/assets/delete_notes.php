<?php
include "config.php";
$id=$_GET['id'];
$q = "delete from `notes` where id = '$id'";
$result = mysqli_query($conn,$q);
if($result>0){
    echo "<script>window.location.assign('view_notes.php?msg=Record Deleted');</script>";
}else{
    echo"<script>window.location.assign('view_notes.php?msg=Try Again.');</script>";
}
?>