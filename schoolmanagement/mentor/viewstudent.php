<?php
  	include"includes/header.php";
  	include"includes/navbar.php";
  	include"includes/sidebar.php";
?>




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          

          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="row">
					<div class="col-md-8">
						<h1>view All Student</h1>
					</div>
				</div>
              </div>
              
              <!-- all item here -->
              <div class="card-body">
                  <form class="action" method="post">
						<div class="row">
							<div class="col-md-12 ">
								<select class="form-control" name="std_batch_id">
									<?php


										$my_id = $_SESSION['mentorId'];
										$query = "SELECT * FROM batch WHERE mentor_name = '$my_id' ";
										$get_batch = mysqli_query($connect,$query);
										
										while( $row = mysqli_fetch_assoc($get_batch) ){
											$batch_id = $row['id'];
											$batch_name = $row['batch_name'];
											$batch_mentor_name = $row['mentor_name'];
										
									?>
									<option value="<?php echo $batch_id; ?>" ><?php echo $batch_name; ?></option>	
									<?php
										}
									?>					
								</select>				
							</div>
							<div class="col-md-12 get_batch_std">
								<input type="submit" class="form-control btn btn-warning" name="view-std">
							</div>
							<?php

							if( isset($_POST['view-std']) ){
								$get_std_id = $_POST['std_batch_id'];
							?>

							<!-- mentor table row start -->
							<div class="row" style="margin-top: 50px; margin-left: 100px;">
								<div class="col-md-12">


									<!-- table start -->
									<table class="table">
										<thead class="thead-dark">
										   	<tr>
											    <th scope="col">Student id</th>
											    <th scope="col">Image</th>
											    <th scope="col">Full Name</th>
											    <!--<th scope="col">Fathers Name</th>
											    <th scope="col">Mothers Name</th>-->
											    <th scope="col">Phone number</th>
											    <th scope="col">Gender</th>
											    <th scope="col">Date of Birth</th>
											    <th scope="col">Course</th>
											    <th scope="col">Batch</th>
											    <th scope="col">Action</th>
										    </tr>
										</thead>
										<tbody>

											<?php 

											$query = "SELECT * FROM batch ";
											$get_batch = mysqli_query($connect,$query);
											
											while( $row = mysqli_fetch_assoc($get_batch) ){
												$batch_id = $row['id'];
											}

											$query 			= "SELECT * FROM student WHERE batch_name = '$get_std_id' ";
											$get_std_info 	= mysqli_query($connect,$query);
											$i=0;
											while($row = mysqli_fetch_assoc($get_std_info)){

												$std_id 			= 	$row['std_id'];
												$std_fullname		= 	$row['std_fullname'];
												$std_f_name			=	$row['std_f_name'];
												$std_m_name			=	$row['std_m_name'];
												$std_username		=	$row['std_username'];
												$std_password		=	$row['std_password'];
												$std_email			=	$row['std_email'];
												$std_phone			=	$row['std_phone'];
												$std_address 		= 	$row['std_address'];
												$std_dob 			= 	$row['std_dob'];
												$std_gender 		= 	$row['std_gender'];
												$std_image 			= 	$row['std_image'];
												$course_name 		= 	$row['course_name'];
												$batch_name 		= 	$row['batch_name'];
												$i++;
											?>

											<tr>
										      	<th scope="row"><?php echo $i; ?></th>
										      	<td>
										      		<?php
										      			if($std_image==NULL){
										      		?>
										      		 <img src="dist/img/default.png" style='width: 50px;'>

										      		<?php	
										      		}
										      			else{
										      		?>
										      		<img src="dist/img/<?php echo $std_image; ?>" style='width: 50px;'>

										      		<?php
										      			}
										      		?>
										      		
										      	</td>
										      	<td><?php echo $std_fullname; ?></td>
										      	<!--<td><?php echo $std_f_name; ?></td>
										      	<td><?php echo $std_m_name; ?></td>-->
										      	<td><?php echo $std_phone; ?></td>
										      	<td>
										      		<?php 
										      			if( $std_gender == 0 ){
										      				echo "<div class='badge badge-primary'>Male</div>";
										      			}
										      			else if( $std_gender == 1 ){
										      				echo "<div class='badge badge-success'>Female</div>";
										      			}
										      			else if( $std_gender == 2 ){
										      				echo "<div class='badge badge-warning'>Other</div>";
										      			}
										      		?>						      					      	
										      		</td>
										      	<td><?php echo $std_dob; ?></td>

										      	<!-- course name query start-->
							                    <?php 
							                      
							                      $query = "SELECT * FROM allcourse";
							                      $get_course_id = mysqli_query($connect,$query);

							                      while( $row = mysqli_fetch_assoc($get_course_id) ){
							                        $courseid                   = $row['course_id'];
							                        $courseFinalName            = $row['course_title'];
							                        if( $course_name == $courseid ){
							                      ?>
							                      <td><?php echo $courseFinalName; ?></td>
							                      <?php
							                          }
							                        }
							                    ?>
							                    <!-- course name query end-->

										      	<!-- batch name query start-->
							                    <?php 
							                      
							                      $query = "SELECT * FROM batch";
							                      $get_batch_id = mysqli_query($connect,$query);

							                      while( $row = mysqli_fetch_assoc($get_batch_id) ){
							                        $batchid                   = $row['id'];
							                        $batchFinalName            = $row['batch_name'];
							                        if( $batch_name == $batchid ){
							                      ?>
							                      <td><?php echo $batchFinalName; ?></td>
							                      <?php
							                          }
							                        }
							                    ?>
							                    <!-- batch name query end-->

										      	<td class="action">
										      		<ul>
										      			<li><a href="updatestudent.php?update=<?php echo $std_id; ?>"><i class="fas fa-edit"></i></a></li>
										      			<li><a href="viewstudent.php?delete=<?php echo $std_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
										      		</ul>
										      	</td>
										    </tr>

											<?php	
												}
											?>

											<!-- delete mentor php code -->
											<?php
											if(isset($_GET['delete'])){
												$delete_student_id 	= $_GET['delete'];

												$delete_std_query 		= "DELETE FROM student WHERE std_id='$delete_student_id ' ";

												$delete_std 				= mysqli_query($connect,$delete_std_query);

												if(!$delete_std ){
													die("Delete failed" . mysqli_error($connect) );
												}
												else{
													header("location:viewstudent.php");
												}
											}

											?>
											<!-- delete mentor php code -->
										    
										</tbody>
									</table>
									<!-- table end -->
									

								</div>
							</div>
							<!-- mentor table row end -->
							
							<?php
								}
							?>
						</div>
					</form>		
              </div>
              <!-- all item here -->

            </div>
          </div>
          <!-- /.col-md-12 -->

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php
	include"includes/footer.php";
?>