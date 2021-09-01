<?php
session_start();
include "doctorDatabase.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['patientName']);
    $email = validate($_POST['patientEmail']);
	$pass = validate($_POST['patientPassword']);
    $confrimPass = validate($_POST['patientConfirmPassword']);
    $age = validate($_POST['patientAge']);
    $number = validate($_POST['patientNumber']);
    $address = validate($_POST['patientAddress']);

    if (empty($name)) {
		header("Location: patientProfile.php?error=Name is required");
	    exit();
	}else if(empty($email)){
        header("Location: patientProfile.php?error=Email is required");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: patientProfile.php?error=Enter a valid Email");
	    exit();
	}else if(empty($age)){
        header("Location: patientProfile.php?error=Enter your Age");
	    exit();
    }else if(empty($number)){
        header("Location: patientProfile.php?error=Enter your Number");
	    exit();
    }else if(empty($address)){
        header("Location: patientProfile.php?error=Enter your Address");
	    exit();
    }else if(empty($pass)){
        header("Location: patientProfile.php?error=Enter password");
	    exit();
    }else if(empty($confrimPass)){
        header("Location: patientProfile.php?error=Enter confrim password");
	    exit();
    }else if(strcmp($pass, $confrimPass) != 0){
        header("Location: patientProfile.php?error=Confrim password not matched");
	    exit();
    }else{
        $pass = md5($pass);
            $sql = " UPDATE `patient` SET `Id`='{$_SESSION['id']}',`email`='{$email}',`Password`='{$pass}',`name`='{$name}',`number`={$number},`address`='{$address}',`Age`={$age} WHERE Id={$_SESSION['id']};";
           //echo $sql;
            $result = mysqli_query($conn, $sql);
            if($result){
                
                header("Location: patientProfile.php?");
                $_SESSION['name'] = $name;
                 exit();
            }else{
                header("Location: patientProfile.php?error=Something went Wrong");
                exit();
            }

        
    }
}else{
    header("Location: patientProfile.php?error=wrong");
	exit();
}


?>