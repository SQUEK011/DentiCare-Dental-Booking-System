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


CloseCon($conn)
?>
</body>
</html>