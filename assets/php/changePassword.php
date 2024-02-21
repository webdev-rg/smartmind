<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/../../PHPMailer/PHPMailer/src/Exception.php";
require __DIR__ . "/../../PHPMailer/PHPMailer/src/PHPMailer.php";
require __DIR__ . "/../../PHPMailer/PHPMailer/src/SMTP.php";

include "connection.php";

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");

  // Verification Token
  $verificationCode = uniqid();

  // Setting timezone
  date_default_timezone_set('Asia/Kolkata');
  // Setting verification token expiration time
  $expirationTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

  if ($selectQuery) {
    $row = mysqli_fetch_assoc($selectQuery);
    $email = $row['email'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];

    if (isset($_POST["changePassword"])) {
      $insertQuery = "INSERT INTO `changepasswordtoken`(`student_id`, `verificationToken`, `tokenExpirationTime`) 
      VALUES ('$studentId','$verificationCode','$expirationTime')";

      if (mysqli_query($connection, $insertQuery)) {
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
          $mail->Subject = 'Password Reset Verification';
          $verificationLink = 'http://localhost/smartmind/passwordchangeverification.php?token=' . $verificationCode;
          $mail->Body =
          '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto">' .
          '<tr>' .
            '<td style="text-align: center; color: #0e0e11; font-size: 16px; line-height; 1.6 font-weight: 500;">' .
              '<h2 style="font-size: 25px; font-weight: 600; color: #0e0e11;">Hi, ' . $firstName . ' ' . $lastName . '</h2>' .
              '<p>We receive an request for resetting password from your email id</p>' .
              '<p>Click the link below to reset your password:</p>' .
              '<a style="padding: 10px 30px; background-color: #1ca44e; border-radius: 6px; font-size: 16px; font-weight: 500; color: #fff; text-decoration: none;" href="' . $verificationLink . '">Reset Password</a>' .
              '<p><b>Note: </b>Your verification link will expire at <b>' . $expirationTime . '</b>,<br>you will not be able to verify after the link expires.</p>' .
            '</td>' .
          '</tr>' .
        '</table>';
            
        '<div>' .
              '<h2>Hi, ' . $firstName . ' ' . $lastName . '</h2>' .
              '<p style="font-size: 15px; font-weight: 500;">We receive an request for resetting password from your email id </p>' .
              '<p style="font-size: 15px; font-weight: 500;">Click the below link to reset your password</p>' .
              '<a style="font-size: 16px; font-weight: 500; color: #004eec; letter-spacing: 0.5px; text-decoration: none;" href="' . $verificationLink . '">Reset Password</a>' .
              '<p style="font-size: 15px; font-weight: 500;"><b>Note: </b>The verification link is active only for minutes.<br>Verify your email before it gets expire.</p>'.
            '</div>';

          $mail->send();
        } catch (Exception $e) {
          echo $e;
        }
      }
    }
  }
}
