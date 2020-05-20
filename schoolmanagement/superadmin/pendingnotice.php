<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section">
    <div class="container">

      <?php



        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

        //manage start
        if( $do == 'manage' ){
        ?>

        <section class="addmentor-header-section" style="margin-left: 250px;">
            <div class="container">
              <div class="row">
                
                <div class="col-md-12">
                  <h1>View Pending Notice</h1>
                </div>

                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desctiption</th>
                        <th scope="col">Posted By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $query = "SELECT * FROM notice";
                        $get_notice = mysqli_query($connect,$query);
                        $i = '';
                        while( $row = mysqli_fetch_assoc($get_notice) ){
                          $id             = $row['id'];
                          $title          = $row['title'];
                          $description    = $row['description'];
                          $notice_by      = $row['notice_by'];
                          $status         = $row['role'];
                          $i++;

                          if( $status == 1 ){
                      ?>

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $notice_by; ?></td>
                        <td>
                        
                          <?php

                            if( $status == 0 ){
                            ?>

                            <div class="badge badge-success">
                              <p>post</p>
                            </div>
                          
                          <?php  
                            }//end if
                            else if ( $status == 1 ) {
                          ?>
                          <div class="badge badge-primary">
                              <p>pending</p>
                            </div>
                          <?php
                            }//end else
                          ?>
                        
                        </td>
                     
                        <td class="action">

                          <?php

                            if( $status == 0 ){
                            ?>
                          
                          <?php  
                            }//end if
                            else if ( $status == 1) {
                          ?>

                          <ul>
                            <li><a href="pendingnotice.php?do=edit&update=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></li>
                            <li><a href="pendingnotice.php?do=delete&delete=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                          </ul>

                          <?php
                            }//end else
                          ?>
                           
                        </td>

                      </tr>

                      <?php
                          }
                        }//end while loop
                      ?>
                                          
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
        </section>

        <?php
         }
         //manage end

        //edit start
        else if( $do == 'edit' ){
          if( isset($_GET['update']) ){
            $the_id = $_GET['update'];
          }
        ?>

          <section class="addmentor-header-section" style="margin-left: 200px;">
            <div class="container">
              <div class="row">

                <div class="col-md-12">
                  <h1>Update notice</h1>
                </div>

                <div class="col-md-12">

                  <?php 

                  $query = "SELECT * FROM notice WHERE id = '$the_id' ";
                  $update_value = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($update_value) ){
                    $title          = $row['title'];
                    $description    = $row['description'];
                    $status         = $row['role'];
                  ?>

                  <form action="" method="post">
                    
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="update_title" value="<?php echo $title ?>">
                      </div>

                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="update_description"><?php echo $description ?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="update_status" id="exampleRadios1" value="2" <?php if( $status == 0 ){

                          } ?> >
                          <label class="form-check-label" for="exampleRadios1">
                            Approve
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="update_status" id="exampleRadios2" value="1" <?php if( $status == 1 ){ echo "checked"; } ?> >
                          <label class="form-check-label" for="exampleRadios2">
                            Pending
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <input type="submit" class="form-control btn btn-warning" name="updateNotice" value="Update">
                      </div>

                      <?php 

                      if( isset($_POST['updateNotice']) ){
                        $update_title         = $_POST['update_title'];
                        $update_description   = $_POST['update_description'];
                        $update_status        = $_POST['update_status'];

                        $query = "UPDATE notice SET title = '$update_title', description = '$update_description', role = '$update_status' WHERE id = '$the_id' ";
                        $update_notice = mysqli_query($connect,$query);

                        if( !$update_notice ){
                          die("error" . mysqli_error($connect));
                        }
                        else{
                          header("location:pendingnotice.php");
                        }

                      }

                      ?>

                    </form>
                  
                  <?php  
                    }//end while
                  ?>
                 
                </div>

              </div>
            </div>
          </section>

        <?php
        }
        //edit end

        else if( $do = 'update' ) {
          echo "WOW";
        }

        //delete start
        else if( $do == 'delete' ){
          if( isset($_GET['delete']) ){
            $the_delete_id = $_GET['delete'];
            $query = "DELETE FROM notice WHERE id = '$the_delete_id' ";
            $delete_notice = mysqli_query($connect,$query);
            if( !$delete_notice ){
              die("error" . mysqli_error($connect) );
            }
            else{
              header("location:pendingnotice.php");
            }
          }
        }
        //delete end
        



      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>