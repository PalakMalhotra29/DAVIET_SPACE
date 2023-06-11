<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Add Course</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<?php
   include "config.php";
   if(isset($_POST['submit'])){
    $course_name= $_POST['course_name'];
    $q= "INSERT INTO `course`(`course_name`) VALUES('$course_name')";
    $result = mysqli_query($conn,$q);
    if($result>0){
        ?>
        <div class="alert alert-success">Data Inserted successfully</div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger">Try Again</div>
        <?php
    }       
}
?>
<div class="container">
    <form method="post">

       <div class="mb-3">
          <label for="name" class="form-label">Course:</label>
          <input type="text" class="form-control" id="name" name="course_name">
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Submit</button>

    </form>
</div>
<br><br>
<?php
require "footer.php";
?>