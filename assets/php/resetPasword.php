<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "connection.php";

if (!empty($_SESSION['studentId'])) {
  $studentId = $_SESSION['studentId'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");

  // Check for SQL errors
  if (!$selectQuery) {
    echo "Error: " . mysqli_error($connection);
  }

  if ($selectQuery) {
    $row = mysqli_fetch_assoc($selectQuery);

    if (isset($_POST["submit"])) {
      $currentPassword = $_POST["currentPassword"];
      $newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
      $confirmNewPassword = $_POST["confirmNewPassword"];

      if (!password_verify($currentPassword, $row["password"])) {
        echo "<script>alert('Current password is incorrect');</script>";
      } else {
        if (!password_verify($confirmNewPassword, $newPassword)) {
          echo "<script>alert('Password does not match');</script>";
        } else {
          $updateQuery = mysqli_query($connection, "UPDATE `students` SET `password` = '$newPassword' WHERE `studentId` = $studentId");

          // Check for SQL errors in update query
          if (!$updateQuery) {
            echo "Error: " . mysqli_error($connection);
          } else {
            echo "<script>alert('Password reset successfully');</script>";
            echo "<script>window.location.replace('logout.php')</script>";
          }
        }
      }
    }
  }
}

$connection->close();
