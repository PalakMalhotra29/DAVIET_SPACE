<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Branch</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<?php
if(isset($_GET['msg'])){
  echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
}
?>
<div class="container">
    <table class="table table-bordered table-striped">
     <thead>
        <tr>
            <th class="col">#</th>
            <th class="col">Branch</th>
            <th class="col">Course</th>
            <th class="col">Edit</th>
            <th class="col">Delete</th>
        </tr>
     </thead>
    <tbody>
        <?php 
        include "config.php";
        $q= "SELECT B.id,B.branch,C.course_name
             from branch as B
             LEFT JOIN course as C
             ON B.course_id = C.id";
        $result = mysqli_query($conn,$q);
        $i = 1;
        foreach($result as $data){
            ?>
            <tr>
              <td><?php echo "$i" ?></td>
              <td><?php echo $data['branch'] ?></td>
              <td><?php echo $data['course_name'] ?></td>
              <td><a href="edit_branch.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
                 <td><a href="delete_branch.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
             <?php
             $i++;
        }
        ?>
        <tr><td>

        </td></tr>
    </tbody>
   </table>
</div>
<br><br>
<?php
require "footer.php";
?>