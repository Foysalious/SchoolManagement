<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section" style="margin-left: 250px;">
    <div class="container">

      <?php



        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

        //manage start
        if( $do == 'manage' ){
        ?>  

        <section class="addmentor-header-section">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <h1>Manage my notice</h1>
              </div>

              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Si</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
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
                        $id         = $row['id'];
                        $title          = $row['title'];
                        $description    = $row['description'];
                        $status         = $row['role'];
                        $i++;

                        if( $status == 0 ){
                    ?>
                    
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $title; ?></td>
                      <td><?php echo $description ?></td>
                      
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
                        <ul>
                            <li><a href="managenotice.php?do=update&update=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></li>
                            <li><a href="managenotice.php?do=delete&delete=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                          </ul>
                      </td>
                   
                    </tr>

                    <?php
                        }
                      }//end while
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
        
        //add start
        else if( $do == 'add' ){
        ?>

        <section class="addmentor-header-section">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <h1>Add notice</h1>
              </div>

              <div class="col-md-12">
                <form action="?do=insert" method="post">
                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                      <option value="0">Super Admin</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" class="form-control btn btn-warning" name="addNotice" value="Add">
                  </div>

                </form>
              </div>

            </div>
          </div>
        </section>

        <?php
          }
          //add end

         //insert start
        else if ($do == 'insert' ){ 
          if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $title                  = $_POST['title'];
            $description            = $_POST['description'];
            $role                   = $_POST['role'];
            $the_login_mentor_id    = $_SESSION['mentorId'];

            //add mentor name query start
            $query = "SELECT * FROM addmentor WHERE mentorId = '$the_login_mentor_id' ";
            $get_mentor_name = mysqli_query($connect,$query);
            while( $row = mysqli_fetch_assoc($get_mentor_name) ){
              $mentor_name = $row['mentorFullname'];
            }
            //add mentor name query end

            $query = "INSERT INTO notice(notice_by,title,description,publish_date,role) VALUES ('$mentor_name','$title','$description',now(),'$role') ";
            $addNotice = mysqli_query($connect,$query);

            if( !$addNotice ){
              die("error" . mysqli_error($connect));
            }
            else{
              header("location:managenotice.php");
            }

          }
        }
        //insert end

        //edit start
        else if( $do == 'update' ){ 

          if( isset($_GET['update']) ){
            $the_up_id = $_GET['update'];

            $query = "SELECT * FROM notice WHERE id = '$the_up_id' ";
            $get_update_value = mysqli_query($connect,$query);

            while( $row = mysqli_fetch_assoc($get_update_value) ){
              $update_title = $row['title'];
              $update_desc  = $row['description'];
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
                      <input type="text" class="form-control" name="update_title" value="<?php echo $update_title; ?>">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="update_description"><?php echo $update_desc; ?></textarea>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="form-control btn btn-warning" name="updateNotice" value="Update">
                    </div>

                  </form>
                </div>

              </div>
            </div>
          </section>

        <?php

            //update value start
            if( isset($_POST['updateNotice']) ){
              $updated_title        = $_POST['update_title'];
              $updated_description  = $_POST['update_description'];

              $query = "UPDATE notice SET title = '$updated_title', description = '$updated_description' WHERE id = '$the_up_id' ";
              $update_notice = mysqli_query($connect,$query);

              if( !$update_notice ){
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:managenotice.php");
              }
            }
            //update value end

          }// while end

        }//if end

        }
        //edit end

        //delete start
        else if( $do == 'delete' ){
          if (isset($_GET['delete'])){
            $the_del_id = $_GET['delete'];

              $query = "DELETE FROM notice WHERE id = '$the_del_id' ";
              $del_notice = mysqli_query($connect,$query);
              if( !$del_notice ) {
                die("error" . mysqli_error($connect));
              }
              else{
                header("location:managenotice.php");
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