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


if ($_SESSION['fromEdit']) {
    $appt_no = $_SESSION['appt_no'];
    $sql = "SELECT * from appointments where appt_no = $appt_no";

    if ($results = mysqli_query($conn, $sql)) {
        while ($row = $results->fetch_assoc()) {
            $doctorSelected = $row['doctor_name'];
            $serviceSelected = $row["dental_service"];
        }
    }
} else {
    //Get data from session 
    //$currentUser = $_SESSION['use'];
    $doctorSelected = $_SESSION["doctor_selected"];
    $serviceSelected = $_SESSION["service_selected"];
    $_SESSION['fromEdit'] = false;
}


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
                            <a href="select_appt.php?isLogin=true" class="navbar-link" data-nav-link>
                                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
                            </a>
                        </li>

                    </ul>

                </nav>
                <a href="select_appt.php?isUser=true" class="btn">Book appointment</a>
                <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
                    <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
                    <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
                </button>
            </div>
        </div>
    </header>

    <!-- Table of Available Appointments -->
    <section class="available_appointments" id="available_appointments">
        <div class="container">
            <h1 class="heading text-center"> Available Appointments</h1>
            <div class="show-appointments-container">
                <form name="myForm" action="confirm_appt.php" method="get" onsubmit="return validate()">
                    <table border="1" class="appointment-table">
                        <tr>
                            <th>Appointment Date</th>
                            <th>Appointment Timeslot</th>
                            <th></th>
                        </tr>
                        <?php
                        $sql = "SELECT appt_no, appt_date, appt_time from appointments where doctor_name='$doctorSelected' AND dental_service='$serviceSelected' AND user_name is null";
                        $results = $conn->query($sql);

                        if (mysqli_num_rows($results) > 0) {
                            while ($row = $results->fetch_assoc()) {
                                echo "
                            <tr>
                                <td>" . $row['appt_date'] . "</td>
                                <td>" . $row['appt_time'] . "</td>
                                <td><input type='radio' name='select_appt' id='appt' value='" . $row['appt_no'] . "'required></td>
                            </tr>
                        ";
                            }
                        }

                        mysqli_free_result($results);
                        ?>
                    </table>
                    <div class=btns-container>
                        <div class="row">
                            <div class="column">
                                <?php echo ($_SESSION['fromEdit']) ?
                                    '<a href="../html/profile.php" style="float:right;">
                            <button type="button" class="back-btn">Back</button>
                        </a>' :
                                    '<a href="../html/select_doctor.php" style="float:right;">
                            <button type="button" class="back-btn">Back</button>
                        </a>' ?>
                            </div>
                            <div class="column">
                                <button type="submit" class="confirm-btn" style="float:left;">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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