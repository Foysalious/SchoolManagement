<?php
  include"includes/header.php";
  include"includes/navbar.php";
  include"includes/sidebar.php";
?>



  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="pendingnotice.php?do=manage">Pending notice</a></span>
                <span class="info-box-number">
                  <?php
                  $query = "SELECT * FROM notice WHERE role = '1' ";
                  $pending = mysqli_query($connect,$query);
                  $i = 0;

                  while( $row = mysqli_fetch_assoc($pending) ){
                    $i++;
                  }
                  echo $i;

                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          </div>
          </div>
        </section>
  <!-- /.control-sidebar -->

  <?php
  include"includes/footer.php";
  ?>
