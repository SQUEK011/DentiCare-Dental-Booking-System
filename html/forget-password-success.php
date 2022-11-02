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


$email = $_POST['email'];
$randomPass = password_generate(13);

function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function sendEmailtoUser($password, $email){
    $emailTrim = trim($email,".com");
    $to      = $emailTrim;
    $subject = 'Temporary Password!';
    $message = "<html><body>The temporary password is <strong>". $password .'</strong></body></html>';
    $headers = 'From: denticare@localhost' . "\r\n" .
        'Reply-To: ' .$emailTrim . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    mail($to, $subject, $message, $headers,'-denticare@localhost');
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
                            <a href="?isLogin=true" class="navbar-link" data-nav-link>
                                <img src="../assets/img/icons/circle-user-solid.svg" width="30px">
                            </a>
                        </li>

                    </ul>

                </nav>
                <a href="?isUser=true" class="btn">Book appointment</a>
                <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
                    <img src="../assets/img/icons/bars-solid.svg" width="20px" aria-hidden="true" class="menu-icon">
                    <img src="../assets/img/icons/xmark-solid.svg" width="20px" aria-hidden="true" class="close-icon">
                </button>
            </div>
        </div>
    </header>
    <section class="forget-password background">
        <div class="container">
            <div class="surround-container">
                <h1>Forget your Password?</h1>
                <?php
                    $sql = "UPDATE user_accounts SET pass_word = '$randomPass' where user_name IN (SELECT user_name FROM user_profile where email='$email');";
                    if ($conn->query($sql)){
                        echo "<span>An Email containing a temporary password has been sent. If you have not received this email, you might have input the wrong email.</span>";
                        echo "<br><span>Return Home to Login.</span>";
                        
                        sendEmailtoUser($randomPass,$email);
                        
                        echo"<div class='btns-container'>
                            <a href='login.php'>
                                <button type='button' class='return-btn'>Return Home</button>
                            </a>
                        </div>";

                        
                    }
                    else {
                        echo "<span>There was an error in the system. Please try again later. </span>";
                    }
                ?>
                
                
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