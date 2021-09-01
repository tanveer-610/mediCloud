<?php 

session_start(); 
include "doctorDatabase.php";

if (isset($_POST['patientName']) && isset($_POST['patientEmail'])){

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
		header("Location: index.php?errorp=Name is required");
	    exit();
	}else if(empty($email)){
        header("Location: index.php?errorp=Email is required");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?errorp=Enter a valid Email");
	    exit();
	}else if(empty($age)){
        header("Location: index.php?errorp=Enter your Age");
	    exit();
    }else if(empty($number)){
        header("Location: index.php?errorp=Enter your Number");
	    exit();
    }else if(empty($address)){
        header("Location: index.php?errorp=Enter your Address");
	    exit();
    }else if(empty($pass)){
        header("Location: index.php?errorp=Enter password");
	    exit();
    }else if(empty($confrimPass)){
        header("Location: index.php?errorp=Enter confrim password");
	    exit();
    }else if(strcmp($pass, $confrimPass) != 0){
        header("Location: index.php?errorp=Confrim password not matched");
	    exit();
    }else{

        $sql = "SELECT * FROM patient WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location: index.php?errorp=Email already exited");
            exit();
        }else{
            //hashing password
            $pass = md5($pass);
            $sql = " INSERT INTO `patient`( `email`, `Password`, `name`, `number`, `address`, `Age`) VALUES ('$email','$pass','$name','$number','$address','$age') ";
            $result = mysqli_query($conn, $sql);

            // have to add if quary failed ?
            if($result){
                
                header("Location: index.php?");
                 exit();
            }else{
                header("Location: index.php?errorp=Something went Wrong");
                exit();
            }

        }
    }
}else{
    header("Location: index.php");
	exit();
}

?>