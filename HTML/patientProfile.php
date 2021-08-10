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
  <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="patientHome.php">
                    <img src="../Assets/Images/doctor.svg" alt="" width="40" height="40" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="patientHome.php">Home</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="searchDoctor.php">Search Doctor</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="patientAppointment.php">Appointment</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink current-page" aria-current="page" href="#">Profile</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="logout.php">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
</body>
</html>