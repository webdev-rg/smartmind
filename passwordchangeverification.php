<?php

require "./assets/php/connection.php";
session_start();

date_default_timezone_set('Asia/Kolkata');

if (isset($_GET['token'])) {
  $verificationCode = mysqli_real_escape_string($connection, $_GET['token']);

  $selectQuery = "SELECT * FROM `changepasswordtoken` WHERE `verificationToken` = '$verificationCode'";

  $result = mysqli_query($connection, $selectQuery);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $currentTimestamp = new DateTime();
    $tokenExpirationTimestamp = new DateTime($row['tokenExpirationTime']);

    if ($currentTimestamp < $tokenExpirationTimestamp) {
      header("Location: resetpasswordverification.html");
      exit();
    }
    else {
      header("Location: passwordlinkexpired.html");
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
