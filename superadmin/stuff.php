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

        if( $do == 'manage' ){
          
          ?>

          <!-- main content row start -->
          <div class="row">
            <div class="col-md-12">
                <h1>All office stuff list</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SI</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM stuff ";
                  $all_stuff = mysqli_query($connect,$query);
                  $i = 0;

                  while  ( $row = mysqli_fetch_assoc($all_stuff) ){

                    $stuff_id         = $row['stuff_id'];
                    $stuff_username   = $row['username'];
                    $stuff_name       = $row['name'];
                    $stuff_email      = $row['email'];
                    $stuff_phone      = $row['phone'];
                    $stuff_role       = $row['role'];
                    $stuff_image      = $row['image'];
                    $i++;

                  ?>

                  <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <th scope="row"><img src="dist/img/<?php echo $stuff_image; ?>" width='40px'></th>
                    <td><?php echo $stuff_name; ?></td>
                    <td><?php echo $stuff_username; ?></td>
                    <td><?php echo $stuff_email; ?></td>
                    <td><?php echo $stuff_phone; ?></td>
                    <td><?php echo $stuff_role; ?></td>

                    <td class="action">
                      <ul>
                        <li><a href="stuff.php?do=edit&update=<?php echo $stuff_id; ?>"><i class="fas fa-edit"></i></a></li>
                        <li><a href="stuff.php?do=delete&delete=<?php echo $stuff_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                      </ul>
                    </td>

                  </tr>

                  <?php
                  }

                  ?>

                  

                </tbody>
              </table>
            </div>
          </div>
          <!-- main content row end -->



       <?php
        }
        
        else if( $do == 'add' ){
        ?>


        <div class="row">
          <div class="col-md-12"> 
            <h1>Add new stuff</h1>
          </div>
          <div class="col-md-12">
            <!-- form start -->
            <form action="?do=insert" method="post" enctype="multipart/form-data">
              
              <!-- mentor table row start -->
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" >
                  </div>
                  
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  
                  <div class="form-group">
                    <label>Password</label>
                    <input type="Password" class="form-control" name="password" >
                  </div>

                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpass">
                  </div>                
                
                </div>

                <div class="col-md-6">

                  <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" name="email" >
                  </div>
                 
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" >
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <input type="text" class="form-control" name="role" >
                  </div>

                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control-file" name="avater">
                  </div>
                 
                  <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-flat" value="Add Mentor" name="addnetstuff">
                  </div>

                </div>

              </div>
              <!-- mentor table row end -->

            </form>
            <!-- form end -->
          </div>
        </div>


        <?php
        }

        else if ($do == 'insert' ){
          
          if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

            $name           = $_POST['name'];
            $username       = $_POST['username'];
            $password       = $_POST['password'];
            $cpass          = $_POST['cpass'];
            $email          = $_POST['email'];
            $phone          = $_POST['phone'];
            $role           = $_POST['role'];

            $avater             = $_FILES['avater']; //Get the image file
            $avaterName         = $_FILES['avater']['name']; //Get the image name
            $avaterSize         = $_FILES['avater']['size']; //Get the image size
            $avaterTem          = $_FILES['avater']['tmp_name']; //Get the image tmp name
            $avaterType         = $_FILES['avater']['type']; //Get the image file type

            //allowed extension type
            $avaterAllowedExtension  = array("jpg","jpeg","png");

            // get avater extension
            $avaterExtension = strtolower( end( explode('.', $avaterName) ) );

            // validation form of the stuff
            $formErrors = array();

            //username

            if( $password != $cpass ){
              echo '<div class="alert alert-danger">Password  dose not match</div>'; 
            }
            else{

              if( strlen($name) < 4 ){
              $formErrors[]  = '<div class="alert alert-danger">Fullname can not be too short</div>';
            }
            if( strlen($username) < 4 ){
              $formErrors[]  = '<div class="alert alert-danger">Username can not be too short</div>';
            }
            if( empty($avaterName) ){
              $formErrors[]   = 'Please upload stuff image';
            }
            if( !empty($avaterSize) && !in_array($avaterExtension, $avaterAllowedExtension) ){
              $formErrors[]   = 'Please use jpg, jpeg, png image';
            }
            if( !empty($avaterName)  && $avaterSize > 2097152  ){
              $formErrors[]   = 'Please upload image which is less then 2 MB';
            }
            

            foreach ($formErrors as $error) {
              echo '<div class="alert alert-danger">' . $error . '</div>';
            }

            $hassedPass = sha1($password);

            if ( empty($formErrors) ){

              $avater = rand(0,1000) . '_' . $avaterName ;
              
              move_uploaded_file($avaterTem, "dist\img\\" . $avater );

              $query  = "INSERT INTO stuff (username,password,name,email,phone,role,image) VALUES ('$username','$hassedPass','$name','$email','$phone','$role','$avater') ";

              $addStuff = mysqli_query($connect,$query);

              if( !$addStuff ){
                die("ERROR" . mysqli_error($connect));
              }
              else{
                header("location:stuff.php");
              }

            }

            }

            

          }

        }


        else if( $do == 'edit' ){
        if( isset($_GET['update']) ){
          $the_stuff   = $_GET['update'];
          $query = "SELECT * FROM stuff WHERE stuff_id = '$the_stuff' ";
            $update_stuff = mysqli_query($connect,$query);

            while  ( $row = mysqli_fetch_assoc($update_stuff) ){

              $stuff_id         = $row['stuff_id'];
              $stuff_username   = $row['username'];
              $stuff_name       = $row['name'];
              $stuff_email      = $row['email'];
              $stuff_phone      = $row['phone'];
              $stuff_role       = $row['role'];
              $stuff_image      = $row['image'];

          ?>

          <div class="row">
            <div class="col-md-12"> 
              <h1>Update stuff</h1>
            </div>
            <div class="col-md-12">
              <!-- form start -->
              <form action="?do=update" method="post" enctype="multipart/form-data">
                
                <!-- mentor table row start -->
                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $stuff_name; ?>" >
                    </div>
                    
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $stuff_username; ?>">
                    </div>    

                    <div class="form-group">
                      <label>email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $stuff_email; ?>">
                    </div>
                   
                               
                  
                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo $stuff_phone; ?>">
                    </div> 

                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" class="form-control" name="role" value="<?php echo $stuff_role; ?>">
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <br>
                      <?php
                      if( $stuff_image == NULL ){
                      ?>
                      <img src="dist/img/default.png" width="40px">
                      <?php
                      }
                      else{
                      ?>
                      <img src="dist/img/<?php echo $stuff_image; ?>" width="40px">
                      <?php 
                      }
                      ?>
                      <input type="file" class="form-control-file" name="avater">
                    </div>
                   
                    <div class="form-group">
                      <input type="hidden" name="update_stuff_id" value="<?php echo $stuff_id; ?>">

                      <input type="submit" class="btn btn-warning btn-flat" value="Update Stuff" name="updateStuff">
                    </div>

                  </div>

                </div>
                <!-- mentor table row end -->

              </form>
              <!-- form end -->
            </div>
          </div>

          <?php 

          }
        }

        ?>
          

        <?php
        }
        else if( $do == 'update' ){

            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

              $update_stuff_id   =$_POST['update_stuff_id'];
              $name           = $_POST['name'];
              $username       = $_POST['username'];
              $email          = $_POST['email'];
              $phone          = $_POST['phone'];
              $role           = $_POST['role'];

              $avater             = $_FILES['avater']; //Get the image file
              $avaterName         = $_FILES['avater']['name']; //Get the image name
              $avaterSize         = $_FILES['avater']['size']; //Get the image size
              $avaterTem          = $_FILES['avater']['tmp_name']; //Get the image tmp name
              $avaterType         = $_FILES['avater']['type']; //Get the image file type

              //allowed extension type
              $avaterAllowedExtension  = array("jpg","jpeg","png");

              // get avater extension
              $avaterExtension = strtolower( end( explode('.', $avaterName) ) );

              // validation form of the stuff
              $formErrors = array();

              //username


              if( strlen($name) < 4 ){
                $formErrors[]  = '<div class="alert alert-danger">Fullname can not be too short</div>';
              }
              if( strlen($username) < 4 ){
                $formErrors[]  = '<div class="alert alert-danger">Username can not be too short</div>';
              }
              /*if( empty($avaterName) ){
                $formErrors[]   = 'Please upload stuff image';
              }*/
              if( !empty($avaterSize) && !in_array($avaterExtension, $avaterAllowedExtension) ){
                $formErrors[]   = 'Please use jpg, jpeg, png image';
              }
              if( !empty($avaterName)  && $avaterSize > 2097152  ){
                $formErrors[]   = 'Please upload image which is less then 2 MB';
              }
              

              foreach ($formErrors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
              }

              if( empty($formErrors) ){

                if( $avaterName != "" ){
                  $avater = rand(0,1000) . '_' . $avaterName ;
                
                  move_uploaded_file($avaterTem, "dist\img\\" . $avater );

                  $query  = "UPDATE stuff SET username = '$username', name = '$name', email = '$email', phone = '$phone' , role = '$role', image = '$avater' WHERE stuff_id = '$update_stuff_id' ";

                  $updateStuff = mysqli_query($connect,$query);

                  if( !$updateStuff ){
                    die("ERROR" . mysqli_error($connect) );
                  }
                  else{
                    header("location:stuff.php");
                  }
                }//if not black

                else{
                  $query  = "UPDATE stuff SET username = '$username', name = '$name', email = '$email', phone = '$phone' , role = '$role' WHERE stuff_id = '$update_stuff_id' ";

                    $updateStuff = mysqli_query($connect,$query);

                    if( !$updateStuff ){
                      die("ERROR" . mysqli_error($connect) );
                    }
                    else{
                      header("location:stuff.php");
                    } 
                }

              }//if -form error end
              

            }//server request end


        }// else if update end
        else if( $do == 'delete' ){
          if( isset($_GET['delete']) ){
            $delete_stuff_id = $_GET['delete'];

            $query = "SELECT * FROM stuff WHERE stuff_id = '$delete_stuff_id' ";
            $deaf_stuff = mysqli_query($connect,$query);
            while  ( $row = mysqli_fetch_array($deaf_stuff) ){

              $stuff_id         = $row['stuff_id'];
              $stuff_username   = $row['username'];
              $stuff_name       = $row['name'];
              $stuff_email      = $row['email'];
              $stuff_phone      = $row['phone'];
              $stuff_role       = $row['role'];
              $stuff_image      = $row['image'];

            }

            unlink("dist/img/" . $stuff_image);

            $query = "DELETE FROM stuff where stuff_id = '$delete_stuff_id' ";

            $delete_stuff = mysqli_query($connect,$query);

            if( !$delete_stuff ){
              die("ERROR" . mysqli_error($connect) );
            }
            else{
              header("location:stuff.php");
            }
            
          }
        }
        




      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>