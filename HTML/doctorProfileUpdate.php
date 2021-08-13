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
    $name = validate($_POST['doctorName']);
    $email = validate($_POST['doctorEmail']);
	$pass = validate($_POST['doctorPassword']);
    $confrimPass = validate($_POST['doctorConfirmPassword']);
    $specialist = validate($_POST['doctorSpecialist']);
    $number = validate($_POST['doctorNumber']);
    $address = validate($_POST['doctorAddress']);

    if (empty($name)) {
		header("Location: doctorProfile.php?error=Name is required");
	    exit();
	}else if(empty($email)){
        header("Location: doctorProfile.php?error=Email is required");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: doctorProfile.php?error=Enter a valid Email");
	    exit();
	}else if(empty($specialist)){
        header("Location: doctorProfile.php?error=Enter your Special in");
	    exit();
    }else if(empty($number)){
        header("Location: doctorProfile.php?error=Enter your Number");
	    exit();
    }else if(empty($address)){
        header("Location: doctorProfile.php?error=Enter your Chamber&Time");
	    exit();
    }else if(empty($pass)){
        header("Location: doctorProfile.php?error=Enter password");
	    exit();
    }else if(empty($confrimPass)){
        header("Location: doctorProfile.php?error=Enter confrim password");
	    exit();
    }else if(strcmp($pass, $confrimPass) != 0){
        header("Location: doctorProfile.php?error=Confrim password not matched");
	    exit();
    }else{
            $sql = " UPDATE `doctor` SET `Id`='{$_SESSION['id']}',`email`='{$email}',`Password`='{$pass}',`name`='{$name}',`number`={$number},`chember`='{$address}',`specialist`='{$specialist}' WHERE Id={$_SESSION['id']};";
           //echo $sql;
           
            $result = mysqli_query($conn, $sql);
            if($result){
                
                header("Location: doctorProfile.php?");
                $_SESSION['name'] = $name;
                 exit();
            }else{

               header("Location: doctorProfile.php?error=Something went Wrong");
                exit();
            }

        
    }
}else{
    header("Location: doctorProfile.php?error=wrong");
	exit();
}


?>