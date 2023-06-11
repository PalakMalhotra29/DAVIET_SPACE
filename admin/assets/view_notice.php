<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Notice</h2>
      
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
                <th class="col">Course_id</th>
                <th class="col">Branch_id</th>
                <th class="col">Semester</th>
                <th class="col">Title</th>
                <th class="col">File</th>
                <th class="col">Created_at</th>
                <th class="col">Status</th>
                <th class="col">Edit</th>
                <th class="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "config.php";
            $q = "SELECT N.id,N.semester,N.title,N.file,N.created_at,N.status,B.branch,C.course_name
                  FROM
                  notice N 
                  LEFT JOIN branch B
                  On N.branch_id = B.id
                  LEFT JOIN course C
                  On N.course_id = C.id
                  order by semester asc";
            $result = mysqli_query($conn,$q);
            foreach($result as $data){
                $i=1;
                ?>
                <tr>
                    <td><?php echo "$i" ?></td>
                    <td><?php echo $data['course_name'] ?></td>
                    <td><?php echo $data['branch'] ?></td>
                    <td><?php echo $data['semester'] ?></td>
                    <td><?php echo $data['title'] ?></td>
                    <td><a href="../upload/<?php echo $data['file']; ?>" target="_blank">View File</ah</td>
                    <td><?php echo $data['created_at'] ?></td>
                    <td><?php echo $data['status'] ?></td>
                    <td><a href="edit_notice.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="delete_notice.php?id=<?php echo $data["id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td>  
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