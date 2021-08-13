<?php  
session_start();
include "doctorDatabase.php";
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
                    <img src="../Assets/Images/doctor.svg" alt="" width="40" height="40" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="doctorHome.php">Home</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink current-page" aria-current="page" href="#">Appointment</a>
          </li>
          <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="doctorProfile.php">Profile</a>
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
        <th scope="col">Appointment Id</th>
        <th scope="col">Patient Id</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Date</th>
        <th scope="col"> </th>
        <!-- <th scope="col"> </th> -->
      </tr>
  </thead>
  <tbody>
    <?php
     $i=0;
        $session_id = $_SESSION['id'];
        $sql = "Select 	appointment_id , patient_name, patient_id, date from appointment where doctor_id = '$session_id' ORDER BY date";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr id='{$i}'> <td class='row-data'> {$row["appointment_id"]} </td> <td class='row-data'> {$row["patient_id"]} </td><td class='row-data'> {$row["patient_name"]} </td> <td> {$row["date"]} </td>  </td> <td><button type='button' class='btn btn-success rounded-1 view-btn ' data-bs-toggle='modal' data-bs-target='#exampleModal2' onclick='viewPatientDetails()'> <i class='fas fa-address-card me-1'></i>View</button>  <button type='button' class='btn btn-danger rounded-1 cancel-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='cancleAppointment()' ><i class='far fa-times-circle me-1'></i>Cancel</button>  </td>  </tr>";  
                $i++;
            }
        }
    
    ?>
  </tbody>
</table>

<!-- ------------------------- modal cancle------------------------------------ -->
<form method="POST" action="doctorAppointmentCancle.php" class="text-light">
    <div class="modal fade text-secondary" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content custom-form-background">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Are you sure you want to cancel this appointment?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="model-body container mb-3">
                  <label for="disabledTextInput" class="form-label">Appointment Id</label>
                  <input type="text" name="doctorAppointmentId"  readonly="readonly" id="appointmentId" class="form-control" value="001">
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-light me-3 btn-close-style" data-bs-dismiss="modal"><i class="far fa-times-circle me-1"></i>Close</button>
                    <button  type="submit" class="btn btn-submit-style text-light"><i class="far fa-check-circle me-1"></i>confirm</button>
                  </div>
              </div>
          </div>
    </div>
</form>

<!-- ----------------------- modal patient view ------------------------------ -->
<form method="POST" action="doctorPrescriptionSave.php" class="text-light">
    <div class="modal fade text-secondary" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content custom-form-background">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel" >Patient Profile</h5>
                    
                  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="model-body container mb-3">
                    <label for="disabledTextInput" class="form-label">Patient Id</label>
                    <input type="text" name="doctorAppointmentId"  readonly="readonly" id="doctorAppointmentId" class="form-control" value="" hidden>
                     <input type="text" name="doctorAppointmentViewPatientId"  readonly="readonly" id="doctorAppointmentViewPatientId" class="form-control" value="">
                     <label for="disabledTextInput" class="form-label">Patient Name</label>
                     <input type="text" name="doctorAppointmentViewPatientName"  readonly="readonly" id="doctorAppointmentViewPatientName" class="form-control" value="">
            
                  </div>
                  <div class="model-body container mb3">
     
                  <label for="TextInput" class="form-label">Patient Piscription</label>
                   <textarea name="prescription" class="form-control" aria-label="With textarea" rows="10" value="">Rx,</textarea>
                  </div>

                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-light me-3 btn-close-style" data-bs-dismiss="modal"><i class="far fa-times-circle me-1"></i>Close</button>
                    <button  type="submit" class="btn btn-submit-style text-light"><i class="far fa-check-circle me-1"></i>confirm</button>
                  </div>
              </div>
          </div>
    </div>
</form>


</section>
<!-- -----------------------------JS Bundle CDN--------------------------- -->
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous">
</script>

<script>
  function viewPatientDetails(){

  var rowId =event.target.parentNode.parentNode.id;
  console.log("here");
              
  var data = document.getElementById(rowId).querySelectorAll(".row-data"); 
  var appointment_id = data[0].innerHTML;
  var patientId = data[1].innerHTML;
  var patientName = data[2].innerHTML;
  console.log(appointment_id);
  document.getElementById("doctorAppointmentId").value = appointment_id;
  document.getElementById("doctorAppointmentViewPatientName").value = patientName;
   document.getElementById("doctorAppointmentViewPatientId").value = patientId;
}

</script>

</body>
</html>
