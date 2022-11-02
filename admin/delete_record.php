<html>
    <body>
<?php
include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

$appt_no = $_SESSION['admin_appt_no'];

$sql = "DELETE from appointments where appt_no = $appt_no";
if($results = $conn->query($sql)){
    echo '<script type="text/javascript"> 
            alert("Record Deleted Successfully");
            window.location.href = "dashboard.php";
        </script>';
    sendEmailtoPatient();
}
else {
    echo '<script type="text/javascript"> 
            alert("Delete Record Unsuccesful");
            window.location.href = "dashboared.php";
        </script>';
}

function sendEmailtoPatient(){
    $to      = 'poketree@localhost';
    $subject = 'Appointment is cancelled';
    $message = "
    
    <html>
        <body>
              <h2>Appoint has been cancelled due to doctor's arrangement</h2>
              <p> Please book another appointment or contact the doctor via an email for clarification<br><br>
                We apologise for the inconvienience caused.
              </p>
      </body>
  
  </html>";
    $headers = 'From: denticare@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    mail($to, $subject, $message, $headers,'-denticare@localhost');
}

$_SESSION['admin_appt_no'] = "";
CloseCon($conn)
?>
</body>
</html>