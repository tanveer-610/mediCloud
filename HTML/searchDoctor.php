<?php 
include "doctorDatabase.php";
$searchValue="all"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <!-- -----------------------------------------------Font Awesome kit-------------------------- -->
    <script src="https://kit.fontawesome.com/04ecdf395d.js" crossorigin="anonymous"></script>
    <!-- ------------------------------CSS link up ------------------------ -->
    <link rel="stylesheet" href="../CSS/style.css" />
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"> <img src="../Assets/Icons/favicon.png" alt="" width="30" height="24">Medi Cloud</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="patientHome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Search Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="patientAppointment.php">Apointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>


<div>
</div>
<section>
<form class="d-flex" action="">
        
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="dropdown">
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Heart</a></li>
    <li><a class="dropdown-item" href="#">Bone</a></li>
    <li><a class="dropdown-item" href="#">Surgery</a></li>
  </ul>
</div>
<select id="mySelect" onchange="myFilter()">
<option value="All" selected>All</option>
  <option value="HEART">Heart</option>
  <option value="BONE">Bone</option>
  <option value="SURGERY">Surgery</option>
  <option value="MENTAL">Mental</option>
  
</select>
        
      </form>
</section>
<!-- -------------------------------------- table----------------------------------- -->
<section>

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Specialist</th>
      <th scope="col">Location</th>
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
                echo "<tr id='{$i}'> <td class='row-data'> {$row["id"]} </td> <td class='row-data'> {$row["name"]} </td> <td> {$row["specialist"]} </td> <td class='row-data'> {$row["chember"]} </td> <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' onClick='myBooking()'>Book</button>  </td></tr>";
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <fieldset disabled> -->
      <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Doctor Id</label>
      <input type="text" name="patientAppointmentDoctorId"  readonly="readonly" id="appointmentModalDoctorId" class="form-control" value="001">
     </div>
     <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Doctor Name</label>
      <input type="text" name="patientAppointmentDoctorName"  readonly="readonly"  id="appointmentModalDoctorName" class="form-control" value="Jahidul">
     </div>
     <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Location</label>
      <input type="text" name="patientAppointmentLocation"  readonly="readonly"  id="appointmentModalDoctorLocation" class="form-control" value="Dhanmondi">
     </div>
    <!-- </fieldset> -->
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
          id="exampleInputAppointDatePatient"
          aria-describedby="emailHelp"
          />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confrim</button>
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