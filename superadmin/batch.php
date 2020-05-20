<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section" style="margin-left: 250px;">
    <div class="container">

      <?php

        if( $_SESSION['mentorUserName'] ){ // if-session start

          $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

          if( $do == 'manage' ){ 
      ?>
        
        <div class="row">
          <div class="col-md-12">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SI</th>
                  <th scope="col">Batch Name</th>
                  <th scope="col">Mentor Name</th>
                  <th scope="col">Sitting Capacity</th>
                  <th scope="col">Total Student</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php

                  $query = "SELECT * FROM batch";
                  $get_batch = mysqli_query($connect,$query);
                  $i = 0;
                  

                  while( $row = mysqli_fetch_assoc($get_batch)){
                    $batch_id           = $row['id'];
                    $batch_name         = $row['batch_name'];
                    $mentor_name        = $row['mentor_name'];
                    $sitting_capacity   = $row['sitting_capacity'];
                    $total_student      = $row['total_student'];
                    $course_name        = $row['course_name'];
                    $status             = $row['status'];
                    $i++;

                ?>

                <tr>
                  <td><?php echo $i; ?></td>

                  <td><?php echo $batch_name;  ?></td>
                  

                    <!-- mentor name query start-->
                    <?php 
                      
                      $query = "SELECT * FROM addmentor";
                      $get_mentor_id = mysqli_query($connect,$query);

                      while( $row = mysqli_fetch_assoc($get_mentor_id) ){
                        $mentorid           = $row['mentorId'];
                        $mentorFinalName    = $row['mentorFullname'];
                        if( $mentorid == $mentor_name ){
                      ?>
                      <td><?php echo $mentorFinalName; ?></td>
                      <?php
                          }
                        }
                    ?>
                    <!-- mentor name query end-->
                      


                  <td><?php echo $sitting_capacity;   ?></td>

                  <!--<td><?php echo $total_student; ?></td> -->



                  <!-- total student start -->
                  <?php
                    $query      = "SELECT * FROM student WHERE batch_name = '$batch_id' ";
                    $get_std_info   = mysqli_query($connect,$query);

                    $i=0;
                    while($row = mysqli_fetch_assoc($get_std_info)){
                      $i++;
                    }
                    $addmitted_std = "UPDATE batch SET total_student = '$i' WHERE batch_name = '$batch_id' " ;

                    $update_batch_student = mysqli_query($connect,$addmitted_std);

                    if( !$update_batch_student ){
                      die("error" . mysqli_error($connect));
                    }
                    else{
                  ?>
                  <td><?php echo $i;  ?></td>
                    
                    <?php

                    $addmitted_std = "UPDATE batch SET total_student = '$i' WHERE id = '$batch_id' ";
                    $addmit_srudent_conf = mysqli_query($connect,$addmitted_std);

                    if( !$addmit_srudent_conf ){
                      die("error" . mysqli_error($connect));
                    }
                  }

                  ?>
                  
                  <!-- total student end -->

                  
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
                  
                  <td>
                    
                    <?php 
                      $query      = "SELECT * FROM student WHERE batch_name = '$batch_id' ";
                      $get_std_info   = mysqli_query($connect,$query);

                      $i=0;
                      while($row = mysqli_fetch_assoc($get_std_info)){
                        $i++;
                      }
                        if( $i < $sitting_capacity ){
                    ?>
                      <p class="badge badge-success">Admission Running</p>
                    <?php

                       }

                        else if( $i >= $sitting_capacity ){
                    ?>                    
                      <p class="badge badge-danger">Admission Closed</p>
                    <?php

                       }
                    ?>
                      
                  </td>

                  <td class="action">
                    <ul>
                      <li><a href="batch.php?do=edit&update=<?php echo $batch_id ; ?>"><i class="fas fa-edit"></i></a></li>
                      <li><a href="batch.php?do=delete&delete=<?php echo $batch_id ; ?>"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                  </td>

                </tr>

                <?php
                  } // END _ WHILE

                ?>

              </tbody>
            </table>

          </div>
        </div>

      <?php

          }// if - manage end
          
          else if( $do == 'add' ){

      ?>

      <!-- add batch form start -->
      <form action="?do=insert" method="post" enctype="multipart/form-data">
        <div class="row">
         
          <!-- col-md-12 start -->
          <div class="col-md-12">
            
            <div class="form-group">
              <label>Batch Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
              <label>Mentor Name</label>
              <!-- get mentor name -->             
                <select class="form-control" required name="mentor_name">
                  <option selected="">Select Mentor Name</option>
                  <?php
                      $query = "SELECT * FROM addmentor";
                      $get_mentor_name = mysqli_query($connect,$query);
                      while( $row = mysqli_fetch_assoc($get_mentor_name) ){
                        $mentor_id    = $row['mentorId'];
                        $mentor_name  = $row['mentorFullname'];
                        $mentor_role  = $row['user_role'];

                        if( $mentor_role == 1 ){
                    ?>
                  <option value="<?php echo $mentor_id ?>"><?php echo $mentor_name; ?></option>
                  <?php
                      } // end if
                    } // end while
                  ?>
                </select>              
            </div>

            <div class="form-group">
              <label>Sitting Capacity</label>
              <input type="number" class="form-control" name="sit_cap" required>
            </div>

            <div class="form-group">
              <label>Total Admitted</label>
              <input type="number" class="form-control" name="tot_admit" required="required" value="">
              
            </div>

            <div class="form-group">
              <label>Course Name</label>
              <!-- get course name -->             
                <select class="form-control" required name="course_name">
                  <option selected="">Select Course Name</option>
                  <?php
                      $query = "SELECT * FROM allcourse";
                      $get_course_name = mysqli_query($connect,$query);
                      while( $row = mysqli_fetch_assoc($get_course_name) ){
                        $course_id      = $row['course_id'];
                        $course_title   = $row['course_title'];

                  ?>
                    <option value="<?php echo $course_id ?>"><?php echo $course_title; ?></option>
                  <?php
                    } // end while
                  ?>
                </select>
            </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="add_start" id="exampleRadios1" value="0" checked required>
                <label class="form-check-label" for="exampleRadios1">
                  Admission Start
                </label>
              </div>
            </div>

            <div class="form-group">
              <input type="submit" class="form-control btn btn-warning" name="addBatch" value="Add New Batch">
            </div>

          </div>
          <!-- col-md-12 end -->
       
        </div> 
      </form>     
      <!-- add batch form end -->

      <?php

          } // end add

          else if ($do == 'insert' ){

            if( isset($_POST['addBatch']) ) {
              $name           = $_POST['name'];
              $mentor_name    = $_POST['mentor_name'];
              $sit_cap        = $_POST['sit_cap'];
              $tot_admit      = $_POST['tot_admit'];
              $course_name    = $_POST['course_name'];
              $add_start      = $_POST['add_start'];

              $query = "INSERT INTO batch (batch_name,mentor_name,sitting_capacity,total_student,course_name,status) VALUES('$name','$mentor_name','$sit_cap','$tot_admit','$course_name','$add_start') ";
              $add_batch = mysqli_query($connect,$query);

              if( !$add_batch ) {
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:batch.php");
              }

            }

          }// end insert

          //edit start
          else if( $do == 'edit' ){

            if( isset($_GET['update']) ){
              $the_up_id = $_GET['update'];

              $query = "SELECT * FROM batch WHERE id = '$the_up_id' ";
              $update_batch_value = mysqli_query($connect,$query);

              while( $row = mysqli_fetch_assoc($update_batch_value) ){
                $get_batch_name         = $row['batch_name'];
                $get_batch_mentor_name        = $row['mentor_name'];
                $get_sitting_capacity   = $row['sitting_capacity'];
                $get_total_student      = $row['total_student'];
                $get_batch_course_name        = $row['course_name'];
      ?>



      <!-- update batch form start -->
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
         
          <!-- col-md-12 start -->
          <div class="col-md-12">
            
            <div class="form-group">
              <label>Batch Name</label>
              <input type="text" class="form-control" name="update_name" required value="<?php echo $get_batch_name; ?>">
            </div>

            <div class="form-group">
              <label>Mentor Name</label>
              <!-- get mentor name -->             
                <select class="form-control" required name="update_mentor_name">
                  <?php
                      $query = "SELECT * FROM addmentor ";
                      $get_mentor_name = mysqli_query($connect,$query);
                      while( $row = mysqli_fetch_assoc($get_mentor_name) ){
                        $mentor_id    = $row['mentorId'];
                        $mentor_name  = $row['mentorFullname'];
                        $mentor_role  = $row['user_role'];

                        if( $mentor_role == 1 ){
                    ?>
                  <option value="<?php echo $mentor_id ?>" <?php if( $mentor_id == $get_batch_mentor_name ){ echo "selected"; } ?> ><?php echo $mentor_name; ?></option>
                  <?php
                      } // end if
                    } // end while
                  ?>
                </select>              
            </div>

            <div class="form-group">
              <label>Sitting Capacity</label>
              <input type="number" class="form-control" name="update_sit_cap" required value="<?php echo $get_sitting_capacity; ?>">
            </div>

            <div class="form-group">
              <label>Course Name</label>
              <!-- get course name -->             
                <select class="form-control" required name="update_course_name">
                  <?php
                      $query = "SELECT * FROM allcourse";
                      $get_course_name = mysqli_query($connect,$query);
                      while( $row = mysqli_fetch_assoc($get_course_name) ){
                        $course_id      = $row['course_id'];
                        $course_title   = $row['course_title'];

                  ?>
                    <option value="<?php echo $course_id ?>" <?php if( $course_id == $get_batch_course_name ){ echo "selected"; } ?> ><?php echo $course_title; ?></option>
                  <?php
                    } // end while
                  ?>
                </select>
            </div>

            <div class="form-group">
              <input type="submit" class="form-control btn btn-warning" name="updateBatch" value="Update Batch">
            </div>

          </div>
          <!-- col-md-12 end -->
       
        </div> 
      </form>     
      <!-- update batch form end -->

      

      <?php

              //update batch value start
              if( isset($_POST['updateBatch']) ){
                $updated_name           = $_POST['update_name'];
                $updated_mentor_name    = $_POST['update_mentor_name'];
                $updated_sit_cap        = $_POST['update_sit_cap'];
                $updated_course_name    = $_POST['update_course_name'];

                $query = "UPDATE batch SET batch_name = '$updated_name', mentor_name = '$updated_mentor_name', sitting_capacity = '$updated_sit_cap', course_name = '$updated_course_name' WHERE id = '$the_up_id' ";

                $update_batch = mysqli_query($connect,$query);

                if( !$update_batch ){
                  die("error" . mysqli_error($connect));
                }
                else{
                  header("location:batch.php");
                }

              }
              //update batch value end

              }// while loop end

            }//if - isset end

          }//edit end


          // delete batch start
          else if( $do == 'delete' ){

            if( isset($_GET['delete']) ){
              $delete_id =  $_GET['delete'];
              $query = "DELETE FROM batch WHERE id = '$delete_id' ";
              $delete_batch = mysqli_query($connect,$query);

              if( !$delete_batch ){
                die("error" . ysqli_error($connect) );
              }
              else{
                header("location:batch.php");
              }
            }// if - isset(delete) end
          }
          // delete batch end
        
      } // IF - SESSION END

      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>