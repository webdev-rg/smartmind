<?php 
require "connection.php";
session_start();

if (!empty($_SESSION['studentId'])) {
  $studentId = $_SESSION['studentId'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");

  if ($selectQuery) {
    $fetchData = mysqli_fetch_assoc($selectQuery);
  }
}
else
{
  header("Location: login.php"); // if not login student will be redirected to login page
}
?>
