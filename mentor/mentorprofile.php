<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          

          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">My Profile</h5>
              </div>
              
              <!-- all item here -->
              <div class="card-body">

                <div class="profile-box">
                  <div class="profile-image">
                    <img src="../mentor/dist/img/<?php echo $_SESSION['image']; ?>" class="img-fluid">
                  </div>
                </div>

              </div>
              <!-- all item here -->

            </div>
          </div>
          <!-- /.col-md-12 -->

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


<?php
  include"includes/footer.php";
?>