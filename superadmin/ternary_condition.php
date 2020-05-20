<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section" style="margin-left: 250px;">
    <div class="container">

      <?php

        if( $_SESSION['mentorUserName'] ){ // if-session start

          $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

          if( $do == 'manage' ){ 
            echo "manage";
          }
          
          else if( $do == 'add' ){
            echo "add";            
          }

          else if ($do == 'insert' ){}

          else if( $do == 'edit' ){}

          else if( $do == 'update' ){}

          else if( $do == 'delete' ){}
        
      } // IF - SESSION END

      ?>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>