<?php
session_start();
include('dbcon.php');
?>
<!doctype html>
<html lang="en">

<head>

  <!-- fb & Whatsapp -->

  <!-- Site Name, Title, and Description to be displayed -->
  <meta property="og:site_name" content="Doubt Clearance Cell:RD Technicals">
  <meta property="og:title" content="Doubt Clearance Cell:RD Technicals">
  <meta property="og:description" content="Clear your doubt with Doubt Clearance Cell: RD Technicals">

  <!-- Image to display -->
  <!-- Replace   «example.com/image01.jpg» with your own -->
  <meta property="og:image" content="http://doubt-avi.herkouapp.com/data/glyphy.png">

  <!-- No need to change anything here -->
  <meta property="og:type" content="website" />
  <meta property="og:image:type" content="image/jpeg">

  <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
  <meta property="og:image:width" content="300">
  <meta property="og:image:height" content="300">

  <!-- Website to visit when clicked in fb or WhatsApp-->
  <meta property="og:url" content="http://doubt-avi.herokuapp.com">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="Clear your doubt with Doubt Clearance Cell: RD Technicals"> -->



  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116679066-3"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">
  <script src="js/lightbox.js"></script>

  <title>Doubt Clearance Cell:RD Technicals</title>
  <link rel="icon" href="data/glyphy.png" sizes="16x16" type="image/png">
</head>

<body>
  <!--<div class="jumbotron p-3" style="margin-bottom: 0px">
    <h1 class="text-fluid">GIET Gunupur</h1>
  </div>-->

  <div class="jumbotron p-0 m-0 bg-white">
    <a href="#"><img class="img-fluid" src="data/logo_black.png" width="335px" height="75px"></a>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top pt-0 pb-0 m-0">
    <span class="navbar-text">
      <h5 class="pl-5 pt-1">Doubt Clearance Cell</h5>
    </span>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#cid">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse p-0" id="cid">
      <div class="col-lg-2"></div>
      <div>
        <ul class="nav navbar-nav">
          <?php
          if (!isset($_SESSION['uid'])) {
            ?>
            <div class="col-md-1"></div>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="signup.php" class="nav-link">Signup</a>
            </li>
          <?php
          } else {
            $qry = "select name from user where hash='" . $_SESSION['uid'] . "';";
            $res = mysqli_query($conn, $qry);
            $data = mysqli_fetch_assoc($res);
            ?>
            <li>
              <span class="navbar-text text-dark">Hii,<?php echo "   " . $data['name']; ?></span>&nbsp;&nbsp;&nbsp;
            </li>
            <li class="nav-item">
              <a href="view_profile.php?id=<?php echo $_SESSION['uid']; ?>" class="nav-link">My Profile</a>
            </li>
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="ask_q.php" class="nav-link">Ask Question</a>
            </li>
            <li class="nav-item">
              <a href="tally.php" class="nav-link">XP Tally</a>
            </li>
          <?php
          }
          ?>


          <li class="nav-item">
            <a href="about_us.php" class="nav-link">About Us</a>
          </li>
          <?php
          if (isset($_SESSION['uid'])) {
            ?>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
  </nav>