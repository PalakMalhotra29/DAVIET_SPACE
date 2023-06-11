<?php 
include "header.php";
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>View Messages</h2>
      
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
            <th class="col">Name</th>
            <th class="col">Email</th>
            <th class="col">Subject</th>
            <th class="col">Message</th>
            <th class="col">Created_at</th>
        </tr>
     </thead>
    <tbody>
        <?php 
        include "config.php";
        $q= "SELECT * FROM `contact`";
        $result = mysqli_query($conn,$q);
        $i = 1;
        foreach($result as $data){
            ?>
            <tr>
              <td><?php echo "$i" ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><?php echo $data['subject'] ?></td>
              <td><?php echo $data['message'] ?></td>
              <td><?php echo $data['created_at'] ?></td>
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
include "footer.php";
?>