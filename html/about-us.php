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
  session_start();
  

  if (isset($_GET['isLogin'])){
    openLoginForm();
  }

  if (isset($_GET['isUser'])){
    bookAppointment();
  }
  function openLoginForm(){
    if (isset($_SESSION['use'])){
      header("Location: ../html/profile.php");
    }
    else {
      header("Location: ../html/login.php");
    }
  }

  function bookAppointment(){
    if (isset($_SESSION['use'])){
      header("Location: ../html/select_service.php");
    }
    else {
      header("Location: ../html/login.php");
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
                <img src="../assets/img/icons/envelope-solid.svg" width="14px"
                  height="14px">
              </div>
              <a href="mailto:denticare@localhost" class="contact-link">denticare@localhost</a>
            </li>
            <li class="contact-item">
              <div class="icon-phone">
                <img src="../assets/img/icons/phone-solid.svg" width="14px"
                  height="14px">
              </div>
              <a href="tel:+917052101786" class="contact-link">+65 6555 4888</a>
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
                <a href="about-us.php" class="navbar-link" data-nav-link>About Us</a>
              </li>
              <li>
                <a href="doctors.php" class="navbar-link" data-nav-link>Doctors</a>
              </li>
              <li>
                <a href="?isLogin=true" class="navbar-link"
                  data-nav-link>
                  <img src="../assets/img/icons/circle-user-solid.svg"
                    width="30px">
                </a>
              </li>
            </ul>
          </nav>
          <a href="?isUser=true" class="btn">Book appointment</a>
          <button class="nav-toggle-btn" aria-label="Toggle menu"
            data-nav-toggler>
            <img src="../assets/img/icons/bars-solid.svg" width="20px"
              aria-hidden="true" class="menu-icon">
            <img src="../assets/img/icons/xmark-solid.svg" width="20px"
              aria-hidden="true" class="close-icon">
          </button>
        </div>
      </div>
  </header>


  <!-- Banner -->
  <section class="about-us-banner" style="background-image:
      url(../assets/img/images/banner\ bg\ image.png);">
    <div class="banner-content">
      <h1 class="h1 banner-title">Clinic's History & Reputation</h1>
      <p class="banner-text-aboutus">DentiCare is a dedicated dental clinic that focuses on providing the best dental
        care.</br>We have been in this business for more than 10 years and we have dentists from all over the world. Our
        dentists are highly qualified and have years of experience in their field.</br></br></p>
    </div>

  </section>

  <!--Our Services -->
  <section class="services">
    <div class="container">
      <h1 class="heading"> our services</h1>
      <div class="border"></div>
      <p class="servicescaption">Learn more about the services that we provide
        at DentiCare!</p>

      <div class="box-container">
        <div class="box" name="online-schedule">
          <img src="../assets/img/images/services-1.webp" alt="">
          <h3>online schedule</h3>
          <p>Quick and easy booking of dental appointments.</br>5 minutes is all you need to check our dentists'
            availability and book your desired timeslots!</p>
        </div>
        <div class="box" name="cosmetic-feeling">
          <img src="../assets/img/images/services-2.webp" alt="">
          <h3>cosmetic filling</h3>
          <p>Improve your smile with cosmetic filling.</br> Cosmetic filling are less noticeable compared to traditional
            amalgam filling. and improve the appearance of your smile. </br>Your smile matters to us!</p>
        </div>
        <div class="box" name="oral-hygiene">
          <img src="../assets/img/images/services-3.webp" alt="">
          <h3>oral hygiene experts</h3>
          <p>For healthy teeth and gums, proper dental hygiene is essential.</br>We will provide scaling and polishing
            services.</br>Let our dentists take care of your dental needs!</p>
        </div>
      </div>
    </div>
  </section>

  <!--Dental Services in Numbers-->
  <section class="testimonials-foraboutus">
    <div class="container">
      <h1 class="heading"> Dental Service in Numbers</h1>
      <div class="border"></div>
      <p class="servicescaption">We are committed to providing you with the best quality dental care.</br>We do not just
        want to be your dentist.</br>We want to make sure that you are taken care of by dentists who truly care about
        their patients. </p>
      <div class="testimonial-row">
        <div class="aboutus-testimonial-col">
          <div class="testimonial-about-us">
            <img src="../assets/img/icons/emoji-laughing-fill.svg" alt="">
            <div class="aboutus-name"><strong>99%</strong></div>
            <p>
              Customer Satisfaction
            </p>
          </div>
        </div>
        <div class="aboutus-testimonial-col">
          <div class="testimonial-about-us">
            <img src="../assets/img/icons/calendar-check-fill.svg" alt="">
            <div class="aboutus-name"><strong>100%</strong></div>
            <p>
              Appointments Fulfilled
            </p>
          </div>
        </div>
        <div class="aboutus-testimonial-col">
          <div class="testimonial-about-us">
            <img src="../assets/img/icons/piggy-bank-fill.svg" alt="">
            <div class="aboutus-name"><strong>99%</strong></div>
            <p>
              Competitive</br>Prices
            </p>

          </div>
        </div>

        <div class="aboutus-testimonial-col">
          <div class="testimonial-about-us">
            <img src="../assets/img/icons/people-fill.svg" alt="">
            <div class="aboutus-name"><strong>1k+</strong></div>
            <p>
              Members Registered
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="testimonials">
    <div class="inner">
      <h1 class="heading">Customer's Experience</h1>
      <div class="border"></div>

      <div class="testimonial-row">
        <div class="testimonial-col">
          <div class="testimonial">
            <img src="../assets/img/images/p1.png" alt="">
            <div class="name"><strong>Chris Tan</strong></div>
            <p>
              <i>"DentiCare has the best dental service I have ever experienced. Their prices are really competitive and
                the customer service is unbeatable! I've been with them for a while now and it's been excellent overall.
                DentiCare has been and will be my dental clinic of choice for years."</i>
            </p>
          </div>
        </div>

        <div class="testimonial-col">
          <div class="testimonial">
            <img src="../assets/img/images/p2.png" alt="">
            <div class="name"><strong>Shannon Lee</strong></div>
            <p>
              <i>"I was hesitant to try DentiCare at first because it's a newer dentist service in the area. I am so
                glad I did though because they are by far the best around! Their staff is super friendly and they have
                top of the line equipment and technology. They have my whole family as their clients now!"</i>
            </p>
          </div>
        </div>

        <div class="testimonial-col">
          <div class="testimonial">
            <img src="../assets/img/images/p3.png" alt="">
            <div class="name"><strong>Rebecca Chong</strong></div>
            <p>
              <i>"DentiCare is a wonderful company to go with for your dental needs. I have been going here for about a
                year now and I can't imagine going anywhere else. The staff is incredibly friendly, the procedure was
                painless, and the results are out of this world! Highly recommended to everyone!"</i>
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="contactus">
      <div class="inner">
        <h1 class="heading">Contact Us</h1>
        <div class="border"></div>

        <di v class="contactus-row">
          <div class="contactus-col">
            <div class="contactus1">
              <img src="../assets/img/icons/geo-alt-fill.svg" alt="Location icon">
              <div class="name"><strong>Address</strong></div>
              <p>
                21 Beach Rd #01-123, S(588122)
              </p>
            </div>
          </div>

          <div class="contactus-col">
            <div class="contactus1">
              <img src="../assets/img/icons/telephone-fill.svg" alt="Phone icon">
              <div class="name"><strong>PHONE</strong></div>
              <p>
                +65 6555 4888
              </p>
            </div>
          </div>

          <div class="contactus-col">
            <div class="contactus1">
              <img src="../assets/img/icons/envelope-fill.svg" alt="Email icon">
              <div class="name"><strong>E-Mail</strong></div>
              <p>
                denticare@localhost
              </p>
            </div>
          </div>
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
  <script src="assets/js/scripts.js" defer></script>
</footer>

</html>