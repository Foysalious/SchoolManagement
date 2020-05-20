<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section content-wrapper" style="margin-left: 250px;">
    <div class="content">
    <div class="container-fluid card card-primary card-outline">

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
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM stuff";
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
        
        




      ?>

    </div>
  </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>