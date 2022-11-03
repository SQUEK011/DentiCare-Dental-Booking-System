<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | DentiCare Dental Booking System </title>

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">

    <!--CSS-->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php

include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

$sql = "SELECT doctor_name from doctors where user_name ='".$_SESSION['use']."'";
$doctor_name = $conn->query($sql)->fetch_row();

if (isset($_GET['logout'])) {
    session_destroy();
    echo '<script type="text/javascript"> 
            alert("See you again!");
            window.location.href = "../index.php";
        </script>';
}

if (isset($_GET['profile'])) {
    $_SESSION['profile_name'] = $_GET['profile'];
    header("Location: patient_profile.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['admin_appt_no'] = $_GET['delete'];
    echo '<script type="text/javascript"> 
        if(window.confirm("Confirm Delete?")){
            window.location.href = "delete_record.php";
        }
        </script>';
}

if (isset($_GET['edit'])) {
    $_SESSION['admin_appt_no'] = $_GET['edit'];
    header("Location: edit_appt.php");
}
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
                <h1 class="heading text-center"> Appointments</h1>
                <div class="show-appointments-container">
                    
                        <table border="1" class="appointment-table">
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Timeslot</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php
                            $sql = "SELECT appt_no, appt_date, appt_time, user_name from appointments where doctor_name='$doctor_name[0]' ORDER BY appt_date ASC" ;
                            $results = $conn->query($sql);
                            $i = 1;

                            if (mysqli_num_rows($results) > 0) {
                                while ($row = $results->fetch_assoc()) {
                                    echo "
                            <tr>
                                <td>" . $i++ . "</td>";
                                echo ($row['user_name'] == "") ? "<td>--</td>" :"<td><a href='dashboard.php?profile=" . $row['user_name'] . "'<a>". $row['user_name'] ."</td>";
                                
                                echo "<td>" . $row['appt_date'] . "</td>
                                <td>" . $row['appt_time'] . "</td>";
                                
                                echo ($row['user_name'] == "") ? "<td><button type='button' class='edit-btn' disabled>Edit</button></td>" : "
                                <td>
                                
                                    <a href='dashboard.php?edit=" . $row['appt_no'] . "'>
                                    <button type='button' class='edit-btn' value='" . $row['appt_no'] . "'>Edit</button>
                                    </a>
                
                                </td>";
                                echo "<td><a href='dashboard.php?delete=" . $row['appt_no'] . "'>
                                <button type='button' class='delete-btn' value='" . $row['appt_no'] . "'>Delete</button>
                                </a>
                                </td>
                            </tr>
                        ";
                                }
                            }

                            mysqli_free_result($results);
                            ?>
                        </table>
                    
                </div>
            </div>
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