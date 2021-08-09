<?php 
include "doctorDatabase.php";

if (isset($_POST['patientAppointmentId'])){
    $id=$_POST['patientAppointmentId'];
    $sql="DELETE FROM `appointment` WHERE appointment_id = $id";

    
if ($conn->query($sql) === TRUE) {
    header("Location: patientAppointment.php");
    exit();
  } else {
    header("Location: patientAppointment.php?error=something went wrong");
    exit();
}


}else{
    header("Location: patientAppointment.php");
    exit();
}


?>