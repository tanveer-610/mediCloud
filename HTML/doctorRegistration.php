<?php 

session_start(); 
include "doctorDatabase.php";

if (isset($_POST['doctorName']) && isset($_POST['doctorEmail'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['doctorName']);
    $email = validate($_POST['doctorEmail']);
    $id = validate($_POST['BMDCnumber']);
	$pass = validate($_POST['doctorPassword']);
    $confrimPass = validate($_POST['doctorConfirmPassword']);
    $specialist = validate($_POST['specialist-list']);
    $number = validate($_POST['doctorNumber']);
    $address = validate($_POST['doctorAddress']);

    if (empty($name)) {
		header("Location: index.php?errord=Name is required");
	    exit();
	}else if(empty($email)){
        header("Location: index.php?errord=Email is required");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?errord=Enter a valid Email");
	    exit();
	}else if(empty($id)){
        header("Location: index.php?errord=Enter your BMDC Regi. No");
	    exit();
    }else if(!strcmp($specialist, "none")){
        header("Location: index.php?errord=Select your Speciality");  
	   exit();
    }else if(empty($address)){
        header("Location: index.php?errord=Enter your Chamber & Time Schedule");
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

        $sql = "SELECT * FROM doctor WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location: index.php?errorp=BMDC Regi no. already exited");
            exit();
        }else{
            $sql = " INSERT INTO `doctor`(`Id`, `email`, `Password`, `name`, `specialist`, `chember`, `number`) VALUES ($id,'$email','$pass','$name','$specialist','$address','$number') ";
            $result = mysqli_query($conn, $sql);

            // have to add if quary failed ?
            if($result){
                
                header("Location: index.php?");
                 exit();
            }else{
                header("Location: index.php?errord=Something went Wrong");
                exit();
            }

        }
    }
}else{
    header("Location: index.php");
	exit();
}

?>