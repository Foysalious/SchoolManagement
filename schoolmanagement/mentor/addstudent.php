<?php
  	include"includes/header.php";
  	include"includes/navbar.php";
  	include"includes/sidebar.php";
?>

	<!-- main body content start -->
	<section class="addmentor-header-section" style="margin-left: 270px;">
		<div class="container" style="margin: 0;">
			
			<div class="row">
				<div class="col-md-8">
					<h1>Add new Student</h1>
				</div>
			</div>
			
			
				
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">

					<?php

					if( isset($_POST['addNewStudent']) ){
						$std_fullname 			= $_POST['std_fullname'];
						$std_f_name 			= $_POST['std_f_name'];
						$std_m_name 			= $_POST['std_m_name'];
						$std_username 			= $_POST['std_username'];
						$std_password 			= $_POST['std_password'];
						$std_repeatpassword 	= $_POST['std_repeatpassword'];

						if( $std_password == $std_repeatpassword ){

							$std_hass_pass 			= sha1($std_repeatpassword);
							$std_email 				= $_POST['std_email'];
							$std_phone 				= $_POST['std_phone'];
							$std_address 			= $_POST['std_address'];
							$std_dob 				= $_POST['std_dob'];
							$std_gender 			= $_POST['std_gender'];
							$std_image 				= $_FILES['std_image']['name'];
							$tmp_std_image 			= $_FILES['std_image']['tmp_name'];

							move_uploaded_file($tmp_std_image, "dist/img/$std_image");

							$query 	= "INSERT INTO student (std_fullname,std_f_name,std_m_name,std_username,std_password,std_email,std_phone,std_address,std_dob,std_gender,std_image) VALUES ('$std_fullname','$std_f_name','$std_m_name','$std_username','$std_hass_pass','$std_email','$std_phone','$std_address','$std_dob','$std_gender','$std_image') ";

							$addStudent 	= mysqli_query($connect,$query);

							if( !$addStudent ){
								die("ERROR" . mysqli_error($connect) );
							}
							else{
								header("location:viewstudent.php");
							}


						}
						else{
							echo "<span class='badge badge-danger'>Password Didn't Match</span>";
						}

						
					}

					?>
					
					<!-- mentor table row start -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fullname</label>
								<input type="text" class="form-control" name="std_fullname" required="required">
							</div>
							<div class="form-group">
								<label>Father Name</label>
								<input type="text" class="form-control" name="std_f_name" required="required">
							</div>
							<div class="form-group">
								<label>Mother Name</label>
								<input type="text" class="form-control" name="std_m_name" required="required">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="std_username" required="required">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="std_password" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input type="password" name="std_repeatpassword" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="std_email" class="form-control" required="required">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" name="std_phone" required="required">
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="std_address" required="required">
							</div>
							<div class="form-group">
								<label>Date of Birth</label>
								<input type="Date" class="form-control" name="std_dob" required="required">
							</div>
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="std_gender">
									<option selected>Select Your Gender</option>
									<option value="0">Male</option>
									<option value="1">Female</option>
									<option value="2">Other</option>
								</select>
							</div>

							<div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control-file" name="std_image">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-warning btn-flat" value="Add Mentor" name="addNewStudent" required="required">
							</div>

						</div>

					</div>
					<!-- mentor table row end -->

				</form>
				<!-- form end -->
			

		</div>
	</section>
	<!-- main body content end -->

<?php
	include"includes/footer.php";
?>