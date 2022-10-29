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

if (isset($_GET['select_appt'])){
    $appt_no = $_GET['select_appt'];
    $_SESSION['appt_no'] = $appt_no;
}

$sql = "SELECT appt_date, appt_time, doctor_name, dental_service from appointments where appt_no = '".$_SESSION['appt_no']."'";
$results = $conn->query($sql);

$appt_time =$appt_date=$doctor_name=$service="";

if (mysqli_num_rows($results) > 0){
    while ($row = $results->fetch_assoc()){
        $appt_time = $row['appt_time'];
        $appt_date = $row['appt_date'];
        $doctor_name = $row['doctor_name'];
        $service = $row['dental_service'];
    }
}

if(isset($_GET['isConfirm'])){
    $sql = "UPDATE appointments SET user_name = '".$_SESSION['use']."' where appt_no = ".$_SESSION['appt_no'];

    if (mysqli_query($conn,$sql)){
        popUpScreen($appt_time,$appt_date,$doctor_name,$service);
    }
    else {
        echo "Failed to register: " . mysqli_error($conn) . ".Please try again.";
    }
}

function popUpScreen($appt_time,$appt_date,$doctor_name,$service){
    echo "
    <div id='myModal' class='modal'>
    
      <div class='modal-content'>
        <div id='loader'></div>
        <div id='myDiv' class='animate-bottom'>
            <div class='modal-text'>
                <h2>Tada!</h2>
                <p>Congratulations you have successfully booked an appointment! A confirmation mail has been sent to your Email Address provided by you.</p>
            </div>
            <div class='next-appointment-container'>
                <div class='box-appointment'>
                    <div class='details-field'>
                    <label>Service: </label>
                    <span class='label-result'>$service</span>
                    </div>
                    <div class='details-field'>
                    <label>Doctor: </label>
                    <span class='label-result'>$doctor_name</span>
                    </div>
                    <div class='details-field'>
                    <label>Timeslot: </label>
                    <span class='label-result'>$appt_date, $appt_time</span>
                    </div>
                </div>
            </div>
            <div class='btns-container'>
                <a href='../index.php'>
                    <button type='button' class='return-btn'>Return to Home Page</button>
                </a>
            </div>
        </div>
        
        </div>
    
    </div>";

    echo "<script type'text/javascript'>
    
        var ele = document.getElementById('loader');
        window.setTimeout(function(){
            document.getElementById('loader').style.display = 'none';
            document.getElementById('myDiv').style.display = 'block';
        }, 4000);
    
    </script>";
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
                            <a href="confirm_appt.php?isLogin=true" class="navbar-link" data-nav-link>
                                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
                            </a>
                        </li>

                    </ul>

                </nav>
                <a href="confirm_appt.php?isUser=true" class="btn">Book appointment</a>
                <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
                    <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
                    <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
                </button>
            </div>
        </div>
    </header>

    <!-- Confirm Appoint Section -->
    <section class="confirm-appointment-booking">
        <div class="container">
        <h1 class="heading text-center"> Available Appointments</h1>
        <div class="confirm-appointment-container">
            <form action="" method="post">
                <span class="title">Service: </span><?=$service?>
                <span class="title">Doctor: </span><?=$doctor_name?>
                <span class="title">Timeslot: </span><?=$appt_date?>, <?=$appt_time?>
                <div class=btns-container>
                <div class="row">
                    <div class="column">
                        <a href="select_appt.php" style="float:right;">
                            <button type="button" class="back-btn">Back</button>
                        </a>
                    </div>
                    <div class="column">
                        <a href="confirm_appt.php?isConfirm=true" style="float:left;">
                            <button type="button" class="confirm-btn">Confirm</button>
                        </a>
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
    <script src="../assets/js/scripts.js" defer></script>
</footer>
<?php
CloseCon($conn);
?>

</html>