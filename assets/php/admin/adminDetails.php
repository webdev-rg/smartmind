<?php 

include "../assets/php/connection.php";
session_start();

if (!empty($_SESSION['adminId'])) {
  $adminId = $_SESSION['adminId'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `admin` WHERE `adminId` = $adminId");

  if ($selectQuery) {
    $fetchData = mysqli_fetch_assoc($selectQuery);
  }
}
else
{
  header("Location: adminlogin.php"); // if not login admin will be redirected to login page
}
?>