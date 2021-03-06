<?php
session_start();
include "doctorDatabase.php";
if(!isset($_SESSION['id'])){
  header("location:index.php?warning=login first");
  session_unset();
  session_destroy();  
}
$sql ="SELECT * FROM doctor WHERE id={$_SESSION['id']};";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
  $row = $result->fetch_assoc();
  $email =$row["email"];
  $specialist = $row["specialist"];
  $chamber =$row["chember"];
  $phone =$row["number"];
  $password = $row["Password"];
  if($specialist == "Cardiology"){
    echo '<script> var i = 0;  </script>';
  }else if($specialist == "Orthopedic"){
    echo '<script> var i = 1;  </script>';
  }else if($specialist == "Surgery"){
    echo '<script> var i = 2;  </script>';
  }else{
    echo '<script> var i = 3;  </script>';
  }
 
}else{
  $email = "";
  $chamber ="";
  $phone = "";
  $password="";
  $specialist="";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediCloud</title>
    <!-- -----------------------Favicon adding----------------- -->
    <link
      rel="shortcut icon"
      href="../Assets/Icons/favicon.png"
      type="image/x-icon"
    />
    <!-- -----------------------Bootstrap CSS style adding----------------- -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />
    <!-- -----------------------------------------------Font Awesome kit-------------------------- -->
    <script
      src="https://kit.fontawesome.com/04ecdf395d.js"
      crossorigin="anonymous"
    ></script>
    <!-- -----------------------------------------------Animate css-------------------------- -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- ------------------------------CSS link up ------------------------ -->
    <link rel="stylesheet" href="../CSS/style.css" />
  </head>
  <body>
    <header>
      <!-- nav-bar add. -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="doctorHome.php">
                    <img src="../Assets/Images/doctor.png" alt="" width="55" height="55" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
                </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="doctorHome.php"
                  >Home</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="doctorAppointment.php"
                  >Appointment</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink current-page"
                  aria-current="page"
                  href="#"
                  >Profile</a
                >
              </li>
              <li class="nav-item mx-2 fs-5">
                <a
                  class="nav-link active navbar-shortcutlink"
                  aria-current="page"
                  href="logout.php"
                  >Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section class="container mt-4">
        <h1 class="card-title text-center mb-4" style="color: #ea5044">Profile</h1>
        <div class="card mb-3 border-0">
          <div class="row g-0 align-items-center shadow-lg rounded-pill py-3">
            <div class="col-md-5 d-flex flex-column align-items-center">
              <div class="profile-image">
                <img
                  src="../Assets/Images/Doctor Ui/doctorAvatar.jpg"
                  class="img-fluid rounded-circle"
                  height="250"
                  width="250"
                  alt="..."
                />
              </div>
              
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <div class="card-text lh-lg">
                  <label for="patient-profile-name" class="fs-4"><span class="fw-bold" style="color: #555657">Name: </span> <?php echo"{$_SESSION['name']}" ?> </label><br />
                  <label for="patient-profile-email" class="fs-4"><span class="fw-bold" style="color: #555657">Email: </span> <?php echo"{$email}" ?></label><br />
                  <label for="patient-profile-age" class="fs-4"><span class="fw-bold" style="color: #555657">Special in: </span> <?php echo"{$specialist}" ?></label><br />
                  <label for="patient-profile-phone" class="fs-4"><span class="fw-bold" style="color: #555657">Phone: </span> <?php echo"{$phone}" ?></label><br />
                  <label for="patient-profile-phone" class="fs-4"><span class="fw-bold" style="color: #555657">Chamber: </span> <?php echo"{$chamber}" ?></label>
                
                <div>
                <!-- Button trigger modal -->
                <button
                  type="button"
                  class="btn text-light rounded-pill px-3"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  id="editPatientProfileBtn"
                  style="background-color:#ea493c"
                >
                  Edit Profile
                </button>

                <!-- Modal -->
                <div
                  class="modal fade"
                  id="exampleModal"
                  tabindex="-1"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content custom-form-background">
                      <div class="modal-header">
                        <h3 class="modal-title fw-bold custom-color" id="exampleModalLabel">
                          Edit Profile
                        </h3>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="doctorProfileUpdate.php">
                           <!-- -----------------------------------error msg here --------------------------------- -->
                           <?php if (isset($_GET['error'])) { ?>            
     		                    <p class="error"><?php echo $_GET['error']; echo '<script type="text/javascript">
                              var flag =1 ;
                              </script>'; ?> </p> <br>
                                  	<?php } ?> 
                          <div class="mb-3">
                            <label
                              for="exampleInputNameDoctor"
                              class="form-label"
                              >Name</label
                            >
                            <input
                              name="doctorName"
                              type="text"
                              class="form-control"
                              id="exampleInputNameDoctor"
                              placeholder="Write your name here..."
                              value="<?php echo"{$_SESSION['name']}";?>"
                            />
                          </div>

                          <div class="mb-3">
                            <label
                              for="exampleInputEmailDoctor"
                              class="form-label"
                              >Email address</label
                            >
                            <input
                              name="doctorEmail"
                              type="email"
                              class="form-control"
                              id="exampleInputEmailDoctor"
                              aria-describedby="emailHelp"
                              placeholder="Write your email here..."
                              readonly="readonly"
                              value="<?php echo"{$email}"; ?>"
                            />
                            
                          </div>
                          <div class="mb-3">
                            <label
                              for="exampleInputSpecialistDoctor"
                              class="form-label"
                              >Specialist</label
                            >
                            <select name="doctorSpecialist" class="form-control" id="exampleInputRegDoctor">
                                          <option value="Cardiology">Cardiology</option>
                                          <option value="Orthopedic">Orthopedic</option>
                                          <option value="Surgery">Surgery</option>
                                          <option value="Psychiatrist">Psychiatrist</option>
                                      </select>
                          </div>
                          <div class="mb-3">
                            <label
                              for="exampleInputNumberDoctor"
                              class="form-label"
                              >Phone Number</label
                            >
                            <input
                              name="doctorNumber"
                              type="number"
                              class="form-control"
                              id="exampleInputNumberDoctor"
                              placeholder="Write your phone number here..."
                              value="<?php echo"{$phone}";?>"
                            />
                          </div>

                          <div class="mb-3">
                            <label
                              for="exampleInputAddressDoctor"
                              class="form-label"
                              >Chamber & Time</label
                            >
                            <input
                              name="doctorAddress"
                              type="text"
                              class="form-control"
                              id="exampleInputAddressDoctor"
                              placeholder="Write your Chamber address&Time..."
                              value="<?php echo"{$chamber}";?>"
                            />
                          </div>

                          <div class="mb-3">
                            <label
                              for="exampleInputPasswordDoctor"
                              class="form-label"
                              >Password</label
                            >
                            <input
                              name="doctorPassword"
                              type="password"
                              class="form-control"
                              id="exampleInputPasswordDoctor"
                              placeholder="*******"
                              
                            />
                          </div>
                          <div class="mb-3">
                            <label
                              for="exampleInputPasswordConfirmDoctor"
                              class="form-label"
                              >Confirm Password</label
                            >
                            <input
                              name="doctorConfirmPassword"
                              type="password"
                              class="form-control"
                              id="exampleInputPasswordConfirmDoctor"
                              placeholder="*******"
                            />
                          </div>
                          <button
                            type="submit"
                            class="btn btn-submit-style text-white"
                          >
                            <i class="far fa-check-circle me-1"></i>Submit
                          </button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- ----------------------------JS Bundle CDN-------------------------------  -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>

    <script> 
        var specialList = document.querySelector('#exampleInputRegDoctor');
        specialList[i].selected = true;
        i

        if(flag==1){
                  var patientProfileUpdateModal = document.getElementById("editPatientProfileBtn");
        patientProfileUpdateModal.click(); 
        }  
  
    </script>


  </body>
</html>
