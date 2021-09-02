<?php  
session_start();
include "doctorDatabase.php";
if(!isset($_SESSION['id'])){
  header("location:index.php?warning=login first");
  session_unset();
  session_destroy();  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCloud</title>
    <!-- -----------------------Favicon adding----------------- -->
    <link rel="shortcut icon" href="../Assets/Icons/favicon.png" type="image/x-icon" />
    <!-- -----------------------Bootstrap CSS style adding----------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <!-- -----------------------------------------------Font Awesome kit-------------------------- -->
    <script src="https://kit.fontawesome.com/04ecdf395d.js" crossorigin="anonymous"></script>
<!-- -----------------------------------------------Animate css-------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- ------------------------------CSS link up ------------------------ -->
    <link rel="stylesheet" href="../CSS/style.css" />
</head>
<body>
<header>
      <!-- nav-bar add. -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="doctorHome.php">
                    <img src="../Assets/Images/doctor.png" alt="" width="55" height="55" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
                </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink current-page"
                  aria-current="page"
                  href="#"
                  >Home</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="doctorAppointment.php"
                  >Appointment</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="doctorProfile.php"
                  >Profile</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="logout.php"
                  >Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<section class="container pt-3">
  <?php
    echo "<h1 class='text-center welcome-msg'> <span style='color:#555657'>Welcome</span> {$_SESSION['name']} </h1>" ;
    echo '<br>';
  ?>
</section>

<section class="container mt-5">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../Assets/Images/Doctor Ui/doctor-1.jpg" class="d-block img-fluid mx-auto rounded-3" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="../Assets/Images/Doctor Ui/doctor-2.jpg" class="d-block img-fluid mx-auto rounded-3" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../Assets/Images/Doctor Ui/doctor-3.jpg" class="d-block img-fluid mx-auto rounded-3" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../Assets/Images/Doctor Ui/doctor-4.jpg" class="d-block img-fluid mx-auto rounded-3" alt="...">
    </div> 
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>


    

     <!-- -------------------------------------JS bundle adding-------------------------------------------  -->
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous">
    </script>
</body>
</html>