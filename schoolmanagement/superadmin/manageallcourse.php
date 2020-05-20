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
					<h1>Manage all course</h1>
				</div>
			</div>
			

			<div class="row" style="padding: 50px 0;">
				
				<!-- add course start -->
				<div class="col-md-6">
					<h2>add new course</h2>
					<form action="" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="course_title">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="course_desc"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn btn-flat btn-warning" value="Add Course" name="addcourse">
						</div>

						<!-- php code start -->
						<?php

						if( isset($_POST['addcourse']) ){
							$course_title 	= mysqli_real_escape_string($connect,$_POST['course_title'] ) ;
							$course_desc 	= mysqli_real_escape_string($connect,$_POST['course_desc'] ) ; 

							$query 		= "INSERT INTO allcourse (course_title,course_desc) VALUES ('$course_title', '$course_desc' ) ";
							$addcourse 	= mysqli_query($connect,$query);

							if( !$addcourse ){
								die("ERROR!" . mysqli_error($connect) );
							}
							else{
								header("location:manageallcourse.php");
							}
							
						}

						?>
						<!-- php code end -->
					</form>
				</div>
				<!-- add course end -->

				<!-- view all course start -->
				<div class="col-md-6">
					<h2>View All Course</h2>
					<form class="action" method="">
						<table class="table">
							<thead>
							    <tr>
							      	<th scope="col">SI.</th>
							      	<th scope="col">Couse title</th>
							      	<th scope="col">Course description</th>
							      	<th scope="col">Action</th>
							    </tr>
							</thead>
							<tbody>

								<!-- php code start -->
								<?php
									
									$get_query 		= "SELECT * FROM allcourse";
									$get_course 	= mysqli_query($connect,$get_query);
									$i = 0;

									while( $row = mysqli_fetch_assoc($get_course) ){
										$get_id 	= $row['course_id'];
										$get_title 	= $row['course_title'];
										$get_desc 	= $row['course_desc'];
										$i++;
								?>

									<tr>
								      	<th scope="row"> <?php echo $i; ?> </th>
								      	<td> <?php echo $get_title; ?> </td>
								      	<td> <?php echo $get_desc; ?> </td>
								      	<td>
								      		<ul>
								      			<li><a href="manageallcourse.php?update=<?php echo $get_id; ?>"><i class="fas fa-edit"></i></a></li>
								      			<li><a href="manageallcourse.php?delete=<?php echo $get_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
								      		</ul>
								      	</td>
								    </tr>

								<?php
									}
								?>
								<!-- php code end -->

							    
							</tbody>
						</table>
					</form>
				</div>
				<!-- view all course end -->
			</div>


			<div class="row">
					
					<!-- update all course category start-->
					<div class="col-md-6">
						
						
						<?php

						if( isset( $_GET['update'] ) ){
							$update_id	= $_GET['update'];

							$update_query 	= "SELECT * FROM allcourse WHERE course_id = '$update_id' ";
							$update_course	= mysqli_query($connect,$update_query);

							while( $row = mysqli_fetch_assoc($update_course) ){
								$update_title 	= $row['course_title'];
								$update_desc 	= $row['course_desc']; 
						?>
						<h2>Update Course</h2>
						<form action="" method="post">
							<div class="form-group">
								<input type="text" class="form-control" name="update_course_title" value="<?php echo $update_title; ?>">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="update_course_desc"><?php echo $update_desc; ?></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="form-control btn btn-flat btn-warning" value="Update Course" name="updatecourse">
							</div>
						</form>

						<?php
							}
						}

						//update couse php code start
						if( isset( $_POST['updatecourse'] ) ){
							$update_course_title 	= mysqli_real_escape_string($connect,$_POST['update_course_title'] ) ;
							$update_course_desc 	= mysqli_real_escape_string($connect,$_POST['update_course_desc'] ) ;

							$updated_query 	= "UPDATE allcourse SET course_title = '$update_course_title', course_desc = '$update_course_desc' WHERE course_id = '$update_id' ";

							$update_courses = mysqli_query($connect,$updated_query);

							if( !$update_courses ){
								die("ERROR" . mysqli_error($connect) );
							}
							else{
								header("location:manageallcourse.php");
							}
						}

						//delete course php code start
						if( isset($_GET['delete']) ){
							$delete_course	= $_GET['delete'];

							$delete_query 	= "DELETE FROM allcourse WHERE course_id = '$delete_course' ";

							$delete_course 	= mysqli_query($connect,$delete_query);

							if( !$delete_course ){
								die("ERROR!" . mysqli_error($connect) );
							}
							else{
								header("location:manageallcourse.php");
							}
						}

						?>

					</div>
					<!-- update all course category end-->

				</div>
			

		</div>
	</section>
	<!-- main body content end -->

<?php
	include"includes/footer.php";
?>