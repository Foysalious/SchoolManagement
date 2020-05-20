<?php
 include"includes/db.php";

 ob_start();
 session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="dashboard.php"><b>Super Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
       
       <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        
        
          <!-- /.col -->
            <div class="col-4">
              <input type="submit" class="btn btn-primary btn-block" value="Login" name="login_s">
            </div>
          <!-- /.col -->
        </div>
      </form>


      <?php

      if( isset($_POST['login_s']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hassedPass = sha1($password);

        $query = "SELECT * FROM addmentor WHERE mentorUserName = '$username'";

        $login_mentor_info = mysqli_query($connect,$query);

        if( !$login_mentor_info ){
          die("ERROR" . mysqli_error($connect) );
        }
        else{

          while( $row = mysqli_fetch_array($login_mentor_info) ){
            $get_mentor_id  = $row['mentorId'];
            $get_username   = $row['mentorUserName'];
            $get_password   = $row['password'];
            $get_image      = $row['image'];
            $get_fullname   = $row['mentorFullname'];
            $get_user_role  = $row['user_role'];
          }
        }

        if( $get_username!=$username && $get_password!=$hassedPass ){
          header("location:index.php");
        }
        if( $get_username==$username && $get_password==$hassedPass && $get_user_role == '0' ){
          header("location:dashboard.php");

          $_SESSION['mentorId']         = $get_mentor_id;
          $_SESSION['mentorUserName']   = $get_username;
          $_SESSION['password']         = $get_password;
          $_SESSION['image']            = $get_image;
          $_SESSION['mentorFullname']   = $get_fullname;


        }
        else{
          header("location:index.php");
        }

      }

      ?>


     
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>

<?php
ob_end_flush();
?>