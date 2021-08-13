

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediCloud</title>
    <!-- -----------------------Favicon adding----------------- -->
    <link rel="shortcut icon" href="../Assets/Icons/favicon.png" type="image/x-icon" />
    <!-- -----------------------Bootstrap CSS style adding----------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <!-- -----------------------------------------------Font Awesome kit-------------------------- -->
    <script src="https://kit.fontawesome.com/04ecdf395d.js" crossorigin="anonymous"></script>
<!-- -----------------------------------------------Animate css-------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- ------------------------------CSS link up ------------------------ -->
    <link rel="stylesheet" href="../CSS/style.css" />
</head>

<body>
    <header>
        <!-- ------------------------navbar section starts here------------------------------- -->

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="#">
                    <img src="../Assets/Images/doctor.svg" alt="" width="40" height="40" class="d-inline-block align-text-top me-2" /> <span style="color:#EA5044">Medi</span><span style="color:#555657">Cloud</span>
                </a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item m-2">
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content custom-form-background">
                                        <div class="modal-header">
                                            <h3 class="modal-title custom-color fw-bolder" id="exampleModalToggleLabel">
                                            Login
                                            </h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="loginModal">
  <!-- -------------------------------- log in form -----------------------------------  -->
                                            <form method="POST" action="login.php">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email address</label
                            >
                            <input
                              name="loginEmail"
                              type="email"
                              class="form-control"
                              id="exampleInputEmail1"
                              aria-describedby="emailHelp"
                              placeholder="Write your email here..."
                            />
                            
                            <div id="emailHelp" class="form-text">
                              We'll never share your email with anyone else.
                            </div>
                          </div>
                          <div class="mb-3">
                            <label
                              for="exampleInputPassword1"
                              class="form-label"
                              >Password</label
                            >
                            <input
                              name="loginPassword"
                              type="password"
                              class="form-control"
                              id="exampleInputPassword1"
                              placeholder="Write your Password here..."
                            />
                          </div>
                          <div class="mb-3 form-check">
                            <input
                              name="loginRadio"
                              type="radio"
                              class="form-check-input"
                              id="exampleCheck1"
                              value="Patient"
                            />
                            <label class="form-check-label" for="exampleCheck1"
                              >Patient</label
                            >
                          </div>
                          <div class="mb-3 form-check">
                            <input
                              name="loginRadio"
                              type="radio"
                              class="form-check-input"
                              id="exampleCheck2"
                              value="Doctor"
                            />
                            <label class="form-check-label" for="exampleCheck2"
                              >Doctor</label
                            >
                          </div>
  <!-- -----------------------------------error msg here --------------------------------- -->
                             <?php if (isset($_GET['error'])) { ?>            
     		                    <p class="error"><?php echo $_GET['error']; echo '<script type="text/javascript">
                              var flag =1 ;
                              </script>'; ?> </p> <br>
                                  	<?php } ?> 
                          <button name="loginBtn" type="submit" class="btn btn-submit-style text-light" value="loginBtn">
                          <i class="far fa-check-circle me-1"></i>Submit
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <a
                  id="login-a-btn"
                  class="nav-link px-3 btn btn-style text-white"
                  data-bs-toggle="modal"
                  href="#exampleModalToggle"
                  role="button"
                  ><i class="fas fa-sign-in-alt me-2 pe-1 login-icon"></i>Login</a
                >
              </li>

              <li class="nav-item m-2">
                <div
                  class="modal fade"
                  id="exampleModalToggle2"
                  aria-hidden="true"
                  aria-labelledby="exampleModalToggleLabel2"
                  tabindex="-1"
                >
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content custom-form-background">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">
                          Select Your Role to Register
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>

                      <div class="container d-flex justify-content-evenly mt-2 mb-3">
                        <!-- ---------------------------Doctor's registration form--------------------------- -->
                        <div>
                          <div
                            class="modal fade"
                            id="exampleModalToggleDoctor"
                            aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabelDoctor"
                            tabindex="-1"
                          >
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5
                                    class="modal-title"
                                    id="exampleModalToggleLabelDoctor"
                                  >
                                    Doctor's registration
                                  </h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="">
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
                                      />
                                      <div id="emailHelp" class="form-text">
                                        We'll never share your email with anyone
                                        else.
                                      </div>
                                    </div>
                                    <div class="mb-3">
                                      <label
                                        for="exampleInputRegDoctor"
                                        class="form-label"
                                        >BMDC Regi. No</label
                                      >
                                      <input
                                        name="BMDCname"
                                        type="text"
                                        class="form-control"
                                        id="exampleInputRegDoctor"
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
                                      />
                                    </div>
                                    <div class="mb-3 form-check">
                                      <input
                                        name="doctorCheckbox"
                                        type="checkbox"
                                        class="form-check-input"
                                        id="exampleCheckTerms"
                                      />
                                      <label
                                        class="form-check-label"
                                        for="exampleCheckTerms"
                                        >Agree with our terms &
                                        Conditions.</label
                                      >
                                    </div>

                                    <button
                                      type="submit"
                                      class="btn btn-primary"
                                    >
                                      Submit
                                    </button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <a
                            class="nav-link btn btn-style text-light px-3 fw-bold d-flex align-items-center"
                            data-bs-toggle="modal"
                            href="#exampleModalToggleDoctor"
                            role="button"
                            ><img src="../Assets/Icons/doctorReg.png" alt="" class="img-fluid"><span class="pt-1">Register As Doctor</span></a
                          >
                        </div>

                        <!-- -------------------------------patient registration------------------------ -->

                        <div>
                          <div
                            class="modal fade"
                            id="exampleModalTogglePatient"
                            aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabelPatient"
                            tabindex="-1"
                          >
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content custom-form-background">
                                <div class="modal-header custom-color">
                                  <h3
                                    class="modal-title fw-bold"
                                    id="exampleModalToggleLabelPatient"
                                  >
                                    Patient Registration
                                  </h3>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="patientRegistration.php">

    <!-- -------------------------------- patient regi error ---------------------------   ----------------------- -->
                                  <?php if (isset($_GET['errorp'])) { ?>            
     		                    <p class="error"><?php echo $_GET['errorp']; echo '<script type="text/javascript">
                              var flag =2 ;
                              </script>'; ?> </p>
                                  	<?php } ?>
                                    <div class="mb-3">
                                      <label
                                        for="exampleInputNamePatient"
                                        class="form-label"
                                        >Name</label
                                      >
                                      <input
                                        name="patientName"
                                        type="text"
                                        class="form-control"
                                        id="exampleInputNamePatient"
                                        placeholder="Write your name here..."
                                      />
                                    </div>

                                    <div class="mb-3">
                                      <label
                                        for="exampleInputEmailPatient"
                                        class="form-label"
                                        >Email address</label
                                      >
                                      <input
                                        name="patientEmail"
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmailPatient"
                                        aria-describedby="emailHelp"
                                        placeholder="Write your email here..."
                                      />
                                      <div id="emailHelp" class="form-text">
                                        We'll never share your email with anyone
                                        else.
                                      </div>
                                    </div>
                                    <div class="mb-3">
                                    <label
                                        for="exampleInputAgePatient"
                                        class="form-label"
                                        >Age</label
                                      >
                                      <input
                                        name="patientAge"
                                        type="number"
                                        class="form-control"
                                        id="exampleInputAgePatient"  
                                        placeholder="Write your age here..."   
                                      />
                                    </div>
                                    <div class="mb-3">
                                    <label
                                        for="exampleInputNumberPatient"
                                        class="form-label"
                                        >Phone Number</label
                                      >
                                      <input
                                        name="patientNumber"
                                        type="number"
                                        class="form-control"
                                        id="exampleInputNumberPatient" 
                                        placeholder="Write your phone number here..."     
                                      />
                                    </div>

                                    <div class="mb-3">
                                      <label
                                        for="exampleInputAddressPatient"
                                        class="form-label"
                                        >Address</label
                                      >
                                      <input
                                        name="patientAddress"
                                        type="text"
                                        class="form-control"
                                        id="exampleInputAddressPatient"
                                        placeholder="Write your full address..." 
                                      />
                                    </div>

                                    <div class="mb-3">
                                      <label
                                        for="exampleInputPasswordPatient"
                                        class="form-label"
                                        >Password</label
                                      >
                                      <input
                                        name="patientPassword"
                                        type="password"
                                        class="form-control"
                                        id="exampleInputPasswordPatient"
                                        placeholder="Enter a password..." 
                                      />
                                    </div>
                                    <div class="mb-3">
                                      <label
                                        for="exampleInputPasswordConfirmPatient"
                                        class="form-label"
                                        >Confirm Password</label
                                      >
                                      <input
                                        name="patientConfirmPassword"
                                        type="password"
                                        class="form-control"
                                        id="exampleInputPasswordConfirmPatient"
                                        placeholder="Re-type your password" 
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
                          <a
                            id="patientRegisterBtn"
                            class="nav-link btn btn-style text-light px-3 d-flex align-items-center"
                            data-bs-toggle="modal"
                            href="#exampleModalTogglePatient"
                            role="button"
                            ><img src="../Assets/Icons/patientReg.png" alt="" class="img-fluid pe-1"> <span class="fw-bold pt-1">Register As Patient</span></a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <a
                  id="registrationBtn"
                  class="nav-link btn btn-style text-light"
                  data-bs-toggle="modal"
                  href="#exampleModalToggle2"
                  role="button"
                  ><i class="fas fa-user-plus me-2 register-icon"></i>Registration</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- -----------------------banner section starts here---------------------------  -->
      <section class="banner d-flex align-items-center">
        <div class="container">
          <div class="row g-lg-4 gy-3 align-items-center">
            <div class="col-lg-6 col-sm-12">
              <h1 class="moto">
                <span style="color:#EA493C">Healthy People,</span><br/>
                <span>Healthy Nation</span>
              </h1>
              <p class="text-muted mt-4"> <i>
                We look forward to providing a better & hassle-free health
                service. <br />
                We care about you.</i>
              </p>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div
                id="carouselExampleSlidesOnly"
                class="carousel slide"
                data-bs-ride="carousel"
              >
                <div class="carousel-inner">
                  <div class="carousel-item active carousel-item-height">
                    <img
                      src="../Assets/Images/Doctor-1.jpg"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="carousel-item carousel-item-height">
                    <img
                      src="../Assets/Images/Doctor-2.jpg"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="carousel-item carousel-item-height">
                    <img
                      src="../Assets/Images/Doctor-3.jpg"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>

    <main></main>
    <footer></footer>

    <!-- -------------------------------------JS bundle adding-------------------------------------------  -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous">
   </script>
    <script>   
      if(flag == 1){
        
        var login = document.getElementById("login-a-btn");
        login.click();
      }
      if(flag == 2){
        var regi = document.getElementById("registrationBtn");
        regi.click();
        var patient = document.getElementById("patientRegisterBtn");
        patient.click();

      }
    </script>

  </body>
</html>