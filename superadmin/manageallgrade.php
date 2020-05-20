<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section" style="margin-left: 250px;">
    <div class="container">

      <?php

      if( $_SESSION['mentorUserName'] ){

        $grade = isset( $_GET['grade'] ) ? $_GET['grade'] : 'manage';

        if( $grade == 'manage' ){
        ?>

        <div class="row">
        <div class="col-md-12">
          <h1>Manage All Grade</h1>
        </div>
      </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Grade</th>
              <th scope="col">Lower Point</th>
              <th scope="col">Upper Point</th>
              <td scope="col">Action</td>
            </tr>
          </thead>
          <tbody>

            <?php
            $query = "SELECT * FROM grade";
            $get_all_grade = mysqli_query($connect,$query);
            $i = 0;

            while( $row = mysqli_fetch_assoc($get_all_grade) ){
              $grade_id = $row['grade_id'];
              $grade_name = $row['grade_name'];
              $lower_value = $row['lower_value'];
              $upper_value = $row['upper_value'];
              $i++;
            ?>

             <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $grade_name;  ?></td>
              <td><?php echo $lower_value;  ?></td>
              <td><?php echo $upper_value;  ?></td>
              <td class="action">
                  <ul>
                    <li><a href="manageallgrade.php?grade=edit&update=<?php echo $grade_id; ?>"><i class="fas fa-edit"></i></a></li>
                    <li><a href="manageallgrade.php?grade=delete&delete=<?php echo $grade_id; ?>"><i class="fas fa-trash-alt"></i></a></li>
                  </ul>
                </td>
            </tr>
            
            <?php
            }

            ?>

           
          </tbody>
        </table>

       <?php
        }
        else if( $grade == 'add' ){

          ?>

          <div class="row">
            <div class="col-md-12">
              <h1>Add Grade</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">

                <div class="form-group">
                  <label>Grade Name</label>
                  <input type="text" class="form-control" name="name" required="required">
                </div>

                <div class="form-group">
                  <label>Grade Lower Value</label>
                  <input type="text" class="form-control" name="lowerValue" required="required">
                </div>

                <div class="form-group">
                  <label>Grade Upper Value</label>
                  <input type="text" class="form-control" name="upperValue" required="required">
                </div>

                <div class="form-group">
                  <input type="submit" class="form-control btn btn-warning btn-flat" name="addGrade">
                </div>

                <?php

                if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
                  $name = $_POST['name'];
                  $lowerValue = $_POST['lowerValue'];
                  $upperValue = $_POST['upperValue'];

                  $query = "INSERT INTO grade(grade_name,lower_value,upper_value) VALUES ('$name','$lowerValue','$upperValue') ";

                  $addgrade = mysqli_query($connect,$query);

                  if( !$addgrade ){
                    die("ERROR" . mysqli_error($connect) );
                  }
                  else{
                    header("location:manageallgrade.php");
                  }

                }


                ?>

              </form>
            </div>
          </div>

          <?php


        }
        else if( $grade == 'edit' ){

          if( isset($_GET['update']) ){
            $the_grade_id =  $_GET['update'];

            $query = "SELECT * FROM grade WHERE grade_id = '$the_grade_id' ";
            $update_grade = mysqli_query($connect,$query);

            while( $row = mysqli_fetch_assoc($update_grade) ){
              $grade_id = $row['grade_id'];
              $grade_name = $row['grade_name'];
              $lower_value = $row['lower_value'];
              $upper_value = $row['upper_value'];
            }
            ?>
            <div class="row">
            <div class="col-md-12">
              <form action="?grade=update" method="post">

                <div class="form-group">
                  <label>Grade Name</label>
                  <input type="text" class="form-control" name="update_name" required="required" value="<?php echo $grade_name; ?>">
                </div>

                <div class="form-group">
                  <label>Grade Lower Value</label>
                  <input type="text" class="form-control" name="update_lowerValue" required="required" value="<?php echo $lower_value; ?>">
                </div>

                <div class="form-group">
                  <label>Grade Upper Value</label>
                  <input type="text" class="form-control" name="update_upperValue" required="required" value="<?php echo $upper_value; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control btn btn-warning btn-flat" value="<?php echo $grade_id; ?>" name="update_grade_id">
                  <input type="submit" class="form-control btn btn-warning btn-flat" value="update grade" name="updategrade">
                </div>

              </form>
            </div>
          </div>


          <?php
        }
          
        }
        else if( $grade == 'update' ){

          if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $update_grade_id = $_POST['update_grade_id'];
            $update_lowerValue = $_POST['update_lowerValue'];
            $update_upperValue = $_POST['update_upperValue'];
            $update_name = $_POST['update_name'];

            $query = "UPDATE grade SET grade_name = '$update_name', lower_value = '$update_lowerValue' ,  upper_value = '$update_upperValue' WHERE grade_id = '$update_grade_id' ";
            $update_grade = mysqli_query($connect,$query);

            if(!$update_grade){
              die("ERROR" . mysqli_error($connect) );
            }
            else{
              header("location:manageallgrade.php");
            }
          }
          
        }
        else if( $grade == 'delete' ){

         if( isset($_GET['delete']) ){
          $delete_grade_id =  $_GET['delete'];

          $query = "DELETE FROM grade WHERE grade_id = '$delete_grade_id' ";
          $delete_grade = mysqli_query($connect,$query);
          if(!$delete_grade){
            die("ERROR" . mysqli_error($connect) );
          }
          else{
            header("location:manageallgrade.php");
          }
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