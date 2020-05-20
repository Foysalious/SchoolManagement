<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section">
    <div class="container">


        <section class="addmentor-header-section" style="margin-left: 250px;">
            <div class="container">
              <div class="row">
                
                <div class="col-md-12">
                  <h1>Notice Board</h1>
                </div>

                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desctiption</th>
                        <th scope="col">Posted By</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $query = "SELECT * FROM notice";
                        $get_notice = mysqli_query($connect,$query);
                        $i = '';
                        while( $row = mysqli_fetch_assoc($get_notice) ){
                          $notice_id        = $row['id'];
                          $title        = $row['title'];
                          $description  = $row['description'];
                          $status       = $row['role'];
                          $notice_by      = $row['notice_by'];
                          $i++;
                          if( $status == 0 ){

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
                              <p>Super Admin</p>
                            </div>
                          
                          <?php  
                            }//end if
                            else if ( $status == 2 ) {
                          ?>
                          <div class="badge badge-primary">
                              <p>Mentor</p>
                            </div>
                          <?php
                            }//end else
                          ?>
                        
                        </td>

                        <td class="action">
                          <ul>
                            <li><a href="notice.php?update=<?php echo $notice_id; ?>"><i class="fas fa-edit"></i></a></li>
                            <li><a href="notice.php?delete=<?php echo $notice_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                          </ul>
                        </td>

                      </tr>

                      <?php
                          }
                          else if( $status == 2 ){
                      ?>
                        
                        <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $notice_by; ?></td>
                        <td>
                        
                          <?php
                             if ( $status == 2 ) {
                          ?>
                          <div class="badge badge-primary">
                              <p>Mentor</p>
                            </div>
                          <?php
                            }//end else
                          ?>
                        
                        </td>

                        <td class="action">
                          <ul>
                            <li><a href="notice.php?update=<?php echo $notice_id; ?>"><i class="fas fa-edit"></i></a></li>
                            <li><a href="notice.php?delete=<?php echo $notice_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                          </ul>
                        </td>

                      </tr>

                      <?php

                          }
                        }//end while loop
                      ?>
                                          
                    </tbody>
                  </table>
                </div>

                <!--  update notice code start -->
                <?php

                if( isset($_GET['update']) ){
                  $the_update_id = $_GET['update'];

                  $query = " SELECT * FROM notice WHERE id = '$the_update_id' ";
                  $update_query = mysqli_query($connect,$query);
                  while( $row = mysqli_fetch_assoc($update_query) ){
                      $title        = $row['title'];
                      $description  = $row['description'];
                ?>

                <section class="addmentor-header-section">
                  <div class="container">
                    <div class="row">

                      <div class="col-md-12">
                        <h1>Update notice</h1>
                      </div>

                      <div class="col-md-12">
                        <form action="" method="post">
                          
                          <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" >
                          </div>

                          <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" > <?php echo $description; ?> </textarea>
                          </div>

                          <div class="form-group">
                            <input type="submit" class="form-control btn btn-warning" name="updatenotice" value="Update">
                          </div>

                        </form>
                      </div>

                    </div>
                  </div>
                </section>

                <?php

                    //update value start
                    if( isset($_POST['updatenotice']) ){
                      $updated_title        = $_POST['title'];
                      $updated_description  = $_POST['description'];

                      $query = "UPDATE notice SET title = '$updated_title', description = '$updated_description' WHERE id = '$the_update_id' ";
                      $update_notice = mysqli_query($connect,$query);

                      if( !$update_notice ){
                        die("error" . mysqli_error($connect));
                      }
                      else{
                        header("location:notice.php");
                      }
                    }
                    //update value end

                  }// end - while
                }//end - if
                ?>
                <!--  update notice code end -->

                <!--  delete notice code start -->
                <?php

                  if( isset($_GET['delete']) ) {

                    $the_del_id = $_GET['delete'];

                    $query = "DELETE FROM notice WHERE id = '$the_del_id' ";
                    $dlete_notice =mysqli_query($connect,$query);

                    if( !$dlete_notice ) {
                      die("error" . mysqli_error($connect));
                    }
                    else{
                      header("location:notice.php");
                    }

                  }

                ?>
                <!--  delete notice code end -->

              </div>
            </div>
        </section>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>