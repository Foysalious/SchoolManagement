<?php
    include"includes/header.php";
    include"includes/navbar.php";
    include"includes/sidebar.php";
?>


  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <section class="addmentor-header-section" style="margin-left: 270px;">
    <div class="container" style="margin: 0;">
      
      
    
      <br />
      <br />
      <br />
      <h2 align="center">Search For Office Stuff</h2><br />
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">Search</span>
          <input type="text" name="search_text" id="search_text" placeholder="Search by User Details" class="form-control" />
        </div>
      </div>
      <br />
      <div id="result"></div>
    </div>
    <div style="clear:both"></div>
    <br />
    
    <br />
    <br />
    <br />
    <div align="center">
    <a href="Dashboard.php" class="btn btn-primary"> Go Back </a>
    </div>
  </body>
</html>
</section>


<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});
</script>


<?php
  include"includes/footer.php";
?>
