<html>
    <body>
<?php
include("../assets/php/db_connection.php");
$conn = OpenCon();
session_start();

$appt_date = $_POST['getDate'];
$appt_time = $_POST['getTime'];
$doctor_name = $_POST['getName'];
$dental_service =$_POST['getService'];

$sql = "INSERT INTO appointments (appt_date, appt_time, doctor_name, dental_service) VALUES ('$appt_date', '$appt_time', '$doctor_name', '$dental_service');";
if($results = $conn->query($sql)){
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

/*function sendEmailtoPatient(){
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
}*/

CloseCon($conn)
?>
</body>
</html>