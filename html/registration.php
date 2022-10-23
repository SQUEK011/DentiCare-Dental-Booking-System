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
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <!--CSS-->
  <link rel="stylesheet" href="../css/style.css">
</head>

<?php
session_start();

if (isset($_GET['hello'])) {
  openLoginForm();
}
function openLoginForm()
{
  if (isset($_SESSION['use'])) {
    header("Location: ../html/login-test.php");
  } else {
    header("Location: ../html/registration.html");
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
        <a href="#" class="logo">DentiCare</a>
        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">

            <li>
              <a href="#" class="navbar-link" data-nav-link>Home</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>About Us</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>Doctors</a>
            </li>

            <li>
              <a href="?hello=true" class="navbar-link" data-nav-link>
                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
              </a>
            </li>

          </ul>

        </nav>
        <a href="../html/select_service.html" class="btn">Book appointment</a>
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
      <form action="#">
        <div class="form first">
          <div class="details personal">
            <span class="title">Personal Details</span>

            <div class="fields">
              <div class="input-field">
                <label>Full Name</label>
                <input type="text" placeholder="Enter your name" required>
              </div>

              <div class="input-field">
                <label>Date of Birth</label>
                <input type="date" placeholder="Enter birth date" required>
              </div>

              <div class="input-field">
                <label>Email</label>
                <input type="text" placeholder="Enter your email" required>
              </div>

              <div class="input-field">
                <label>Mobile Number</label>
                <input type="number" placeholder="Enter mobile number" required>
              </div>

              <div class="input-field">
                <label>Gender</label>
                <select required>
                  <option disabled selected>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
              </div>

              <div class="input-field">
                <label>Occupation</label>
                <input type="text" placeholder="Enter your ccupation" required>
              </div>
            </div>
          </div>

          <div class="details ID">
            <span class="title">Identity Details</span>

            <div class="fields">
              <div class="input-field">
                <label>ID Type</label>
                <input type="text" placeholder="Enter ID type" required>
              </div>

              <div class="input-field">
                <label>ID Number</label>
                <input type="number" placeholder="Enter ID number" required>
              </div>

              <div class="input-field">
                <label>Issued Authority</label>
                <input type="text" placeholder="Enter issued authority" required>
              </div>

              <div class="input-field">
                <label>Issued State</label>
                <input type="text" placeholder="Enter issued state" required>
              </div>

              <div class="input-field">
                <label>Issued Date</label>
                <input type="date" placeholder="Enter your issued date" required>
              </div>

              <div class="input-field">
                <label>Expiry Date</label>
                <input type="date" placeholder="Enter expiry date" required>
              </div>
            </div>

            <button class="submitBtn">
              <span class="btnText">Submit</span>
            </button>
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
  </div>

  <div class="footer-bottom text-center">
    <div class="container">
      <p class="copyright">
        CopyRight &copy; 2022 DentiCare Dental Clinic
      </p>
    </div>
  </div>
  <!--Javascript files-->
  <script src="assets/js/scripts.js" defer></script>
</footer>

</html>