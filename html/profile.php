<!DOCTYPE html>
<html>

<?php
//Database Connection
include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

//Header Functions
if (isset($_GET['isLogin'])) {
  openLoginForm();
}

if (isset($_GET['isUser'])) {
  bookAppointment();
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php");
}

function openLoginForm()
{
  if (isset($_SESSION['use'])) {
    header("Location: ../html/profile.php");
  } else {
    header("Location: ../html/login.php");
  }
}

function bookAppointment()
{
  if (isset($_SESSION['use'])) {
    header("Location: ../html/select_service.php");
  } else {
    header("Location: ../html/login.php");
  }
}

$user = $_SESSION['use'];

/*For Personal Profile*/
//Get Personal Profile 
$fullname =
  $dob =
  $nric =
  $mobileNumber =
  $gender =
  $occupation =
  $email =
  $allergies =
  $addressOne =
  $addressTwo =
  $postal =
  $emergencyName =
  $emergencyContact =
  $emergencyRelate = "";

$sql = "SELECT * from user_profile where user_name = '$user'";
$results = $conn->query($sql);

while ($row = $results->fetch_assoc()) {
  $fullname = $row['full_name'];
  $dob = $row['D_O_B'];
  $nric = $row['nric'];
  $mobileNumber = $row['mobile_no'];
  $gender = $row['gender'];
  $occupation = $row['occupation'];
  $email = $row['email'];
  $allergies = $row['allergies'];
  $addressOne = $row['address_1'];
  $addressTwo = $row['address_2'];
  $postal = $row['postal_code'];
  $emergencyName = $row['emergency_contact_name'];
  $emergencyContact = $row['emergency_contact_no'];
  $emergencyRelate = $row['emergency_contact_relation'];;
}

mysqli_free_result($results);
?>

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
            <a href="mailto:info@example.com" class="contact-link">info@example.com</a>
          </li>
          <li class="contact-item">
            <div class="icon-phone">
              <img src="../assets/img/icons/phone-solid.svg" width="14px" height="14px">
            </div>
            <a href="tel:+917052101786" class="contact-link">+91-7052-101-786</a>
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
              <a href="#" class="navbar-link" data-nav-link>About Us</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>Doctors</a>
            </li>

            <li>
              <a href="profile.php?isLogin=true" class="navbar-link" data-nav-link>
                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
              </a>
            </li>

          </ul>

        </nav>
        <a href="profile.php?isUser=true" class="btn">Book appointment</a>
        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
          <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
        </button>
      </div>
    </div>
  </header>

  <!--Show Profile-->
  <section class="profile">
    <div class="container">
      <div class="profile-container">
        <header>Profile</header>
        <a href="profile.php?logout=true" style="float:right;">
          <button type="submit" class="logout-btn">Logout</button>
        </a>
        <div class="personal-details-container">
          <span class="title">Personal Details</span>
          <div class="fields">
            <div class="details-field">
              <label>Full Name</label>
              <span class="label-result"><?= $fullname ?></span>
            </div>
            <div class="details-field">
              <label>Date of Birth</label>
              <span class="label-result"><?= $dob ?></span>
            </div>
            <div class="details-field">
              <label>NRIC</label>
              <span class="label-result"><?= $nric ?></span>
            </div>
            <div class="details-field">
              <label>Mobile Number</label>
              <span class="label-result"><?= $mobileNumber ?></span>
            </div>
            <div class="details-field">
              <label>Gender</label>
              <span class="label-result"><?= $gender ?></span>
            </div>
            <div class="details-field">
              <label>Occupation</label>
              <span class="label-result"><?= $occupation ?></span>
            </div>
            <div class="details-field">
              <label>Email</label>
              <span class="label-result"><?= $email ?></span>
            </div>
            <div class="details-field">
              <label>Allergies</label>
              <span class="label-result"><?= $allergies ?></span>
            </div>
            <div class="details-field" hidden>

            </div>
            <div class="details-field">
              <label>Address 1</label>
              <span class="label-result"><?= $addressOne ?></span>
            </div>
            <div class="details-field">
              <label>Address 2</label>
              <span class="label-result"><?= $addressTwo ?></span>
            </div>
            <div class="details-field">
              <label>Postal Code</label>
              <span class="label-result"><?= $postal ?></span>
            </div>
          </div>
        </div>
        <div class="emergency-contact-container">
          <span class="title">Emergency Contact</span>
          <div class="fields">
            <div class="details-field">
              <label>Emergency Contact Name</label>
              <span class="label-result"><?= $emergencyName ?></span>
            </div>

            <div class="details-field">
              <label>Emergency Contact Number</label>
              <span class="label-result"><?= $emergencyContact ?></span>
            </div>

            <div class="details-field">
              <label>Relationship with Contact</label>
              <span class="label-result"><?= $emergencyRelate ?></span>
            </div>
          </div>
        </div>
        <div class="next-appointment-container">
          <span class="title">Next Appointment</span>
          <div class="box-appointment">
            <div class="details-field">
              <label>Service: </label>
              <span class="label-result">Data</span>
            </div>
            <div class="details-field">
              <label>Doctor: </label>
              <span class="label-result">Data</span>
            </div>
            <div class="details-field">
              <label>Timeslot: </label>
              <span class="label-result">Data</span>
            </div>
          </div>
        </div>
        <button class="edit-appointment-btn">Edit Appointment</button>
      </div>
    </div>
  </section>
</body>
<footer class="footer">

  <div class="footer-top">
    <div class="container">
      <h1 class="text-center">DentiCare Dental Clinic</h1>
      <div class="box-container">
        <div class="box">
          <h3>Quick Links</h3>
          <a href="#">Home</a>
          <a href="#">About Us</a>
          <a href="#">Doctors</a>
        </div>
        <div class="box">
          <h3>Contact Us</h3>
          <a href="#"> +123-456-7890 </a>
          <a href="#"> shaikhanas@gmail.com </a>
          <a href="#"> mumbai, india - 400104 </a>
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
CloseCon($conn);
?>

</html>