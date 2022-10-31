<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin Dashboard | DentiCare Dental Booking System </title>

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">

    <!--CSS-->
    <link rel="stylesheet" href="../css/dashboard.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php

include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

$sql = "SELECT doctor_name from doctors where user_name ='" . $_SESSION['use'] . "'";
$doctor_name = $conn->query($sql)->fetch_row();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php");
}

if (isset($_GET['profile'])) {
    $_SESSION['profile_name'] = $_GET['profile'];
    header("Location: ../patient_profile.php");
}

$patient_name = $_SESSION['profile_name'];
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

$sql = "SELECT * from user_profile where user_name = '$patient_name '";
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

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../assets/img/favicon/favicon-16x16.png">
            <span class="logo_name"> DentiCare</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <img src="../assets/img/icons/calendar-days-solid.svg" width="16px" height="16px">
                    <span class="links_name">My Appointments</span>
                </a>
            </li>
            <li>
                <a href="input_appt.php">
                    <img src="../assets/img/icons/pen-solid.svg" width="16px" height="16px">
                    <span class="links_name">Input Appointments</span>
                </a>
            </li>
            <li class="log_out">
                <a href="dashboard.php?logout=true">
                    <img src="../assets/img/icons/right-from-bracket-solid-white.svg" width="16px" height="16px">
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <img class='bx bx-menu sidebarBtn' src="../assets/img/icons/bars-solid.svg" width="16px" height="16px">
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <img src="../assets/img/icons/circle-user-solid.svg" alt="">
                <span class="admin_name"><?=$doctor_name[0]?></span>
            </div>
        </nav>

        <div class="home-content">
            <div class="container">
                <div class="profile"><div class="profile-container">
                    <header>Profile</header>
                    <a href="dashboard.php" style="float:right;">
                        <button type="submit" class="logout-btn">Back</button>
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

                    </div>
                </div></div>
                
            </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>
<?php
CloseCon($conn);
?>

</html>