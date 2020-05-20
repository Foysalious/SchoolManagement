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
					<h1>view mentor</h1>
				</div>
			</div>
			
			<!-- mentor table row start -->
			<div class="row">
				<div class="col-md-12">

					<!-- table start -->
					<table class="table">
						<thead class="thead-dark">
						   	<tr>
							    <th scope="col">ID</th>
							    <th scope="col">Avatar</th>
							    <th scope="col">Full Name</th>
							    <th scope="col">User Name</th>
							    <th scope="col">User Role</th>
							    <th scope="col">Email Address</th>
							    <th scope="col">Phone number</th>
							    <th scope="col">Status</th>
							    <th scope="col">Action</th>
						    </tr>
						</thead>
						<tbody>

							<?php 
							$query 			= "SELECT * FROM addmentor";
							$get_user_info 	= mysqli_query($connect,$query);
							$i=0;
							while($row = mysqli_fetch_assoc($get_user_info)){
								$user_id 		= 	$row['mentorId'];
								$user_image		= 	$row['image'];
								$user_fullname	=	$row['mentorFullname'];
								$user_username	=	$row['mentorUserName'];
								$user_email		=	$row['email'];
								$user_phone		=	$row['phone'];
								$user_role		=	$row['user_role'];
								$status			=	$row['status'];
								$role 			= 	$row['user_role'];
								$i++;
							?>

							<tr>
						      	<th scope="row"><?php echo $i; ?></th>
						      	<td>
						      		<?php
						      			if($user_image==NULL){
						      		?>
						      		 <img src="dist/img/default.png" style='width: 50px;'>

						      		<?php	
						      		}
						      			else{
						      		?>
						      		<img src="dist/img/<?php echo $user_image; ?>" style='width: 50px;'>

						      		<?php
						      			}
						      		?>
						      		
						      	</td>
						      	<td><?php echo $user_fullname; ?></td>
						      	<td><?php echo $user_username; ?></td>
						      	<td>
						      		<?php 
						      			if( $user_role == 0 ){
						      				echo "<span class='badge badge-success' >Super Admin</span>";
						      			} 
						      			else if ( $user_role == 1 ) {
						      				echo "<span class='badge badge-warning' >Mentor</span>";
						      			}
						      			else{
						      				echo "<span class='badge badge-primary' >Not Define</span>";
						      			}
						      		?>
						      			
						      	</td>
						      	<td><?php echo $user_email; ?></td>
						      	<td><?php echo $user_phone; ?></td>
						      	<td>
						      		<?php 
							      		if($status==0){
							      			echo "<div class='badge badge-primary'>active</div>";
							      		}
							      		else{
							      			echo "<div class='badge badge-danger'>Inactive</div>";
							      		}
						      	 	?>
						      		
						      	</td>
						      	<td class="action">
						      		<ul>
						      			<li><a href="updateMentor.php?update=<?php echo $user_id; ?>"><i class="fas fa-edit"></i></a></li>
						      			<li><a href=""><i class="fas fa-eye"></i></a></li>

						      			<?php 
						      				if( $user_role == 0 ){

						      				}
						      				else if( $user_role == 1 ){?>
						      					<li><a href="viewmentor.php?delete=<?php echo $user_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
						      				<?php }
						      			?>
						      			
						      		</ul>
						      	</td>
						    </tr>

							<?php	
								}
							?>

							<!-- delete mentor php code -->
							<?php
							if(isset($_GET['delete'])){
								$delete_mentor_id 	= $_GET['delete'];

								$delete_mentor_query 		= "DELETE FROM addmentor WHERE mentorId='$delete_mentor_id' ";

								$delete_mentor 				= mysqli_query($connect,$delete_mentor_query);

								if(!$delete_mentor){
									die("Delete failed" . mysqli_error($connect) );
								}
								else{
									header("location:viewmentor.php");
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

		</div>
	</section>
	<!-- main body content end -->

<?php
	include"includes/footer.php";
?>