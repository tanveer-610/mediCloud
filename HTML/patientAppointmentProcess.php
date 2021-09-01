<?php  
session_start();
include "doctorDatabase.php";

if (isset($_POST['patientAppointmentDate'])){
    $patient_id = $_SESSION['id'];
    $patient_name = $_SESSION['name'];

    $doctor_id = $_POST['patientAppointmentDoctorId'];
    $doctor_name = $_POST['patientAppointmentDoctorName'];
    $location = $_POST['patientAppointmentLocation'];
    $date = $_POST['patientAppointmentDate'];
    // add validation here---------------------------------------------------------------
    
    
    $sql="INSERT INTO `appointment`(`patient_id`, `patient_name`, `doctor_id`, `doctor_name`, `location`, `date`) VALUES ('$patient_id','$patient_name','$doctor_id','$doctor_name','$location','$date');";
	if ($conn->query($sql) === TRUE) {
        header("Location: patientAppointment.php");
        exit();
    } else {
        header("Location: searchDoctor.php?error=something went wrong");
        exit();
      }

}else{
    header("Location: searchDoctor.php");
    exit();
}


?>
