<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Syllabus</h2>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<?php
  if(isset($_GET['msg'])){
   echo "<div class='col-12 alert alert-success'>".$_GET['msg']."</div>";
  }
  ?>

<div class="container container-fluid">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course_id</th>
          <th scope="col">Branch_id</th>
          <th scope="col">Semester</th>
          <th scope="col">File</th>
          <th scope="col">Created_at</th>
          <th scope="col">Status</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "config.php";
        $q = "SELECT S.id,S.semester,S.file,S.Created_at,S.Status,B.branch,C.course_name
              from syllabus as S
              lEFT JOIN branch as B 
              ON S.branch_id = B.id
              LEFT JOIN course as C
              ON S.course_id = C.id
              order by semester";
        $result= mysqli_query($conn,$q);
        $i=1;
        
        foreach($result as $data){
        ?>
        <tr>
          <td><?php echo "$i" ?></td>
          <td><?php echo $data['course_name']; ?></td>
          <td><?php echo $data['branch']; ?></td>
          <td><?php echo $data['semester']; ?></td>
          <td><a href="../upload/<?php echo $data['file']; ?>" target="_blank">View File</a></td>
          <td><?php echo $data['Created_at']; ?></td>
          <td><?php echo $data['Status'];?></td>
          <td><a href="edit_syllabus.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
          <td><a href="delete_syllabus.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td>  
        </tr>
        <?php
        $i++;
        }
        ?>
      </tbody>
        
    </table>
    </form>
</div>
<br><br>
<?php
require "footer.php";
?>