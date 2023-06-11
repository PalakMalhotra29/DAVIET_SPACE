<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Edit Notice</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
    <?php
    include "config.php";
    $id = $_GET['id'];
    $q = "SELECT * FROM `notice` where id = '$id'";
    $result = mysqli_query($conn,$q);
    $data = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
        $course_id = $_POST['course_id'];
        $branch_id = $_POST['branch_id'];
        $semester = $_POST['semester'];
        $title = $_POST['title'];
        $file = $_FILES['file']['name'];
        $location = $_FILES['file']['tmp_name'];
        move_uploaded_file($location,'../upload/'.$file);
        $q = "UPDATE `notice` set `course_id`='$course_id',`branch_id`='$branch_id',`semester`='$semester',`title`='$title',`file`='$file' where id='$id'";
        $result = mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('view_notice.php?msg=Record Updated');</script>";
        }else{
            echo"<script>window.location.assign('view_notice.php?msg=Try Again.');</script>";
        }
        }
        ?>
    <form method="post">

    <div class="mb-3">
          <label for="course_id" class="form-label">Course:</label>
          <select class="form-select form-control" aria-label="Default select example" name="course_id" id="course_id">
            <?php
            include "config.php";
            $q = "SELECT * FROM `course`";
            $result = mysqli_query($conn,$q);
            foreach($result as $course){
              ?>
                <option selected value="<?php echo $course['id'];?>"><?php echo $course['course_name'];?></option>  
                  <?php          
            }
            ?>
            </select>
        </div>

        <div class="mb-3">
          <label for="branch_id" class="form-label">Branch:</label>
          <select class="form-select form-control" aria-label="Default select example" name="branch_id" id="branch_id">
            <?php
            include "config.php";
            $q = "SELECT * FROM `branch`";
            $result = mysqli_query($conn,$q);
            foreach($result as $branch){
              ?>
                <option selected value="<?php echo $branch['id'];?>"><?php echo $branch['branch'];?></option>  
                  <?php          
            }
            ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="semester" class="form-label">Semester:</label>
            <select name="semester" id="semester" class="form-control">Semester
                <option value="" selected disabled>Select Your Semester</option>
                <option <?php if($data['semester']==1){echo 'selected';}?> value="1">1st</option>
                <option <?php if($data['semester']==2){echo 'selected';}?> value="2">2nd</option>
                <option <?php if($data['semester']==3){echo 'selected';}?> value="3">3rd</option>
                <option <?php if($data['semester']==4){echo 'selected';}?> value="4">4th</option>
                <option <?php if($data['semester']==5){echo 'selected';}?> value="5">5th</option>
                <option <?php if($data['semester']==6){echo 'selected';}?> value="6">6th</option>
                <option <?php if($data['semester']==7){echo 'selected';}?> value="7">7th</option>
                <option <?php if($data['semester']==8){echo 'selected';}?> value="8">8th</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="title" class="form-control" id="title" name="title">
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