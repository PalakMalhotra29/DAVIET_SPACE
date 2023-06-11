<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Add Branch</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<?php
   include "config.php";
   if(isset($_POST['submit'])){
    $branch= $_POST['branch'];
    $course_id= $_POST['course_id'];
    $q= "INSERT INTO `branch`(`branch`,`course_id`) VALUES('$branch','$course_id')";
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
          <label for="branch" class="form-label"> Branch:</label>
          <input type="text" class="form-control" id="branch" name="branch">
        </div>

        <div class="mb-3">
          <label for="course_id" class="form-label">Course:</label>
          <select class="form-select form-control" aria-label="Default select example" name="course_id" required>
            <option selected disabled value="">Select your Course</option>
            <?php
            include "config.php";
            $c = "SELECT * FROM `course`";
            $res = mysqli_query($conn,$c);
            foreach($res as $course){
              ?>
                <option value="<?php echo $course['id'];?>"><?php echo $course['course_name'];?></option>  
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