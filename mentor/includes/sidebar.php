
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
          <a href="mentorprofile.php" class="d-block"> <?php echo  $_SESSION['mentorFullname']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <!-- all user role start -->
          <li class="nav-header">All User role</li>
          <!-- mentor start -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                All User
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/viewmentor.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- mentor end -->

          <!-- student start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Student
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/viewstudent.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View All student</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/addstudent.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New Student</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- student end -->


          <!-- office stuff start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                office stuff
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/stuff.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View office stuff</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- office stuff end -->

          <!-- all notice board start start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Notice
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/pendingnotice.php?do=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View pending notice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/pendingnotice.php?do=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Notice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/notice.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Notice Board</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- all notice board start end -->

          <!--- all user role end -->





          <li class="nav-header">education demartment</li>
          <!-- mentor start -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                all course
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/manageallcourse.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage all course</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- mentor end -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                all grade
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/manageallgrade.php?grade=manage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>manage all grade</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../../schoolmanagement/mentor/manageallgrade.php?grade=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add grade</p>
                </a>
              </li>
            
            </ul>
          </li>
          <!-- mentor end -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>