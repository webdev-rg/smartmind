<?php

require "../assets/php/connection.php";
session_start();

if (!empty($_SESSION["adminId"])) {
  header("Location: admin.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $adminEmail = $_POST["adminEmail"];
  $adminPassword = $_POST["adminPassword"];

  $result = mysqli_query($connection, "SELECT * FROM `admin` WHERE `adminEmail` = '$adminEmail'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($adminEmail == $row["adminEmail"] && $adminPassword == $row["adminPassword"]) {
      $_SESSION["login"] = true;
      $_SESSION["adminId"] = $row["adminId"];

      echo "<script>alert('Login Successful');</script>";
      echo '<script>window.location.replace("admin.php");</script>';
    } 
    else {
      echo "<script>alert('Login Failed');</script>";
      echo mysqli_error($connection);
    }
  }
}
