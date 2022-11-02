<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentiCare Dental Clinic - Meeting All Your Oral Health Care Needs</title>

  <!--favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
  <!--CSS-->
  <link rel="stylesheet" href="../css/style.css">
</head>

<?php
include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

if (isset($_GET['isLogin'])) {
  openLoginForm();
}

if (isset($_GET['isUser'])) {
  bookAppointment();
}
function openLoginForm()
{
  if (isset($_SESSION['use'])) {
    header("Location: ../html/login-test.php");
  } else {
    header("Location: ../html/login.php");
  }
}

function bookAppointment()
{
  if (isset($_SESSION['use'])) {
    header("Location: ../html/select_service.html");
  } else {
    header("Location: ../html/login.php");
  }
}

if (isset($_POST['register'])) {
  $user = $_POST['getUsername'];
  $fullname = $_POST['getName'];
  $dob = $_POST['getDOB'];
  $nric = $_POST['getNRIC'];
  $mobileNumber = $_POST['getMobile'];
  $gender = $_POST['getGender'];
  $occupation = $_POST['getOccupation'];
  $email = $_POST['getEmail'];
  $allergies = $_POST['getAllergies'];
  $addressOne = $_POST['getAddressOne'];
  $addressTwo = $_POST['getAddressTwo'];
  $postal = $_POST['getPostal'];
  $emergencyName = $_POST['getEmergencyName'];
  $emergencyContact = $_POST['getEmergencyNumber'];
  $emergencyRelate = $_POST['getEmergencyRelation'];
  $password = $_POST['getPassword'];
  $confirmPass = $_POST['confirmPassword'];

  $sql = "INSERT INTO user_accounts(
    user_name,pass_word,admin_rights)
     VALUES ('$user','$password',0);";

  if (!mysqli_query($conn, $sql)) {
    echo "Failed to register: " . mysqli_error($connNew) . ".Please try again.";
  }

  $sql = "INSERT INTO user_profile(
    user_name,full_name,nric,D_O_B,gender,
  occupation,mobile_no,email,allergies,address_1,address_2,
  postal_code,emergency_contact_name,emergency_contact_no,emergency_contact_relation)
  VALUES ('$user','$fullname','$nric','$dob','$gender','$occupation',
  '$mobileNumber','$email','$allergies','$addressOne','$addressTwo','$postal',
  '$emergencyName','$emergencyContact','$emergencyRelate');";

  if (!mysqli_query($conn, $sql)) {
    echo "Failed to register: " . mysqli_error($connNew) . ".Please try again.";
  } else {

    $_SESSION['use'] = $user;

    echo '<script type="text/javascript"> alert("Register Successful!");</script>';
    echo '<script type="text/javascript"> window.open("../index.php","_self");</script>';            //  On Successful Login redirects to home.php
  }
}

?>

<body>
  <!--NAV Component-->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <ul class="contact-list">
          <li class="contact-item">
            <div class="icon-mail">
              <img src="../assets/img/icons/envelope-solid.svg" width="14px" height="14px">
            </div>
            <a href="mailto:denticare@localhost.com" class="contact-link">denticare@localhost.com</a>
          </li>
          <li class="contact-item">
            <div class="icon-phone">
              <img src="../assets/img/icons/phone-solid.svg" width="14px" height="14px">
            </div>
            <a href="tel:+6566224488" class="contact-link">+65 6622 4488</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="header-bottom" data-header>
      <div class="container">
        <a href="../index.php" class="logo">DentiCare</a>
        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">

            <li>
              <a href="../index.php" class="navbar-link" data-nav-link>Home</a>
            </li>

            <li>
              <a href="../html/about-us.php" class="navbar-link" data-nav-link>About Us</a>
            </li>

            <li>
              <a href="../html/doctors.php" class="navbar-link" data-nav-link>Doctors</a>
            </li>

            <li>
              <a href="registration.php?isLogin=true" class="navbar-link" data-nav-link>
                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
              </a>
            </li>

          </ul>

        </nav>
        <a href="registration.php?isUser=true" class="btn">Book appointment</a>
        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
          <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
        </button>
      </div>
    </div>
  </header>
  <!-- Registration Form-->
  <div class="form-section">

    <div class="container-form-registration">
      <header>Registration
      </header>
      <form action="" method="post">
        <div class="form first">
          <div class="details personal">
            <span class="title">Personal Details</span>

            <div class="fields">
              <div class="input-field">
                <label>Full Name</label>
                <input type="text" name="getName" placeholder="Enter your name" required>
              </div>

              <div class="input-field">
                <label>Date of Birth</label>
                <input type="date" name="getDOB" placeholder="Enter birth date" required>
              </div>

              <div class="input-field">
                <label>NRIC</label>
                <input type="text" name="getNRIC" placeholder="Enter your NRIC" required>
              </div>

              <div class="input-field">
                <label>Mobile Number</label>
                <input type="text" name="getMobile" placeholder="Enter mobile number" required>
              </div>

              <div class="input-field">
                <label>Gender</label>
                <select name="getGender" required>
                  <option disabled selected>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
              </div>

              <div class="input-field">
                <label>Occupation</label>
                <input type="text" name="getOccupation" placeholder="Enter your occupation" required>
              </div>

              <div class="input-field">
                <label>Email</label>
                <input type="text" name="getEmail" placeholder="Enter your Email" required>
              </div>

              <div class="input-field">
                <label>Allergies (seperate mulitple with ,)</label>
                <textarea name="getAllergies" placeholder="Enter your allergies" required></textarea>
              </div>
            </div>
          </div>

          <div class="addresses">
            <span class="title">Address Details</span>

            <div class="fields">
              <div class="input-field">
                <label>Address 1</label>
                <input type="text" name="getAddressOne" placeholder="Enter your address" required>
              </div>

              <div class="input-field">
                <label>Address 2</label>
                <input type="text" name="getAddressTwo" placeholder="Enter your 2nd address" value="NIL">
              </div>

              <div class="input-field">
                <label>Postal Code</label>
                <input type="text" name="getPostal" placeholder="Enter postal code" required>
              </div>
            </div>

          </div>

          <div class="emergency contact">
            <span class="title">Emergeny Contact</span>

            <div class="fields">
              <div class="input-field">
                <label>Emergency Contact Name</label>
                <input type="text" name="getEmergencyName" placeholder="Enter Emergency Contact Name" required>
              </div>

              <div class="input-field">
                <label>Emergency Contact Number</label>
                <input type="text" name="getEmergencyNumber" placeholder="Enter Emergency Contact Number" required>
              </div>

              <div class="input-field">
                <label>Relationship with Contact</label>
                <input type="text" name="getEmergencyRelation" placeholder="Enter Relationship with Contact" required>
              </div>
            </div>
          </div>

          <div class="account information">
            <span class="title">Account Information</span>

            <div class="fields">
              <div class="input-field">
                <label>Username</label>
                <input type="text" name="getUsername" placeholder="Enter Username" required>
              </div>

              <div class="input-field">
                <label>Password</label>
                <input type="text" name="getPassword" placeholder="Enter Password" required>
              </div>

              <div class="input-field">
                <label>Confirm Password</label>
                <input type="text" name="confirmPassword" placeholder="Enter Password again" required>
              </div>
            </div>
          </div>

          <button class="submitBtn" name="register">
            <span class="btnText">Submit</span>
          </button>
          <a href="login.php" style="color:blue;">Click here to Sign In</a>
        </div>
    </div>
    </form>

  </div>

  </div>

</body>
<footer class="footer">

  <div class="footer-top">
    <div class="container">
      <h1 class="text-center">DentiCare Dental Clinic</h1>
      <div class="box-container">
        <div class="box">
          <h3>Quick Links</h3>
          <a href="../index.php">Home</a>
          <a href="../html/about-us.php">About Us</a>
          <a href="../html/doctors.php">Doctors</a>
        </div>
        <div class="box">
          <h3>Contact Us</h3>
          <a href="tel:+6566224488"> +65 6622 4488 </a>
          <a href="mailto:denticare@localhost.com"> denticare@localhost.com </a>
          <a href="#"> 21 Lor 8 Toa Payoh, #01-200, Singapore 310019 </a>
        </div>
        <div class="box-message">
          <h3>Send Us a Message</h3>
          <form action="#" method="get">
            <input type="text" class="input-text-name" name="contactName" size="40" placeholder="Enter your name" />
            <input type="email" class="input-text-email" size="40" placeholder="Enter your email">
            <textarea placeholder='Enter comment...' maxlength='1000' minlength='100'></textarea>
            <input type="submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom text-center">
    <div class="container">
      <p class="copyright">
        CopyRight &copy; 2022 DentiCare Dental Clinic
      </p>
    </div>
  </div>
  <!--Javascript files-->
  <script src="../assets/js/scripts.js" defer></script>
</footer>
<?php
CloseCon($conn)
?>

</html>