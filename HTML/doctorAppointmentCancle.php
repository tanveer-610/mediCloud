<?php 
include "doctorDatabase.php";

if (isset($_POST['doctorAppointmentId'])){
    $id=$_POST['doctorAppointmentId'];
    $sql="DELETE FROM `appointment` WHERE appointment_id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: doctorAppointment.php");
    exit();
  } else {
    header("Location: doctorAppointment.php?error=something went wrong");
    exit();
}


}else{
    header("Location: doctorAppointment.php");
    exit();
}


?>