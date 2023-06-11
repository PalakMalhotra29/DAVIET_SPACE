<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Edit Course</h2>
      <ol>
        <li><a href="index.html">Services</a></li>
        <li>Course</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
    <?php
    include "config.php";
    $id=$_GET['id'];
    $q = "SELECT * FROM `course` where id = '$id'";
    $result = mysqli_query($conn,$q);
    $data = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
        $course_name = $_POST['course_name'];
        $q="update `course` set `course_name`='$course_name' where id = '$id' ";
        $result = mysqli_query($conn,$q);
        if($result > 0){
            echo "<script>window.location.assign('view_course.php?msg=Record Updated');</script>";
        }else{
         echo"<script>window.location.assign('view_course.php?msg=Try Again.');</script>";
        }
        }
    ?>
    <form method="post">

       <div class="mb-3">
          <label for="name" class="form-label">Course:</label>
          <input type="text" class="form-control" id="name" name="course_name" value="<?php echo $data['course_name'] ?>">
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Submit</button>

    </form>
</div>
<br><br>
<?php
require "footer.php";
?>