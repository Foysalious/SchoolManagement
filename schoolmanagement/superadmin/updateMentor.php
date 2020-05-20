<?php
  	include"includes/header.php";
  	include"includes/navbar.php";
  	include"includes/sidebar.php";
?>

	<!-- main body content start -->
	<section class="addmentor-header-section" style="margin-left: 250px;">
		<div class="container" style="margin: 0;">
			
			<div class="row">
				<div class="col-md-8">
					<h1>update mentor</h1>
				</div>
			</div>
			
			
				
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">

					<?php 
						if( isset($_GET['update']) ){
							$update_mentor_id	=	$_GET['update'];

							$update_mentor_query	=	"SELECT * FROM addmentor WHERE mentorId = '$update_mentor_id' ";
							$update_mentor 			=	mysqli_query($connect,$update_mentor_query);

							while ($row = mysqli_fetch_assoc($update_mentor)) {
								$user_id 		= 	$row['mentorId'];
								$user_image		= 	$row['image'];
								$user_fullname	=	$row['mentorFullname'];
								$user_username	=	$row['mentorUserName'];
								$user_email		=	$row['email'];
								$user_phone		=	$row['phone'];
								$status			=	$row['status'];
								$address 		= 	$row['address'];
								$user_role 		= 	$row['user_role'];

					?>
						
					<!-- mentor table row start -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fullname</label>
								<input type="text" class="form-control" name="fullname" required="required" value="<?php echo $user_fullname; ?>">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" required="required" value="<?php echo $user_username; ?>">
							</div>
						
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" required="required" value="<?php echo $user_email; ?>">
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" class="form-control" name="phone" required="required" value="<?php echo $user_phone	; ?>">
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address" required="required" value="<?php echo $address; ?>">
							</div>
						</div>

						<div class="col-md-6">							
							<div class="form-group">
								<label>Status</label>
								
								<div class="form-check">
									<input type="radio" value="0" name="status" class="form-check-input" id="active" required="required" <?php if( $status == 0 ){ echo "checked"; } ?> >
									<label class="form-check-label" for="active">Active</label>
								</div>

								<div class="form-check">
									<input type="radio" for="inactive" value="1" name="status" class="form-check-input" required="required" <?php if( $status == 1 ){ echo "checked"; } ?> >
									<label class="form-check-label" for="inactive">Inative</label>
								</div>

								<div class="form-group">
									<label>User Role</label>
									<select class="form-control" name="user_role_update">
										<option value="0" <?php if( $user_role  == 0 ){ echo "selected"; } ?> >Super Admin</option>
										<option value="1" <?php if( $user_role  == 1 ){ echo "selected"; } ?> >Mentor</option>
									</select>
								</div>

							</div>
							<div class="form-group">
								<label>profile picture</label>
								<br>

								<?php
								if($user_image==NULL){
								?>
								<img src="dist/img/default.png" style="width: 50px;">
								<?php	
								}
								else{
								?>
								<img src="dist/img/<?php echo $user_image; ?>" style="width: 50px;">
								<?php	
								}
								?>

								
								

								<br><br>
								<input type="file" class="form-control-file" name="image">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-warning btn-flat" value="Update Mentor" name="updateMentor" required="required">
							</div>

						</div>

					</div>
					<!-- mentor table row end -->


					<?php										
							}

						}
					 ?>

					 <!-- update password php code start -->
					 <?php

					 if(isset($_POST['updateMentor'])){
					 	$FullName 				=	$_POST['fullname'];
						$userName 				=	$_POST['username'];
						$email 					=	$_POST['email'];
						$phone 					=	$_POST['phone'];
						$address 				=	$_POST['address'];
						$status 				=	$_POST['status'];
						$user_role_update 		=	$_POST['user_role_update'];
						$mentor_img				=	$_FILES['image']['name'];
						$tmp_img 				=	$_FILES['image']['tmp_name'];
						move_uploaded_file($tmp_img, 'dist/img/$mentor_img');

							

						if( empty($mentor_img) ){
							$update_mentor_Query 	= 	"UPDATE addmentor SET  mentorFullname='$FullName', mentorUserName = '$userName', email='$email', phone='$phone', address='$address' , status = '$status' ,  user_role = '$user_role_update'  WHERE mentorId='$user_id' ";
								$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

							if( !$update_mentor ){
								die("Update failed" . mysqli_error($connect) );
							}
							else{
								header("location:viewmentor.php");
							}
						}
						else{
							$update_mentor_Query 	= 	"UPDATE addmentor SET  mentorFullname='$FullName', mentorUserName = '$userName', email='$email', phone='$phone', address='$address', status = '$status' , user_role = '$user_role_update' , image ='$mentor_img'  WHERE mentorId='$user_id' ";
								$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

							if( !$update_mentor ){
								die("Update failed" . mysqli_error($connect) );
							}
							else{
								header("location:viewmentor.php");
							}
						}

						


						
					 }

					 ?>
					 <!-- update password php code end -->
					
					

				</form>
				<!-- form end -->
			

		</div>
	</section>
	<!-- main body content end -->

<?php
	include"includes/footer.php";
?>