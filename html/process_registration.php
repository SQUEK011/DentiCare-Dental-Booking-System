<?php
    include("../assets/php/db_connection.php");
    $conn = OpenCon();
    session_start();

    $user = $_POST['getUsername'];
    $fullname = $_POST['getName'];
    $dob = $_POST['getDOB'];
    $nric = $_POST['getNRIC'];
    $mobileNumber = $_POST['getMobile'];
    $gender = $_POST['getGender'];
    $occupation = $_POST['getOccupation'];
    $email = $_POST['getEmail'];
    $allergies = $_POST['getAllergies'];
    $addressOne = $_POST['getAddressOne'];
    $addressTwo = $_POST['getAddressTwo'];
    $postal = $_POST['getPostal'];
    $emergencyName = $_POST['getEmergencyName'];
    $emergencyContact = $_POST['getEmergencyNumber'];
    $emergencyRelate = $_POST['getEmergencyRelation'];
    $password = $_POST['getPassword'];

    $sql = "INSERT INTO user_accounts(
      user_name,pass_word,admin_rights)
      VALUES ('$user','$password',0);";

    if (!mysqli_query($conn, $sql)) {
      echo "Failed to register: " . mysqli_error($connNew) . ".Please try again.";
    }

    $sql = "INSERT INTO user_profile(
      user_name,full_name,nric,D_O_B,gender,
    occupation,mobile_no,email,allergies,address_1,address_2,
    postal_code,emergency_contact_name,emergency_contact_no,emergency_contact_relation)
    VALUES ('$user','$fullname','$nric','$dob','$gender','$occupation',
    '$mobileNumber','$email','$allergies','$addressOne','$addressTwo','$postal',
    '$emergencyName','$emergencyContact','$emergencyRelate');";

    if (!mysqli_query($conn, $sql)) {
      echo "Failed to register: " . mysqli_error($connNew) . ".Please try again.";
    } else {

      $_SESSION['use'] = $user;

      echo '<script type="text/javascript"> alert("Register Successful!");</script>';
      echo '<script type="text/javascript"> window.open("../index.php","_self");</script>';            //  On Successful Login redirects to home.php
    }
?>