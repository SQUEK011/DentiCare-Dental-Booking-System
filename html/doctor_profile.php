<!DOCTYPE html>
<html>

<?php
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

//if page came from doctors.php
$isFromDoctors = $_SESSION['fromDoctors'];

if (isset($_GET['return'])) {
    $_SESSION['fromDoctors'] = false;
    header("Location: ../html/doctors.php");
}

//SQL Query
//Declare variables 
$doctorName =
    $service1 = $service2 = $service3 =
    $aboutDoc = $imageUrl = "";

$selectedDoc = $_SESSION["doctor_selected"];
$sql = "SELECT * from doctors where doctor_name = '$selectedDoc'";
$results = $conn->query($sql);

if (mysqli_num_rows($results) > 0) {
    while ($row = $results->fetch_assoc()) {
        $doctorName = $row['doctor_name'];
        $service1 = $row['service_1'];
        $service2 = $row['service_2'];
        $service3 = $row['service_3'];
        $aboutDoc = $row['about_doctor'];
        $imageUrl = $row['image_url'];
    }
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
                            <a href="doctors_services.php?isLogin=true" class="navbar-link" data-nav-link>
                                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
                            </a>
                        </li>

                    </ul>

                </nav>
                <a href="doctors_services.php?isUser=true" class="btn">Book appointment</a>
                <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
                    <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
                    <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
                </button>
            </div>
        </div>
    </header>

    <!-- Doctors Profile -->
    <section class="doctors-full-profile background" id="doctors-full-profile">
        <div class="surround-container">
            <div class="doctorsfull-profile-container">
                <div class="row">
                    <div class="column">
                        <div class="dp-container">
                            <img src="<?= $imageUrl ?>" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="text-container">
                            <header><?= $doctorName ?></header>
                            <div class="services-provided-container">
                                <span class="title">Services Provided</span>
                                <ul>
                                    <?php echo ($service1 != "") ? "<li>$service1</li>" : ""; ?>
                                    <?php echo ($service2 != "") ? "<li>$service2</li>" : ""; ?>
                                    <?php echo ($service3 != "") ? "<li>$service3</li>" : ""; ?>
                                </ul>
                            </div>
                            <div class="about-doctor-container">
                                <span class="title">About Doctor</span>
                                <p><?= $aboutDoc ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                echo (!$isFromDoctors) ?
                '<div class=btns-container>
                    <div class="row">
                        <div class="column">
                            <a href="../html/doctors_services.php" style="float:right;">
                                <button type="submit" class="back-btn">Back</button>
                            </a>
                        </div>
                        <div class="column">
                            <a href="../html/select_appt.php" style="float:left;">
                                <button type="submit" class="confirm-btn">Confirm</button>
                            </a>
                        </div>
                    </div>
                </div>'
                : '<div class=btns-container>
                        <div class="row">
                            <div class="column">
                                <a href="doctor_profile.php?return" style="float:right;">
                                    <button type="submit" class="back-btn">Back</button>
                                </a>
                            </div>
                        </div>
                    </div>';
            ?>
            
        </div>
    </section>
    <!-- -->
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
CloseCon($conn);
?>

</html>