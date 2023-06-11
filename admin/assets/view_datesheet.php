<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Datesheet</h2>
      
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
  <?php
  if(isset($_GET['msg'])){
    echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
  }
  ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="col">#</th>
                <th class="col">Course_id</th>
                <th class="col">Branch_id</th>
                <th class="col">Semester</th>
                <th class="col">Title</th>
                <th class="col">File</th>
                <th class="col">timestamp</th>
                <th class="col">Status</th>
                <th class="col">Edit</th>
                <th class="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "config.php";
            $q = "SELECT D.id,D.semester,D.Title,D.file,D.created_at,D.status,B.branch,C.course_name
                  FROM 
                  datesheet D 
                  LEFT JOIN branch B
                  On D.branch_id = B.id
                  LEFT JOIN course C
                  On D.course_id = C.id
                  order by semester asc";
            $result = mysqli_query($conn,$q);
            $i=1;
            foreach($result as $data){
                ?>
            <tr>
                <td><?php echo "$i" ?></td>
                <td><?php echo $data['course_name'] ?></td>
                <td><?php echo $data['branch'] ?></td>
                <td><?php echo $data['semester'] ?></td>
                <td><?php echo $data['Title'] ?></td>
                <td><a href="../upload/<?php echo $data['file']; ?>" target="_blank">View File</a></td>          
                <td><?php echo $data['created_at'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td><a href="edit_datesheet.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
                <td><a href="delete_datesheet.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td>
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