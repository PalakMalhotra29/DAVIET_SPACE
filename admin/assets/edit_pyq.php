<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Edit Previous Year Papers</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
    <?php
    include "config.php";
    $id = $_GET['id'];
    $q = "SELECT * FROM `pyq` where id='$id'";
    $result = mysqli_query($conn,$q);
    $data1 = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
        $course_id = $_POST['course_id'];
        $branch_id = $_POST['branch_id'];
        $semester = $_POST['semester'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $file = $_FILES['file']['name'];
        $location = $_FILES['file']['tmp_name'];
        move_uploaded_file($location,'../upload/'.$file);
        $q = "UPDATE `pyq` set `course_id`='$course_id',`branch_id`='$branch_id',`semester`='$semester',`title`='$title',`description`='$description',`file`='$file' where id=$id<?php if($data['semester']==1){echo 'selected';}?>";
        $result = mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('view_pyq.php?msg=Record Updated');</script>";
        }else{
            echo"<script>window.location.assign('view_pyq.php?msg=Try Again.');</script>";
        }
    } 
    ?>

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
                <option 
                <?php
                if($data1['course_id']==$data['id'])
                {
                  ?>
                  selected
                  <?php
                }
                ?>
                value="<?php echo $data['id'];?>"><?php echo $data['course_name'];?></option>  
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
              <option 
              <?php
              if($data1['branch_id']==$data['id'])
              {
                ?>
                selected
                <?php
              }
              
              ?>
              value="<?php echo $data['id'];?>"><?php echo $data['branch'];?></option>  
                <?php          
          }
          ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester:</label>
            <select name="semester" id="semester" class="form-control">Semester
                <option value="" s>Select Your Semester</option>
                <option <?php if($data['semester']==1){echo 'selected';}?>value="1">1st</option>
                <option <?php if($data['semester']==2){echo 'selected';}?>value="2">2nd</option>
                <option <?php if($data['semester']==3){echo 'selected';}?>value="3">3rd</option>
                <option <?php if($data['semester']==4){echo 'selected';}?>value="4">4th</option>
                <option <?php if($data['semester']==5){echo 'selected';}?>value="5">5th</option>
                <option <?php if($data['semester']==6){echo 'selected';}?>value="6">6th</option>
                <option <?php if($data['semester']==7){echo 'selected';}?>value="7">7th</option>
                <option <?php if($data['semester']==8){echo 'selected';}?>value="8">8th</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="title" class="form-control" id="title" name="title" value="<?php echo $data1['title']?>">
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