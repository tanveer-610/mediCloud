<?php  


session_start(); 
include "doctorDatabase.php";

if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['loginEmail']);
	$pass = validate($_POST['loginPassword']);
	$radio = validate($_POST['loginRadio']);

	if (empty($email)) {
		header("Location: index.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else if(empty($radio)){
        header("Location: index.php?error=Select Role");
	    exit();
	}
	else{
		// hashing the password
        // $pass = md5($pass);
        if($radio == "Doctor"){
			$sql = "SELECT * FROM doctor WHERE email='$email' AND Password='$pass'";

			$result = mysqli_query($conn, $sql);
			
	
			if (mysqli_num_rows($result) == 1) {
				// $row = mysqli_fetch_assoc($result);
				// if ($row['email'] === $email && $row['Password'] === $pass) {
					// $_SESSION['user_name'] = $row['user_name'];
					// $_SESSION['name'] = $row['name'];
					// $_SESSION['id'] = $row['id'];
					header("Location: doctorHome.php");
					exit();
				// }else{
					
				// 	header("Location: index.php?error=Incorect Email or password inside");
				// 	exit();
				//  }
			}else{
				header("Location: index.php?error=Incorect Email or password");
				exit();
			}
			
		}else if($radio == "Patient"){

			$sql = "SELECT * FROM patient WHERE email='$email' AND Password='$pass'";

			$result = mysqli_query($conn, $sql);
			
	
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				// if ($row['email'] === $email && $row['Password'] === $pass) {
					// $_SESSION['user_name'] = $row['user_name'];
					// $_SESSION['name'] = $row['name'];
					// $_SESSION['id'] = $row['id'];
					$_SESSION['id'] = $row["Id"];
					$_SESSION['name'] = $row["name"];
					header("Location: patientHome.php");
					exit();
				// }else{
					
				// 	header("Location: index.php?error=Incorect Email or password inside");
				// 	exit();
				//  }
			}else{
				header("Location: index.php?error=Incorect Email or password");
				exit();
			}

		}
		
		else{
			header("Location: index.php?error=Something wrong");
			exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}


?>
