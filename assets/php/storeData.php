<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/../../PHPMailer/PHPMailer/src/Exception.php";
require __DIR__ . "/../../PHPMailer/PHPMailer/src/PHPMailer.php";
require __DIR__ . "/../../PHPMailer/PHPMailer/src/SMTP.php";

require "connection.php";

if (!empty($_SESSION["studentId"])) {
  header("Location: ../smartmind/user/profile.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Setting timezone
  date_default_timezone_set('Asia/Kolkata');

  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $dateOfBirth = $_POST['dateOfBirth'];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $mobileNumber = $_POST['mobileNumber'];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $confirmPassword = $_POST["confirmPassword"];
  $checkEmailExist = mysqli_query($connection, "SELECT * FROM `students` WHERE `email` = '$email'");
  $checkMobileNumberExist = mysqli_query($connection, "SELECT * FROM `students` WHERE `mobileNumber` = '$mobileNumber'");
  $studentUniqueId = rand(100000, 999999);
  $accountCreationDateTime = date('Y-m-d H:i:s');

  // Generating username using student's firstname and lastname
  $username = strtolower($firstName) . strtolower($lastName) . rand(100, 999);

  // Verification Token
  $verificationCode = uniqid();

  // Setting verification token expiration time
  $expirationTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

  if (mysqli_num_rows($checkEmailExist) > 0) {
    echo '<script>alert("Email already existed");</script>';
  } 
  elseif (mysqli_num_rows($checkMobileNumberExist) > 0) {
    echo '<script>alert("Mobile number already existed");</script>';
  } 
  else {
    $insertQuery = "INSERT INTO `students`(`studentUniqueId`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `email`, `mobileNumber`, `username`, `password`, `accountCreationDateTime`, `verificationToken`, `tokenExpirationTime`) 
    VALUES ('$studentUniqueId', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$email', '$mobileNumber', '$username', '$password', '$accountCreationDateTime', '$verificationCode', '$expirationTime')";

    if (mysqli_query($connection, $insertQuery)) {

      //Configure PHPMailer
      $mail = new PHPMailer(true);

      try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rgbeatz01@gmail.com'; // Email address
        $mail->Password   = 'fzufhlmokrkeprtd'; // Email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('rgbeatz01@gmail.com', 'Smart Mind');
        $mail->addAddress($email, $firstName . ' ' . $lastName);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $verificationLink = 'http://localhost/smartmind/emailverification.php?token=' . $verificationCode;
        $mail->Body =
        '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto">' .
          '<tr>' .
            '<td style="text-align: center; color: #0e0e11; font-size: 16px; line-height; 1.6 font-weight: 500;">' .
              '<h2 style="font-size: 25px; font-weight: 600; color: #0e0e11;">Hi, ' . $firstName . ' ' . $lastName . '</h2>' .
              '<p>We received a verification request from your email id. <br>To complete your registration, please verify your email.</p>' .
              '<p>Click the link below to verify your email:</p>' .
              '<a style="padding: 10px 30px; background-color: #1ca44e; border-radius: 6px; font-size: 16px; font-weight: 500; color: #fff; text-decoration: none;" href="' . $verificationLink . '">Verify Email</a>' .
              '<p><b>Note: </b>Your verification link will expire at <b>' . $expirationTime . '</b>,<br>you will not be able to verify after the link expires.</p>' .
            '</td>' .
          '</tr>' .
        '</table>';

        $mail->send();
      } catch (Exception $e) {
        echo $e;
      }
    }

    echo '<script>
    setTimeout(() => {
      window.location.replace("/smartmind/registerSuccess.html");
    }, 2000);
    </script>';
  }
  // Close the database connection
  $connection->close();
}
