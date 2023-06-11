<?php
require "header.php";
?>
<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Notes</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
           
        <div class="row">          
            <?php
            include "config.php";
            $id = $_GET['id'];
            $cid = $_GET['cid'];
            $q = "SELECT * FROM `notes` where branch_id ='$id' and course_id='$cid' and status='enable'
            order by semester asc";
            $result = mysqli_query($conn,$q);
            if(mysqli_num_rows($result) > 0){
                 //print_r($result);
            foreach($result as $data){
              ?>
              <div class="col-lg-6 col-md-6 d-flex align-items-stretch card mx-auto margincourse height" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
               <p>Semester: <?php echo $data['semester'];?></p>
               <h4><a href="upload/<?php echo $data['file']?>" target="_blank"><?php echo $data['title']?></a></h4>
               <small><?php echo $data['description'];?></small>
               
             </div>
            </div>
          <?php
            } 
            }else{
                ?>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch card mx-auto margincourse">
                    <h4>No Notes Available</h4>
                </div>
                <?php
              //echo "<script>window.location.assign(semester.php?course_id=".$id.");</script>";
            }
            ?>
            
        </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php
 require "footer.php";
 ?>