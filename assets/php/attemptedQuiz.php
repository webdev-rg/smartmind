<?php 

include "connection.php";

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `attempted_quiz` WHERE `studentId` = $studentId");
}

?>