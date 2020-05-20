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
					<h1>update All Student</h1>
				</div>
			</div>
			
			
				
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">

					<?php 
						if( isset($_GET['update']) ){
							$update_std_id		=	$_GET['update'];

							$update_std_query	=	"SELECT * FROM student WHERE std_id = '$update_std_id' ";
							$update_std 			=	mysqli_query($connect,$update_std_query);

							while ($row = mysqli_fetch_assoc($update_std)) {
								$std_id 			= 	$row['std_id'];
								$std_fullname		= 	$row['std_fullname'];
								$std_f_name			=	$row['std_f_name'];
								$std_m_name			=	$row['std_m_name'];
								$std_phone			=	$row['std_phone'];
								$std_gender			=	$row['std_gender'];
								$std_image 			= 	$row['std_image'];

					?>
						
					<!-- mentor table row start -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fullname</label>
								<input type="text" class="form-control" name="std_fullname" required="required" value="<?php echo $std_fullname; ?>">
							</div>
							<div class="form-group">
								<label>Fathers Name</label>
								<input type="text" class="form-control" name="std_f_name" required="required" value="<?php echo $std_f_name; ?>">
							</div>
							<div class="form-group">
								<label>Mothers Name</label>
								<input type="text" class="form-control" name="std_m_name" required="required" value="<?php echo $std_m_name; ?>">
							</div>
						
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" class="form-control" name="std_phone" required="required" value="<?php echo $std_phone	; ?>">
							</div>
							
						</div>

						<div class="col-md-6">		

							<div class="form-group">
								<label>Gender</label>

								<select class="form-control" name="std_gender">
									<option>Select Your Gender</option>
									<option value="0" <?php if( $std_gender == 0 ){ echo "selected"; } ?> >Male</option>
									<option value="1" <?php if( $std_gender == 1 ){ echo "selected"; } ?> >Female</option>
									<option value="2" <?php if( $std_gender == 2 ){ echo "selected"; } ?> >Other</option>
								</select>

							</div>
							<div class="form-group">
								<label>profile picture</label>
								<br>

								<?php
								if($std_image==NULL){
								?>
								<img src="dist/img/default.png" style="width: 50px;">
								<?php	
								}
								else{
								?>
								<img src="dist/img/<?php echo $std_image; ?>" style="width: 50px;">
								<?php	
								}
								?>

								
								

								<br><br>
								<input type="file" class="form-control-file" name="std_image">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-warning btn-flat" value="Update Student" name="updateStudent" required="required">
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

					 if(isset($_POST['updateStudent'])){
					 	$std_u_fullname					=	$_POST['std_fullname'];
						$std_u_f_name 					=	$_POST['std_f_name'];
						$std_u_m_name 					=	$_POST['std_m_name'];
						$std_u_phone 					=	$_POST['std_phone'];
						$std_u_g 						=	$_POST['std_gender'];
						$std_u_img						=	$_FILES['std_image']['name'];
						$std_tmp_img 					=	$_FILES['std_image']['tmp_name'];
						move_uploaded_file($std_tmp_img, 'dist/img/$std_u_img');

							

						if( empty($std_tmp_img) ){
							$update_mentor_Query 	= 	"UPDATE student SET  std_fullname='$std_u_fullname', std_f_name = '$std_u_f_name', std_m_name='$std_u_m_name', std_phone='$std_u_phone', std_gender='$std_u_g'  WHERE std_id='$std_id' ";
							
								$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

							if( !$update_mentor ){
								die("Update failed" . mysqli_error($connect) );
							}
							else{
								header("location:viewstudent.php");
							}
						}
						else{
							$update_mentor_Query 	= 	"UPDATE student SET  std_fullname='$std_u_fullname', std_f_name = '$std_u_f_name', std_m_name='$std_u_m_name', std_phone='$std_u_phone', std_gender='$std_u_g' , std_image = '$std_u_img'  WHERE std_id='$std_id' ";
								$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

							if( !$update_mentor ){
								die("Update failed" . mysqli_error($connect) );
							}
							else{
								header("location:viewstudent.php");
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