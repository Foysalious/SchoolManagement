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

          //start manage
          if( $do == 'manage' ){ 
      ?>
      
      <div class="row">

        <div class="col-md-12">
          <h1>Transport Management</h1>
        </div>

        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">

              <tr>
                <th scope="col">ID</th>
                <th scope="col">destination</th>
                <th scope="col">vehicle number</th>
                <th scope="col">fare</th>
                <th scope="col">note</th>
                <th scope="col">Action</th>
              </tr>

            </thead>
            <tbody>

              <?php
                $query = " SELECT * FROM transport ";
                $get_transport = mysqli_query($connect,$query);
                $i = 0;

                while( $row = mysqli_fetch_assoc($get_transport) ){
                  $transport_id           = $row['id'];
                  $transport_destination  = $row['destination'];
                  $vehicle_number         = $row['vehicle_number'];
                  $transport_fare         = $row['fare'];
                  $transport_note         = $row['note'];
                  $i++;
              ?>
              
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $transport_destination; ?></td>
                <td><?php echo $vehicle_number; ?></td>
                <td><?php echo $transport_fare; ?></td>
                <td><?php echo $transport_note ?></td>

                <td class="action">
                  <ul>
                    <li><a href="transport.php?do=edit&update=<?php echo $transport_id; ?>"><i class="fas fa-edit"></i></a></li>
                    <li><a href="transport.php?do=delete&delete=<?php echo $transport_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                  </ul>
                </td>

              </tr>

              <?php
                }//End While
              ?>              

            </tbody>
          </table>
        </div>

      </div>

      <?php

          }//End manage 
          
          //start add
          else if( $do == 'add' ){

      ?>
        
        <div class="col-md-12">
          <h1>Add New Transport</h1>
        </div>   

        <div class="col-md-12">
          <form action="" method="post">
            
            <div class="form-group">
              <label>Transport Destination</label>
              <input type="text" class="form-control" name="t_destination" placeholder="Place Name to Place Name" required>
            </div>

            <div class="form-group">
              <label>Transport Number</label>
              <input type="text" class="form-control" name="t_number" placeholder="Demo(84-5698)" required>
            </div>

            <div class="form-group">
              <label>Transport Fare</label>
              <input type="text" class="form-control" name="t_fare" placeholder="500 Taka" required>
            </div>

            <div class="form-group">
              <label>Transport Note</label>
              <input type="text" class="form-control" name="t_note" placeholder="Per Month" required>
            </div>

            <div class="form-group">
              <input type="submit" class="form-control btn btn-warning" name="add_transport" value="Add Transport">
            </div>

          </form>
        </div>             
      
      <?php

          //add transport code
          if( isset($_POST['add_transport']) ){
            $t_destination    = $_POST['t_destination'];
            $t_number         = $_POST['t_number'];
            $t_fare           = $_POST['t_fare'];
            $t_note           = $_POST['t_note'];

            $query = "INSERT INTO transport (destination,vehicle_number,fare,note) VALUES ('$t_destination','$t_number','$t_fare','$t_note') ";
            $add_transport = mysqli_query($connect,$query);

            if( !$add_transport ){
              die("error" . mysqli_error($connect));
            }
            else{
              header("location:transport.php");
            }


          }

          }
          //end add

          else if( $do == 'edit' ){}

          else if( $do == 'update' ){}

          //delete start
          else if( $do == 'delete' ){
            if( isset($_GET['delete']) ){
              $the_del_id = $_GET['delete'];
              
              $query = "DELETE FROM transport WHERE id = '$the_del_id' ";
              $delete_transport = mysqli_query($connect,$query);

              if( !$delete_transport ){
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:transport.php");
              }

            }
          }
          //delete end

          
          //student list start
          else if( $do == 'studentList' ){

      ?>
          
          <div class="row">

            <div class="col-md-12">
              <h2>transport student list</h2>
            </div>

            <div class="col-md-12">
              <form action="" method="post">
                
                <div class="form-group">
                  <label>all transport</label>
                  <select class="form-control" name="std_id">
                    <?php
                      $query        = " SELECT * FROM transport ";
                          $all_transport    = mysqli_query($connect,$query);

                          while( $row = mysqli_fetch_assoc($all_transport) ){
                            $transport_id   = $row['id'];
                            $vehicle_number = $row['vehicle_number'];
                      ?>
                        <option value="<?php echo $transport_id; ?>" ><?php echo $vehicle_number; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <input type="submit" class="form-control btn btn-warning" value="submit" name="show_std">
                </div>

              </form>
            </div>

            <?php 

              if( isset($_POST['show_std']) ){
                $std_id = $_POST['std_id'];

            ?>
              
              <div class="col-md-12">
                <h2>
                  

                </h2>
              </div>

              <div class="col-md-12">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Address</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php


                            //student while
                            $query     = " SELECT * FROM student WHERE transport = '$std_id' ";
                            $all_student    = mysqli_query($connect,$query);
                            $i = '0' ;

                            while( $row = mysqli_fetch_assoc($all_student) ){
                              $std_f_name     = $row['std_f_name'];
                              $std_email      = $row['std_email'];
                              $std_phone      = $row['std_phone'];
                              $std_address    = $row['std_address'];
                              $i++;

                    ?>

                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $std_f_name; ?></td>
                      <td><?php echo $std_email; ?></td>
                      <td><?php echo $std_phone ?></td>
                      <td><?php echo $std_address ?></td>
                      <td class="action">
                        <ul>
                          <li><a href="updateMentor.php?update=<?php echo $user_id; ?>"><i class="fas fa-edit"></i></a></li>
                          <li><a href="viewmentor.php?delete=<?php echo $user_id; ?>"><i class="fas fa-trash-alt"></i></a></li>                      
                        </ul>
                      </td>
                    </tr>

                    <?php
                      }// end student while
                    ?>
                    
                  </tbody>
                </table>
              </div>

            <?php
              }
            ?>

            

          </div>

      <?php

          }
          //student list end
        

      } // IF - SESSION END

      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>