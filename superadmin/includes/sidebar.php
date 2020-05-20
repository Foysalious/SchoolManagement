
<?php
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">School Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php

          if(  $_SESSION['image'] == NULL ){
          ?>
          <img src="dist/img/default.png" style='width: 50px;'>

          <?php
          }
          else{
            ?>
            <img src='../superadmin/dist/img/<?php echo $_SESSION['image']; ?>' style='width: 50px;'>

            <?php
          }

          ?>
              
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo  $_SESSION['mentorFullname']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <!-- all user role start -->
          <li class="nav-header">All User role</li>
          <!-- superadmin start -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                User
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/viewmentor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View All User</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/addnewmentor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- superadmin end -->

          <!-- student start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Student
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/viewstudent.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View All student</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/addstudent.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New Student</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- student end -->


          <!-- office stuff start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                office stuff
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/stuff.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View office stuff</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/stuff.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New stuff</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/SearchStuff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Office Staff</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- office stuff end -->

          

          <!--- all user role end -->





          <li class="nav-header">education demartment</li>
          <!-- superadmin start -->

          <!-- Notice start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Notice
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/managenotice.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage My Notice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/pendingnotice.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Pending Notice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/managenotice.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Notice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/notice.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Notice Board</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- Notice end -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                all course
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/manageallcourse.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage all course</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- superadmin end -->

          <!-- grade start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                all grade
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/manageallgrade.php?grade=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage all grade</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/manageallgrade.php?grade=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add grade</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- grade end -->


          <!-- batch start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                all batch
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/batch.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage all batch</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/batch.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add new batch</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- batch end -->

          <!-- class schedule start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                class schedule
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/schedule.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage class schedule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/schedule.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add class schedule</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- class schedule end -->


          <!-- transport management system start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Transport Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/transport.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage Transport Schedule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/transport.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New Transport</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/superadmin/transport.php?do=studentList" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Student list</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- transport management system end -->








          <!-- superadmin end -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>