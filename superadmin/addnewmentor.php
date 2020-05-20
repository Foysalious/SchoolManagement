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
					<h1>Add new mentor</h1>
				</div>
			</div>
			
			
				
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">

					<?php
						if( isset($_POST['addNewMentor']) ){
							$FullName 				=	$_POST['fullname'];
							$userName 				=	$_POST['username'];
							$password 				=	$_POST['password'];
							$repeatPassword 		=	$_POST['repeatpassword'];

							if($password!=$repeatPassword){
								echo "Password doesn't match! Please try again";							
							}
							else{								
								$hasshedPassword 	=	sha1($repeatPassword);
								$email 				=	$_POST['email'];
								$phone 				=	$_POST['phone'];
								$address 			=	$_POST['address'];
								$user_role 			=	$_POST['user_role'];
								$status 			=	$_POST['status'];
								$mentor_img			=	$_FILES['image']['name'];
								$tmp_img 			=	$_FILES['image']['tmp_name'];
								move_uploaded_file($tmp_img, "dist/img/$mentor_img");

								$query = "INSERT INTO addmentor(mentorFullname,mentorUserName,password,email,phone,address,joinDate,status,user_role,image) VALUES('$FullName','$userName','$hasshedPassword','$email','$phone','$address',now(),'$status','$user_role','$mentor_img') ";

								$upload_mentor_info = mysqli_query($connect,$query);

								if(!$upload_mentor_info){
									die("Upload Error!" . mysqli_error($connect) );
								}
								else{
									header("location:viewmentor.php");
								}

							}

							
						}

					?>
					
					<!-- mentor table row start -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fullname</label>
								<input type="text" class="form-control" name="fullname" required="required">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" required="required">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input type="password" name="repeatpassword" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" required="required">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" name="phone" required="required">
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address" required="required">
							</div>
							<div class="form-group">
								<label>Status</label>
								
								<div class="form-check">
									<input type="radio" value="0" name="status" class="form-check-input" required="required">
									<label class="form-check-label">Active</label>
								</div>

								<div class="form-check">
									<input type="radio" value="1" name="status" class="form-check-input" required="required">
									<label class="form-check-label">Inative</label>
								</div>

							</div>

							<div class="form-group">
								<label>User Role</label>
								<select class="form-control" name="user_role">
									<option selected>Please Select The User Role</option>
									<option value="0">Super Admin</option>
									<option value="1">Mentor</option>
								</select>
							</div>

							<div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control-file" name="image">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-warning btn-flat" value="Add Mentor" name="addNewMentor" required="required">
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