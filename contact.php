<?php
include "header.php";
?>
<style>
  .button{
    padding:10px;
    margin:10px;
    background-color:green;
    color:white;
    border-radius:10px;
    border: 5px solid white;
    }
</style>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact US</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3407.512378019564!2d75.55530901514634!3d31.344837181427973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5a9c00d46e6f%3A0x1df5c0851f0720fe!2sDAV%20Institute%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sin!4v1662198835189!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php
    include "config.php";
    if(isset($_POST['submit'])){
      //print_r($_POST['submit']);
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $q = "INSERT INTO `contact`(`name`,`email`,`subject`,`message`) VALUES('$name','$email','$subject','$message')";
      $result = mysqli_query($conn,$q);
      if($result>0){
        ?>
        <div class="alert alert-success mx-auto">Thanks for contacting us.</div>
        <?php
      }else{
        ?>
        <div class="alert alert-danger mx-auto">Try Again</div>
        <?php
      }
    }
    ?>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>8HV4+WXQ, Kabir Nagar,<br> Jalandhar, Punjab 144008</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>daviet@davietjal.org</p>
                  <p>palak.malhotra.8029@gmail.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>1860-180-0126<br>0181-2343400-01</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form method="post" role="form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
             
              <div class="text-center"><button type="submit" name="submit" class="button">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "footer.php";
  ?>