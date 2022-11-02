<html>
    <body>
<?php
include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

$appt_date = $_POST['getDate'];
$appt_time = $_POST['getTime'];
$appt_no = $_SESSION['admin_appt_no'];

$sql = "UPDATE appointments set appt_date = '$appt_date', appt_time =  '$appt_time' where appt_no = $appt_no;";
if($results = $conn->query($sql)){
    $sql = "SELECT * from appointments where appt_no = $appt_no";
    $results = $conn->query($sql);

    $doctor_name = $service = $user_name = "";
    while ($row = $results->fetch_assoc()){
        $doctor_name = $row['doctor_name'];
        $service = $row['dental_service'];
        $user_name = $row['user_name'];
    }
    sendEmailtoPatient($user_name, $service, $doctor_name, $appt_time, $appt_date);

    echo '<script type="text/javascript"> 
            alert("Record Updated Successfully");
            window.location.href = "dashboard.php";
        </script>';
    
}
else {
    echo '<script type="text/javascript"> 
            alert("Update Record Unsuccesful");
            window.location.href = "dashboard.php";
        </script>';
}

function sendEmailtoPatient($user,$dental_service, $doctor_name, $appt_time, $appt_date){
    $to      = $user.'@localhost';
    $subject = 'Appointment is updated';
    $message = "
    
    <html>
        <body>
              <h2>Appoint has been updated</h2>
              <span><strong>Service:</strong> $dental_service</span>
              <span><strong>Doctor:</strong> $doctor_name</span>
              <span><strong>Appointment Date:</strong> $appt_date, $appt_time</span>
              
      </body>
  
  </html>";
    $headers = 'From: denticare@localhost' . "\r\n" .
        'Reply-To:'.$user.'@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    mail($to, $subject, $message, $headers,'-denticare@localhost');
}

CloseCon($conn)
?>
</body>
</html>