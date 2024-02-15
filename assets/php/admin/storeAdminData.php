<?php

include "../assets/php/connection.php";
session_start();

if (!empty($_SESSION["adminId"])) {
  header("Location: admin.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Setting timezone
  date_default_timezone_set('Asia/Kolkata');

  $adminFirstName = $_POST["adminFirstName"];
  $adminLastName = $_POST["adminLastName"];
  $adminEmail = $_POST["adminEmail"];
  $adminPassword = $_POST["adminPassword"];
  $accountCreationDateTime = date('Y-m-d H:i:s');
  $checkEmailExist = mysqli_query($connection, "SELECT * FROM `admin` WHERE `adminEmail` = '$adminEmail'");

  if (mysqli_num_rows($checkEmailExist) > 0) {
    echo '<script>alert("Email already existed");</script>';
  } 
  else {
    $insertQuery = "INSERT INTO `admin`(`adminFirstName`, `adminLastName`, `adminEmail`, `adminPassword`, `accountCreationDateTime`) 
    VALUES ('$adminFirstName', '$adminLastName', '$adminEmail', '$adminPassword', '$accountCreationDateTime')";

    if (mysqli_query($connection, $insertQuery)) {
      echo "<script>alert('Registration Successful');</script>";
      echo "<script>window.location.replace('adminLogin.php');</script>";
    }
    else {
      echo mysqli_error($connection);
    }
  }
}
