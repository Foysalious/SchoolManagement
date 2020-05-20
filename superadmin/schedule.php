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
        <div class="col-md-6 offset-md-3">
          <h2>Manage Class Schedule</h2>
        </div>
      </div>
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Week Day</th>
            <th scope="col">Routine</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $query = " SELECT * FROM week_day ";
          $get_week_day = mysqli_query($connect,$query);

          while( $row = mysqli_fetch_assoc($get_week_day) ) {
            $week_id    = $row['id'];
            $week_day   = $row['day'];
          ?>
          <tr>
            <th scope="row"><?php echo $week_day; ?></th>

            <!-- day wise routine set query-->
            <?php
              $query = " SELECT * FROM schedule WHERE week_day = '$week_id' ";
              $set_day_wise = mysqli_query($connect,$query);
              while( $row = mysqli_fetch_assoc($set_day_wise) ){
                $id                   = $row['id'];
                $s_batch_id           = $row['batch_id'];
                $s_mentor_id          = $row['mentor_id'];
                $s_batch_type         = $row['batch_type'];
                $s_batch_week_day     = $row['week_day'];
                $s_batch_class_time    = $row['class_time'];

            ?>
              
              <td class="schedule-td">
                
                <!-- action -->
                <div class="schedule-td-action">
                  <ul>
                      <li data-toggle="modal" data-target="#exampleModal"><a href="schedule.php?do=edit&edit=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></li>
                      <li><a href="schedule.php?do=delete&delete=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                    </ul>
                </div>

                <!-- get batch_name -->
                <?php
                  $query = " SELECT * FROM batch WHERE id = '$s_batch_id' ";
                  $equal_batch_id = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($equal_batch_id) ){
                    $c_batch_name  = $row['batch_name'];
                  }
                ?>
                <p><?php echo $c_batch_name; ?></p>
                <!-- get batch_name -->

                <!--  get mentor name -->
                <?php
                  $query = " SELECT * FROM addmentor WHERE mentorId = '$s_mentor_id' ";
                  $equal_batch_id = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($equal_batch_id) ){
                    $c_mentor_name  = $row['mentorFullname'];
                  }
                ?>
                <p><?php echo $c_mentor_name; ?></p>
                <!--  get mentor name -->

                <!-- batch type -->
                <?php
                  if( $s_batch_type == 0 ){
                ?>
                <p class="badge badge-primary">Offline</p>
                <?php
                  }else{
                ?>
                <p class="badge badge-success">Online</p>
                <?php
                  } 
                ?>               
                <!-- batch type -->

                <!-- batch week day -->
                <?php
                  $query = " SELECT * FROM week_day WHERE id = '$s_batch_week_day' ";
                  $equal_batch_id = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($equal_batch_id) ){
                    $c_week_name  = $row['day'];
                  }
                ?>
                <p><?php echo $c_week_name; ?></p>
                <!-- batch week day -->

                <!-- batch class time name -->
                <?php
                  $query = " SELECT * FROM class_time WHERE id = '$s_batch_class_time' ";
                  $equal_batch_id = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($equal_batch_id) ){
                    $c_class_name  = $row['time'];
                  }
                ?>
                <p><?php echo $c_class_name; ?></p>
                <!-- batch class time name -->

              </td>

            <?php
              }
            ?> 
            <!-- day wise routine set query-->          

          </tr>
          <?php
          }//end while
          ?>
        </tbody>
      </table>      
      
      <?php

          }
          
          else if( $do == 'add' ){
      ?>            
      
      <div class="row">
        <div class="col-md-12">
          <h2>Add Class Schedule</h2>
        </div>

        <!-- class schedule form start -->
          <div class="col-md-12">
            
            <form action="?do=insert" method="post">

              <!-- select batch -->
              <div class="form-group">
                <label>select batch name</label>
                <select class="form-control" name="batch">
                  <?php 
                    $query        = " SELECT * FROM batch ";
                    $get_batch    = mysqli_query($connect,$query);
                    while( $row   = mysqli_fetch_assoc($get_batch) ){
                      $batch_id   = $row['id'];
                      $batch_name = $row['batch_name'];
                  ?>
                  <option value="<?php echo $batch_id; ?>"><?php echo $batch_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select batch end-->

              <!-- select mentor -->
              <div class="form-group">
                <label>select mentor name</label>
                <select class="form-control" name="m_id">
                  <?php 
                    $query          = " SELECT * FROM addmentor WHERE user_role = 1 ";
                    $get_mentor     = mysqli_query($connect,$query);
                    while( $row     = mysqli_fetch_assoc($get_mentor) ){
                      $mentor_id    = $row['mentorId'];
                      $mentor_name  = $row['mentorFullname'];
                  ?>
                  <option value="<?php echo $mentor_id; ?>"><?php echo $mentor_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select mentor end-->

              <!-- select batch type -->
              <div class="form-group">
                <label>batch type</label>
                <div class="custom-control custom-switch">
                  <div class="form-check">
                  <input class="form-check-input" type="radio"  id="exampleRadios1" value="0" name="b_type">
                  <label class="form-check-label" for="exampleRadios1">
                    Offline
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio"  id="exampleRadios2" value="1" name="b_type">
                  <label class="form-check-label" for="exampleRadios2">
                    Online
                  </label>
                </div>
              </div>
              <!-- select batch type end-->

              <!-- select week day -->
              <div class="form-group">
                <label>select week day</label>
                <select class="form-control" name="w_day">
                  <?php 
                    $query            = " SELECT * FROM week_day";
                    $get_week_day     = mysqli_query($connect,$query);
                    while( $row       = mysqli_fetch_assoc($get_week_day) ){
                      $week_id        = $row['id'];
                      $week_name      = $row['day'];
                  ?>
                  <option value="<?php echo $week_id; ?>"><?php echo $week_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select week day end--> 

              <!-- select class time  -->
              <div class="form-group">
                <label>select class time</label>
                <select class="form-control" name="c_time">
                  <?php 
                    $query            = " SELECT * FROM class_time";
                    $get_class_time     = mysqli_query($connect,$query);
                    while( $row       = mysqli_fetch_assoc($get_class_time) ){
                      $class_id        = $row['id'];
                      $class_name      = $row['time'];
                  ?>
                  <option value="<?php echo $class_id; ?>"><?php echo $class_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select class time  end-->  

              <!-- submit button -->
              <div class="form-group">
                <input type="submit" class="form-control btn btn-warning" value="Submit" name="addschedule">
              </div>            

            </form>
        </div>
        <!-- class schedule form end -->

      </div>

      <?php
          }//add end

          //insert start
          else if ($do == 'insert' ){
            if( isset($_POST['addschedule']) ){
              $batch    = $_POST['batch'];
              $m_id     = $_POST['m_id'];
              $b_type   = $_POST['b_type'];
              $w_day    = $_POST['w_day'];
              $c_time   = $_POST['c_time'];

              $query = " INSERT INTO schedule (batch_id,mentor_id,batch_type,week_day,class_time) VALUES ('$batch','$m_id','$b_type','$w_day','$c_time') ";
              $add_schedule = mysqli_query($connect,$query);

              if( !$add_schedule ) {
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:schedule.php");
              }

            }
          }
          //insert end

          else if( $do == 'edit' ){

            if( isset($_GET['edit']) ){

              $the_update_id = $_GET['edit'];

              $query = " SELECT * FROM schedule WHERE id = '$the_update_id' ";
              $update_value = mysqli_query($connect,$query);

              while( $row = mysqli_fetch_assoc($update_value) ){

                $get_batch_id       = $row['batch_id'];
                $get_mentor_id      = $row['mentor_id'];
                $get_batch_type     = $row['batch_type'];
                $get_new_week_day       = $row['week_day'];
                $get_classes_time   = $row['class_time'];



      ?>


      <div class="row">
        <div class="col-md-12">
          <h2>Update Class Schedule</h2>
        </div>

        <!-- class schedule form start -->
          <div class="col-md-12">
            
            <form action="" method="post">

              <!-- select batch -->
              <div class="form-group">
                <label>select batch name</label>
                <select class="form-control" name="update_batch">
                  <?php 
                    $query        = " SELECT * FROM batch";
                    $get_batch    = mysqli_query($connect,$query);
                    while( $row   = mysqli_fetch_assoc($get_batch) ){
                      $batch_id   = $row['id'];
                      $batch_name = $row['batch_name'];
                  ?>
                  <option value="<?php echo $batch_id; ?>" <?php if( $batch_id == $get_batch_id ){ echo "selected"; } ?> "><?php echo $batch_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select batch end-->

              <!-- select mentor -->
              <div class="form-group">
                <label>select mentor name</label>
                <select class="form-control" name="update_m_id">
                  <?php 
                    $query          = " SELECT * FROM addmentor WHERE user_role = 1";
                    $get_mentor     = mysqli_query($connect,$query);
                    while( $row     = mysqli_fetch_assoc($get_mentor) ){
                      $mentor_id    = $row['mentorId'];
                      $mentor_name  = $row['mentorFullname'];
                  ?>
                  <option value="<?php echo $mentor_id; ?>" <?php if($mentor_id == $get_mentor_id ){ echo "selected"; } ?> ><?php echo $mentor_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select mentor end-->

              <!-- select batch type -->
              <div class="form-group">
                <label>batch type</label>
                <div class="custom-control custom-switch">
                  <div class="form-check">
                  <input class="form-check-input" type="radio"  id="exampleRadios1" value="0" name="update_b_type"  <?php if( $get_batch_type ==0 ){ echo "checked"; } ?>>
                  <label class="form-check-label" for="exampleRadios1">
                    Offline
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio"  id="exampleRadios2" value="1" name="update_b_type" <?php if( $get_batch_type == 1 ){ echo "checked"; }  ?>>
                  <label class="form-check-label" for="exampleRadios2">
                    Online
                  </label>
                </div>
              </div>
              <!-- select batch type end-->

              <!-- select week day -->
              <div class="form-group">
                <label>select week day</label>
                <select class="form-control" name="update_w_day">
                  <?php 
                    $query            = " SELECT * FROM week_day";
                    $get_week_day     = mysqli_query($connect,$query);
                    while( $row       = mysqli_fetch_assoc($get_week_day) ){
                      $week_id        = $row['id'];
                      $week_name      = $row['day'];
                  ?>
                  <option value="<?php echo $week_id; ?>" <?php if( $week_id == $get_new_week_day ){echo "selected";} ?> ><?php echo $week_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select week day end--> 

              <!-- select class time  -->
              <div class="form-group">
                <label>select class time</label>
                <select class="form-control" name="update_c_time">
                  <?php 
                    $query            = " SELECT * FROM class_time ";
                    $get_class_time     = mysqli_query($connect,$query);
                    while( $row       = mysqli_fetch_assoc($get_class_time) ){
                      $class_id        = $row['id'];
                      $class_name      = $row['time'];
                  ?>
                  <option value="<?php echo $class_id; ?>" <?php if( $class_id == $get_classes_time ){echo "selected";} ?> ><?php echo $class_name; ?></option>
                  <?php
                    }
                  ?>                 
                </select>
              </div>
              <!-- select class time  end-->  

              <!-- submit button -->
              <div class="form-group">
                <input type="submit" class="form-control btn btn-warning" value="Submit" name="update_schedule">
              </div>            

            </form>
        </div>
        <!-- class schedule form end -->

      

      <?php
              //update class schedule php code start

              if( isset($_POST['update_schedule']) ){

                $updated_batch_name     = $_POST['update_batch'];
                $updated_m_id           = $_POST['update_m_id'];
                $update_b_type          = $_POST['update_b_type'];
                $update_w_day           = $_POST['update_w_day'];
                $update_c_time          = $_POST['update_c_time'];

                $query = "UPDATE schedule SET batch_id = '$updated_batch_name', mentor_id = '$updated_m_id', batch_type = '$update_b_type', week_day = '$update_w_day', class_time = '$update_c_time' WHERE id = '$the_update_id' ";
                $update_class_schedule = mysqli_query($connect,$query);

                if( !$update_class_schedule ){
                  die("error" . mysqli_error($connect));
                }
                else{
                  header("location:schedule.php");
                }

              }

              //update class schedule php code end

              }//while end
              

            }// if end

          }// edit end        


          else if( $do == 'delete' ){

            if( isset($_GET['delete']) ){
              $the_del_id = $_GET['delete'];

              $query = " DELETE FROM schedule WHERE id = '$the_del_id' ";
              $delete_schedule = mysqli_query($connect,$query);

              if( !$delete_schedule ){
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:schedule.php");
              }
            }

          }
        
      } // IF - SESSION END

      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>