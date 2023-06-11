<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Edit Branch</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
<?php
    include "config.php";
    $id=$_GET['id'];
    $q = "SELECT * FROM `branch` where id = '$id'";
    $result = mysqli_query($conn,$q);
    $data = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
        $branch= $_POST['branch'];
        $course_id = $_POST['course_id'];
        $q="update `branch` set `branch`='$branch',`course_id`='$course_id' where id = '$id' ";
        $res = mysqli_query($conn,$q);
        if($res> 0){
            echo "<script>window.location.assign('view_branch.php?msg=Record Updated');</script>";
        }else{
         echo"<script>window.location.assign('view_branch.php?msg=Try Again.');</script>";
        }
        }
    ?>
    <form method="post">

       <div class="mb-3">
          <label for="branch" class="form-label"> Branch:</label>
          <input type="text" class="form-control" id="branch" name="branch" value="<?php echo $data['branch'] ?>">
       </div>

       <div class="mb-3">
          <label for="course_id" class="form-label">Course:</label>
          <select class="form-select form-control" aria-label="Default select example" name="course_id">
            <?php
            include "config.php";
            $c = "SELECT * FROM `course`";
            $res = mysqli_query($conn,$c);
            foreach($res as $course){
              ?>
              <option 
              <?php
              if($course['course_name']==$data['id'])
              {
                ?>
                selected
                <?php
              }
              ?>
              value="<?php echo $course['id'];?>"><?php echo $course['course_name'];?></option>  
                <?php          
          }
          ?>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>

    </form>
</div>
<br><br>
<?php
require "footer.php";
?>