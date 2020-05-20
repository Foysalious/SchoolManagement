<?php
  	include"includes/header.php";
  	include"includes/navbar.php";
  	include"includes/sidebar.php";
?>

	<!-- main body content start -->
	<section class="addmentor-header-section" style="margin-left: 250px;">
		<div class="container">
			
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
								$std_batch_name		= 	$row['batch_name'];
								$std_course_name	= 	$row['course_name'];
								$transport 			= 	$row['transport']

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

							<div class="form-group">
							  	<label>Transport</label>
							  	<select class="form-control" name="update_transport">
							  		<?php
							  			$query 				= " SELECT * FROM transport ";
					                    $all_transport 		= mysqli_query($connect,$query);

					                    while( $row = mysqli_fetch_assoc($all_transport) ){
					                    	$transport_id 	= $row['id'];
					                    	$vehicle_number = $row['vehicle_number'];
					                ?>
					                <option value="0">No Transport</option>
							  		<option value="<?php echo $transport_id; ?>" <?php if( $transport_id == $transport ){ echo "selected"; } ?> ><?php echo $vehicle_number; ?></option>
							  		<?php
							  			}
							  		?>
							  	</select>
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
								<label>Update Your Batch</label>
								<select class="form-control" name="updated-batch">
								<?php
									$query = "SELECT * FROM batch";
				                  	$get_batch = mysqli_query($connect,$query);
				                  	
				                  	while( $row = mysqli_fetch_assoc($get_batch) ){
				                    $batch_id           = $row['id'];
				                    $batch_name 		= $row['batch_name'];
				                    $sitting_capacity   = $row['sitting_capacity'];

				                    $query      = "SELECT * FROM student WHERE batch_name = '$batch_id' ";
				                    $get_std_info   = mysqli_query($connect,$query);

				                    $i=0;
				                    while($row = mysqli_fetch_assoc($get_std_info)){
				                      $i++;
				                    }

				                ?>
				                <option value="<?php echo $batch_id; ?>" <?php if( $batch_id == $std_batch_name ){ echo "selected"; } else if( $sitting_capacity == $i ){ echo "disabled"; }  ?> ><?php echo $batch_name; ?></option>									
								<?php
									}//end while
								?>
								</select>
							</div>

							<div class="form-group">
								<label>Update Your Course</label>
								<select class="form-control" name="updated-course">
								<?php
									$query = "SELECT * FROM allcourse";
				                  	$get_batch = mysqli_query($connect,$query);
				                  	
				                  	while( $row = mysqli_fetch_assoc($get_batch) ){
				                    $course_id           	= $row['course_id'];
				                    $course_title           = $row['course_title'];
				                ?>
									<option value="<?php echo $course_id; ?>" <?php if( $course_id == $std_course_name ){ echo "selected"; } ?> ><?php echo $course_title; ?></option>
								<?php
									}//end while
								?>
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
						$std_u_batch 					=	$_POST['updated-batch'];
						$std_u_course 					=	$_POST['updated-course'];
						$std_u_img						=	$_FILES['std_image']['name'];
						$std_tmp_img 					=	$_FILES['std_image']['tmp_name'];
						$update_transport 				=	$_POST['update_transport'];
						move_uploaded_file($std_tmp_img, 'dist/img/$std_u_img');

						if( $sitting_capacity != $i ){

							if( empty($std_tmp_img) ){
								$update_mentor_Query 	= 	"UPDATE student SET  std_fullname='$std_u_fullname', std_f_name = '$std_u_f_name', std_m_name='$std_u_m_name', std_phone='$std_u_phone', std_gender='$std_u_g', course_name = '$std_u_course', batch_name = '$std_u_batch', transport = '$update_transport'  WHERE std_id='$std_id' ";
								
									$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

								if( !$update_mentor ){
									die("Update failed" . mysqli_error($connect) );
								}
								else{
									header("location:viewstudent.php");
								}
							}
							else{
								$update_mentor_Query 	= 	"UPDATE student SET  std_fullname='$std_u_fullname', std_f_name = '$std_u_f_name', std_m_name='$std_u_m_name', std_phone='$std_u_phone', std_gender='$std_u_g' , std_image = '$std_u_img', course_name = '$std_u_course', batch_name = '$std_u_batch', transport = '$update_transport'  WHERE std_id='$std_id' ";
									$update_mentor 			= mysqli_query($connect,$update_mentor_Query);

								if( !$update_mentor ){
									die("Update failed" . mysqli_error($connect) );
								}
								else{
									header("location:viewstudent.php");
								}
							}
						}

						else{
							echo "Seat Fill up";
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