<?php

include "connection.php";
// session_start();

if (!empty($_SESSION['studentId'])) {
  $studentId = $_SESSION['studentId'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");

  if ($selectQuery) {
    $row = mysqli_fetch_assoc($selectQuery);

    // Update query to update user's data
    if (isset($_POST["submit"])) {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $dateOfBirth = $_POST['dateOfBirth'];
      $gender = $_POST["gender"];
      $mobileNumber = $_POST["mobileNumber"];
      $username = $_POST["username"];

      $ProfileImage = $_FILES["profile_pic"]["name"];
      $target_dir = "../assets/StudentsProfileImages/";
      $target_file = $target_dir . basename($ProfileImage);

      // Update the user's profile information
      $updateQuery = "UPDATE `students` SET `firstName` = '$firstName', `lastName` = '$lastName', `dateOfBirth` = '$dateOfBirth', `gender` = '$gender', `mobileNumber` = '$mobileNumber', `username` = '$username', `studentImage` = '$ProfileImage' WHERE `studentId` = $studentId";

      $updateResult = mysqli_query($connection, $updateQuery);

      if ($updateResult) {
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "$target_file");
        echo "<script>alert('Profile updated successfully!');</script>";
        header("refresh: 0; url = editprofile.php");
      } else {
        echo "Error updating profile: " . mysqli_error($connection);
      }
    }
  }
}
