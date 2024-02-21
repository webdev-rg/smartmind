<?php
// verify.php

require "./assets/php/connection.php";
session_start();

date_default_timezone_set('Asia/Kolkata');

if (isset($_GET['token'])) {
  $verificationCode = mysqli_real_escape_string($connection, $_GET['token']);
  
  $selectQuery = "SELECT * FROM `students` WHERE `verificationToken` = '$verificationCode'";
  
  $result = mysqli_query($connection, $selectQuery);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $studentEmail = $row['email'];

    // Check if the token is still valid
    $currentTimestamp = new DateTime();
    $tokenExpirationTimestamp = new DateTime($row['tokenExpirationTime']);

    if ($currentTimestamp < $tokenExpirationTimestamp) {
      if ($row['isVerified'] == 1) {
        header("Location: alreadyverified.html");
      } 
      else {
        $updateQuery = "UPDATE `students` SET `isVerified` = 1 WHERE `email` = '$studentEmail'";

        if (mysqli_query($connection, $updateQuery)) {
          echo "<h1 style='text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>Email verified successfully<br>You will be redirected to the login page</h1>";         
          echo "<script>
            setTimeout(() => {
              window.location.replace('login.php');
            }, 3000);
          </script>";
          // header("Location: login.php");
          exit();
        } 
        else {
          echo "Error updating record: " . mysqli_error($connection);
        }
      }
    } 
    else {
      header("Location: linkexpired.html");
      exit();
    }
  } 
  else {
    echo "No rows found for the verification code.";
  }
} 
else {
  echo "'token' parameter is not present in the URL.";
}

$connection->close();
