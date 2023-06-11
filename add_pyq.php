<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Add Previous Year Papers</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<?php
include "config.php";
if(isset($POST['submit'])){
  $course_id = $_POST['course_id'];
  $branch_id = $_POST['branch_id'];
  $semester = $_POST['semester'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $file = $_FILES['file']['name'];
  $location = $_FILES['file']['tmp_name'];
  move_uploaded_file($location,'../upload/'.$file);
  $status = 'Disabled';
  $q = "INSERT INTO `pyq`(`course_id`,`branch_id`,`semester`,`title`,`description`,`file`,`status`) VALUES('$course_id',$branch_id','$semester','$title','$description','$file','$status')";
  $result = mysqli_query($conn,$q);
  if($result>0){
    ?>
    <div class="alert alert-success">Data Inserted Successfully</div>
    <?php
  }else{
    ?>
    <div class="alert alert-danger">Try Again</div>
    <?php
  }
}
?>
<div class="container">
    <form method="post" enctype="multipart/form-data">

    <div class="mb-3">
          <label for="course_id" class="form-label">Course:</label>
          <select class="form-select form-control" aria-label="Default select example" name="course_id">
            <?php
            include "config.php";
            $q = "SELECT * FROM `course`";
            $result = mysqli_query($conn,$q);
            foreach($result as $data){
              ?>
                <option selected value="<?php echo $data['id'];?>"><?php echo $data['course_name'];?></option>  
                  <?php          
            }
            ?>
            </select>
        </div>

        <div class="mb-3">
          <label for="branch_id" class="form-label">branch:</label>
          <select class="form-select form-control" aria-label="Default select example" name="branch_id">
            <?php
            include "config.php";
            $q = "SELECT * FROM `branch`";
            $result = mysqli_query($conn,$q);
            foreach($result as $data){
              ?>
                <option selected value="<?php echo $data['id'];?>"><?php echo $data['branch'];?></option>  
                  <?php          
            }
            ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester:</label>
            <select name="semester" id="semester" class="form-control">Semester
                <option value="0" selected disabled>Select Your Semester</option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="title" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label><br>
            <textarea name="decription" id="description" cols="70" rows="8" class="form-control"></textarea>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload Your File</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="file">
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Submit</button>

    </form>
</div>
<br><br>
<?php
require "footer.php";
?>