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
    <link rel="stylesheet" href="../css/style.css">
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <?php
        include("../assets/php/db_connection.php");
        $conn = OpenCon();
        session_start();

        $appt_no = $_SESSION['admin_appt_no'];
        
        $sql = "SELECT doctor_name from doctors where user_name ='".$_SESSION['use']."'";
        $doctor_name = $conn->query($sql)->fetch_row();
        
        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: ../index.php");
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
          <a href="dashboard.php">
            <img src="../assets/img/icons/calendar-days-solid.svg" width="16px" height="16px">
            <span class="links_name">My Appointments</span>
          </a>
        </li>
        <li>
          <a href="input_appt.php" class="active">
            <img src="../assets/img/icons/pen-solid.svg" width="16px" height="16px">
            <span class="links_name">Input Appointments</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
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
                <h1 class="heading text-center">Edit Appointment</h1>
                <div class="show-appointments-container">
                    <form action="update_record.php" method="post" onsubmit="editClear(event)">
                    <table border="1" class="appointment-table">
                            <tr>
                                
                                <th>User Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Timeslot</th>
                                <th></th>
                            </tr>
                            <?php
                            $sql = "SELECT appt_no, appt_date, appt_time, user_name from appointments where doctor_name='$doctor_name[0]' and appt_no = $appt_no" ;
                            $results = $conn->query($sql);
                            $i = 1;

                            if (mysqli_num_rows($results) > 0) {
                                while ($row = $results->fetch_assoc()) {
                                    echo "<tr>";
                                echo "<td>". $row['user_name'] ."</td>";
                                echo "<td><input type='date' name='getDate' id='editDate' value='".$row['appt_date']  . "' required></td>";
                                echo "<td><input type='time' name='getTime' min='09:00' max='17:00' value='". $row['appt_time'] ."' required></td>";
                                echo "
                                <td>
                                    <button type='submit' class='save-btn' value='" . $row['appt_no'] . "'>Save</button>
                                </td>";
                                }
                            }

                            mysqli_free_result($results);
                            ?>
                        </table>
                    </form>
                    <div class=btns-container>
                        <div class="row">
                            <div class="column">
                                <a href="dashboard.php" style="float:right;">
                                    <button type="submit" class="back-btn">Back</button>
                                </a>
                            </div>
                        </div>
                </div>
                </div>
            </div>
    </div>
  </section>

  
 <!--Javascript files-->
 <script src="../assets/js/dashboard.js" defer></script>

</body>
<?php
CloseCon($conn)?>
</html>

