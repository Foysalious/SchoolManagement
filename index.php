
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 70%;
    margin: auto;
  }
  body{
    background:#a7ffff;
    margin:0;
    padding:0;
  }
  </style>
</head>
<body>
<div style="margin-top:50px;"></div>
<div class="container">

  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="AiubPermanentCampus_6.jpg" alt="1stpic" width="960" height="540">
      </div>

      <div class="item">
        <img src="AiubPermanentCampus_7.jpg" alt="2ndpic" width="220" height="147">
      </div>

      <div class="item">
        <img src="AiubPermanentCampus_37.jpg" alt="Flower" width="221" height="228">
      </div>

      <div class="item">
        <img src="AiubPermanentCampus_39.jpg" alt="3rdpic" width="259" height="194">
      </div>

      <div class="item">
        <img src="https://www.aiub.edu/Files/Uploads/International-Local-Accredited.jpg" alt="3rdpic" width="259" height="194">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div style="margin-top:50px;"></div>

<div style="margin-left:500px;">

<a class="btn btn-primary btn-lg mb-2" href="superadmin/index.php" role="button" target="_blank">Click to Login as a <b>Super Admin</b></a>
<br>
<div style="margin-top:10px; "></div>
<a class="btn btn-primary btn-lg mt-2" href="mentor/index.php" role="button" target="_blank"> Click toLogin as a <b>Mentor</b></a>
</div>
</div>


<script>
$(document).ready(function(){
  // Activate Carousel
  $("#myCarousel").carousel({interval: 5000});

  // Enable Carousel Indicators
  $(".item1").click(function(){
    $("#myCarousel").carousel(0);
  });
  $(".item2").click(function(){
    $("#myCarousel").carousel(1);
  });
  $(".item3").click(function(){
    $("#myCarousel").carousel(2);
  });
  $(".item4").click(function(){
    $("#myCarousel").carousel(3);
  });

  // Enable Carousel Controls
  $(".left").click(function(){
    $("#myCarousel").carousel("prev");
  });
  $(".right").click(function(){
    $("#myCarousel").carousel("next");
  });
});
</script>

</body>
</html>
