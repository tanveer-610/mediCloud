<?php
session_start();
include "doctorDatabase.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["prescription"])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $appointment_id = $_POST["doctorAppointmentId"];
    $prescription = validate($_POST["prescription"]);
    $patient_id = validate($_POST["doctorAppointmentViewPatientId"]);
    $today = date("y.m.d");  
    if (empty($prescription)) {
		header("Location: doctorAppointment.php?error=Prescription is required");
	    exit();
    }else{
        $sql = "INSERT INTO `prescription`(`patient_id`, `Doctor_id`,`doctor_name`, `text`, `date`) VALUES ({$patient_id},{$_SESSION['id']},'{$_SESSION['name']}','{$prescription}','{$today}')";
        
        $result = mysqli_query($conn, $sql);
      
        if($result){
            $sql = "DELETE FROM `appointment` WHERE appointment_id=$appointment_id";
            $conn->query($sql);
            
            header("Location: doctorAppointment.php?");
             exit();
        }else{
            header("Location: doctorAppointment.php?errorx=Something went Wrong");
            exit();
        }
    }

}else{
    header("Location: doctorAppointment.php?errorx=something wrong");
	    exit();
}



?>