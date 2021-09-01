<?php 
session_start();
include "doctorDatabase.php";
$searchValue="all";
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
          <a class="nav-link active navbar-shortcutlink current-page" aria-current="page" href="#">Search Doctor</a>
        </li>
        <li class="nav-item mx-2 fs-5">
          <a class="nav-link active navbar-shortcutlink" aria-current="page" href="patientAppointment.php">Appointment</a>
        </li>
        <li class="nav-item mx-2 fs-5">
            <a class="nav-link active navbar-shortcutlink" aria-current="page" href="patientPrescription.php">Prescription</a>
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


<div>
</div>
<section class="container p-4">
    <form class="d-flex justify-content-end ms-5" action="" >
       <div class="">
        <input type="text" id="myInput" class="p-2 border-1 rounded-1 ms-5 me-2" onkeyup="myFunction()" placeholder="&#xf002; Search Doctor Name" title="Type in a name">
      </div> 
        
        <select class="rounded-1 px-2" id="mySelect" onchange="myFilter()">
              <option value="All" selected>Select Specialist</option>
              <option value="Cardiology">Cardiology</option>
              <option value="Orthopedic">Orthopedic</option>
              <option value="SURGERY">Surgery</option>
              <option value="PSYCHIATRIST">Psychiatrist</option>     
        </select>
        
    </form>
</section>
<!-- -------------------------------------- table----------------------------------- -->
<section class="container table-responsive">

      <table class="table table-striped text-center" id="myTable">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Specialist</th>
              <th scope="col">Location & Time</th>
              <th scope="col">Appointment</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;
            if($searchValue=="all"){
                $sql = "Select id, name, specialist, chember from doctor";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr id='{$i}'> <td class='row-data'> {$row["id"]} </td> <td class='row-data'> {$row["name"]} </td> <td> {$row["specialist"]} </td> <td class='row-data'> {$row["chember"]} </td> <td> <button type='button' class='btn btn-outline-success fw-bolder px-3 py-1 rounded-1' data-bs-toggle='modal' data-bs-target='#exampleModal' onClick='myBooking()'><i class='far fa-list-alt'></i> Take Appointment</button>  </td></tr>";
                      $i++;
                    }
                }

            }

            ?>
          </tbody>
      </table>


<!-- Modal -->
<form method="POST" action="patientAppointmentProcess.php">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content custom-form-background text-black">
                 <div class="modal-header">
                    <h5 class="modal-title custom-color" id="exampleModalLabel">Take Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
            
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Doctor Id</label>
                      <input type="text" name="patientAppointmentDoctorId"  readonly="readonly" id="appointmentModalDoctorId" class="form-control" value="001">
                    </div>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Doctor Name</label>
                      <input type="text" name="patientAppointmentDoctorName"  readonly="readonly"  id="appointmentModalDoctorName" class="form-control" value="Jahidul">
                    </div>
                    <div class="mb-3">
                      <label for="disabledTextInput" class="form-label">Location & Time</label>
                      <input type="text" name="patientAppointmentLocation"  readonly="readonly"  id="appointmentModalDoctorLocation" class="form-control" value="Dhanmondi">
                    </div>
           
                    <div class="mb-3">
                      <label
                      for="exampleInputAppointmentDatePatient"
                      class="form-label"
                      >Date</label
                        >
                        <input
                        name="patientAppointmentDate"
                        type="date"
                        class="form-control"
                        id="txtdate"
                        aria-describedby="emailHelp"
                        />
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger text-light me-3 btn-close-style" data-bs-dismiss="modal"><i class="far fa-times-circle me-1"></i>Close</button>
                      <button type="submit" class="btn btn-submit-style text-light"><i class="far fa-check-circle me-1"></i>Confirm</button>
                    </div>
              </div>
          </div>
      </div>
</form>

</section>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous">
  </script>
<!-- ------------------------ search js----------------------------------- -->
<script>
   
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function myFilter(){
    
    var input =  document.getElementById("mySelect").value;
    if(input=="All"){
        location.reload();
       
    }else{
        filter = input.toUpperCase();
         table = document.getElementById("myTable");
         tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
             td = tr[i].getElementsByTagName("td")[2];
             if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
           tr[i].style.display = "none";
          }
    }       
  }
    } 
}

function myBooking(){

  var rowId =event.target.parentNode.parentNode.id;
              //this gives id of tr whose button was clicked
  var data = document.getElementById(rowId).querySelectorAll(".row-data"); 
              /*returns array of all elements with 
              "row-data" class within the row with given id*/
   var id = data[0].innerHTML;
  var name = data[1].innerHTML;
   var location = data[2].innerHTML;
  
   document.getElementById("appointmentModalDoctorId").value = id;
   document.getElementById("appointmentModalDoctorName").value = name;
   document.getElementById("appointmentModalDoctorLocation").value = location;

}

</script>

</body>
</html>