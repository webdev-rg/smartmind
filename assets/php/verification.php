<?php

// verify.php

// Your existing verification code logic here

// After successfully verifying the email, check for the redirect parameter
if (isset($_GET['redirect']) && $_GET['redirect'] === 'login') {
  header("Location: login.php");
  exit();
}


// include "connection.php";
// session_start();
// session_regenerate_id(true);

// echo "SessionId: " . $_SESSION['id'];

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//   $verificationToken = $_POST['verificationToken'];
//   $studentId = $_SESSION['id'];

//   if (!empty($verificationToken)) {
//     $selectQuery = "SELECT `verificationToken`, `tokenExpirationTime`, `isVerified` FROM `students` WHERE `id` = '$studentId'";
//     $result = mysqli_query($connection, $selectQuery);

//     if ($result && mysqli_num_rows($result) > 0) {
//       $row = mysqli_fetch_assoc($result);
//       $expirationTime = strtotime($row['tokenExpirationTime']);
//       $currentTime = time();

//       if ($currentTime > $expirationTime) {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Token has expired</span>';
//         echo '<script>
//           setTimeout(() => {
//             document.querySelector("span").style.display = "none";
//           }, 2000);
//         </script>';
//       } 
//       elseif ($verificationToken === $row['verificationToken']) {
//         $verifyStudent = mysqli_query($connection, "UPDATE `students` SET `isVerified` = 1 WHERE `id` = '$studentId'");

//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Email verified</span>';
//         echo '<script>
//           setTimeout(() => {
//             window.location.replace("login.html");
//           }, 2000);
//         </script>';
//         exit; // Stop further execution to avoid header issues
//       } 
//       elseif ($verificationToken !== $row['verificationToken']) {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Invalid token</span>';
//         echo '<script>
//           setTimeout(() => {
//             document.querySelector("span").style.display = "none";
//           }, 2000);
//         </script>';
//       } 
//       else {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Token not found</span>';
//         echo '<script>
//           setTimeout(() => {
//             document.querySelector("span").style.display = "none";
//           }, 2000);
//         </script>';
//       }
//     }
//   }
// }

// include "connection.php";
// session_start();

// if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
//   $verificationToken = $_POST['verificationToken'];
//   $studentId = $_SESSION['id'];

//   if(!empty($verificationToken)) {
//     $selectQuery = "SELECT `verificationToken`, `tokenExpirationTime`, `isVerified` FROM `students` WHERE `id` = '$studentId'";
//     $result = mysqli_query($connection, $selectQuery);

//     if($result && mysqli_num_rows($result) > 0) {
//       $row = mysqli_fetch_assoc($result);
//       $expirationTime = strtotime($row['tokenExpirationTime']);
//       $currectTime = time();

//       if ($currectTime > $expirationTime) {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Token has expired</span>';
//         echo '<script>
//         setTimeout(() => {
//           document.querySelector("span").style.display = "none";
//         }, 2000);
//         </script>';
//       }
//       elseif ($verificationToken === $row['verificationToken']) {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Email verified</span>';
//         echo '<script>
//         setTimeout(() => {
//           window.location.replace("login.html");
//         }, 2000);
//         </script>';

//         $verifyStudent = mysqli_query($connection, "UPDATE `students` SET `isVerified` = 1 WHERE `id` = '$studentId'");
//       }
//       elseif ($verificationToken !== $row['verificationToken']) {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Invalid token</span>';
//         echo '<script>
//         setTimeout(() => {
//           document.querySelector("span").style.display = "none";
//         }, 2000);
//         </script>';
//       }
//       else {
//         echo '<span style="font-size: 25px; position: absolute; top: 10px; right: 10px; padding: 10px 30px">Token not found</span>';
//         echo '<script>
//         setTimeout(() => {
//           document.querySelector("span").style.display = "none";
//         }, 2000);
//         </script>';
//       }
//     }
//   }
// }
