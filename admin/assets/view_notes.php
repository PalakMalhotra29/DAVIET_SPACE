<?php
require "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Notes</h2>
      
    </div>
<?php
if(isset($_GET['msg'])){
  echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
}
?>
  </div>
</section><!-- End Breadcrumbs -->
<br><br>
<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="col">#</th>
                <th class="col">Course</th>
                <th class="col">Branch</th>
                <th class="col">Semester</th>
                <th class="col">Title</th>
                <th class="col">Description</th>
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
            $q = "SELECT n.id,n.semester,n.title,n.description,n.file,n.created_at,n.status,b.branch,c.course_name
            FROM notes n
            LEFT JOIN branch b
            ON n.branch_id = b.id
            LEFT JOIN course c
            ON n.course_id = c.id
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
                    <td><?php echo $data['title'] ?></td>
                    <td><?php echo $data['description'] ?></td>
                    <td><a href="../upload/<?php echo $data['file']; ?>" target="_blank">View File</a></td>
                    <td><?php echo $data['created_at'] ?></td>
                    <td><?php echo $data['status'] ?></td>
                    <td><a href="edit_notes.php?id=<?php echo $data['id'];?>"><i class="bi bi-pencil"></i></a></td>
                   <td><a href="delete_notes.php?id='<?php echo $data['id'];?>'" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash3-fill"></i></a></td> 
                  
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