<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>

  <!-- main body content start -->
  <section class="addmentor-header-section">
    <div class="container">


        <section class="addmentor-header-section" style="margin-left: 250px;">
            <div class="container">
              <div class="row">
                
                <div class="col-md-12">
                  <h1>Notice Board</h1>
                </div>

                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desctiption</th>
                        <th scope="col">By</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $query = "SELECT * FROM notice";
                        $get_notice = mysqli_query($connect,$query);
                        $i = '';
                        while( $row = mysqli_fetch_assoc($get_notice) ){
                          $title        = $row['title'];
                          $description  = $row['description'];
                          $status       = $row['role'];
                          $i++;
                          if( $status == 0 ){

                      ?>

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td>
                        
                          <?php

                            if( $status == 0 ){
                            ?>

                            <div class="badge badge-success">
                              <p>Super Admin</p>
                            </div>
                          
                          <?php  
                            }//end if
                            else if ( $status == 1 ) {
                          ?>
                          <div class="badge badge-primary">
                              <p>Mentor</p>
                            </div>
                          <?php
                            }//end else
                          ?>
                        
                        </td>

                      </tr>

                      <?php
                          }
                        }//end while loop
                      ?>
                                          
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
        </section>

    </div>
  </section>
  <!-- main body content end -->

<?php
  include"includes/footer.php";
?>