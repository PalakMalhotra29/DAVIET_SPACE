<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Course</h2>
      <ol>
        <li><a href="index.html">Services</a></li>
        <li>Course</li>
      </ol>
    </div>
   </div>
</section><!-- End Breadcrumbs -->
<?php
  if(isset($_GET['msg'])){
   echo "<div class='col-12 alert alert-success'>".$_GET['msg']."</div>";
  }
  ?>
<br><br>
<?php
  include "config.php";
  
?>

<div class="container">
     <table class="table table-bordered table-striped">
       <thead>
            <tr>
               <th scope="col col-3">#</th>
               <th scope="col col-3">Course</th>
               <th scope="col col-3">Edit</th>
               <th scope="col col-3">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
             include "config.php";
             $q = "select * from `course`";
             $result = mysqli_query($conn,$q);
             $i=1;
             foreach($result as $data){
            ?>
            <tr>
                <td><?php echo "$i";?></td>
                 <td><?php echo $data['course_name'];?></td>
                 <td><a href="edit_course.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
                 <td><a href="delete_course.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td>
          </tr>
          <?php
          $i++;
        }
          ?>      
          </tbody>
    </table>

</div>
<br><br>
<?php
require "footer.php";
?>
