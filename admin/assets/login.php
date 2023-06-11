<?php
 require "header.php";
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>LOG IN</h2>
    </div>

  </div>
</section><!-- End Breadcrumbs -->
<br><br>

<div class="container">
	<?php
	if(isset($_GET['err'])){
		echo" <div class='col-12 alert alert-danger'> Please Login First</div>";
	}
	if(isset($_POST['submit'])){
		include "config.php";
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$q = "select * from `admin` where `email`='$email' and `password` ='$password' ";
		$result = mysqli_query($conn,$q);
		if(mysqli_num_rows($result)>0){
			$data = mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['admin_id'] = $data['id'];
			$_SESSION['admin_name'] = $data['name'];
			echo "<script>window.location.assign('index.php')</script>";
		}else{
			
			 echo"<div class='alert alert-danger'>Invalid Email or Password.</div>";
			
		}
	}
	?>
    <form method="post" onsubmit="return checknull()">

	    <div class="mb-3">
          <img src="https://t3.ftcdn.net/jpg/02/32/71/62/360_F_232716200_xTsnomMS5djsC6m9cDNQmEKtPgt11Xjo.jpg" alt="avatar" class="avtar">
        </div>

       <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

		<div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" name="submit" class="btn btn-success">Login</button>

    </form>
</div>
<br><br>
<script>
	function checknull(){
		var email = document.getElementById('email').value;
		var password = document.getElememtById('password').value;
		if(email==""||password==""){
			returm false;
		}else{
			return true;
		}
	}
</script>
<?php
require "footer.php";
?>