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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="patientHome.php">
  <img src="../Assets/Images/doctor.png" alt="" width="55" height="55" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
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
            <a class="nav-link active navbar-shortcutlink " aria-current="page" href="patientAppointment.php">Appointment</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink current-page" aria-current="page" href="#">Prescription</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="patientProfile.php">Profile</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="logout.php">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>

<section class="container py-4 table-responsive">

<table class="table table-striped text-center" id="myTable">
  <thead class="table-dark">
      <tr>
        <th scope="col">Prescription Id</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Date</th>
        <th class="hide-prescription-col d-none" scope="col">text</th>
        <th scope="col"> </th>
      </tr>
  </thead>
  <tbody>
    <?php
     $i=0;
        $session_id = $_SESSION['id'];
        $sql = "Select 	id , doctor_name, date, text from prescription where patient_id = '$session_id' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr id='{$i}'> <td> {$row["id"]} </td> <td> {$row["doctor_name"]} </td> <td> {$row["date"]} </td><td class='row-data d-none'> {$row["text"]} </td> <td><button type='button' class='btn btn-success rounded-1 cancel-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='showPrescription()' ><i class='far fa-eye '></i> View</button>  </td> </tr>";
              $i++;
            }
        }
    
    ?>
  </tbody>
</table> 


<!-- ---------------------------- Modal ------------------------------- -->
<div class="modal fade text-secondary" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content custom-form-background">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Prescription</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body container mb-3">
            <textarea id="prescription" readonly="readonly" class="form-control" aria-label="With textarea" rows="10" value=""></textarea>
            </div>
          </div>
        </div>
 </div>





</section>
<!-- -----------------------------JS Bundle CDN--------------------------- -->
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous">
  </script>

<script>
function showPrescription(){


  var rowId =event.target.parentNode.parentNode.id;
              
  var data = document.getElementById(rowId).querySelectorAll(".row-data"); 
  var prescription = data[0].innerHTML;

  var modal = document.getElementById("prescription").value = prescription;
}

</script>  


</body>
</html>