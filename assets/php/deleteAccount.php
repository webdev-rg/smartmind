<?php 

include "connection.php";

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");

  if($selectQuery) {
    $row = mysqli_fetch_assoc($selectQuery);
    $studentUniqueId = $_POST["studentUniqueId"];

    if(isset($_POST["deleteAccount"])) {
      if($studentUniqueId != $row["studentUniqueId"]) {
        echo "<script>alert('Incorrect UniqueId');</script>";
      }
      else {
        $deleteQuery = "DELETE FROM `students` WHERE `studentUniqueId` = $studentUniqueId AND `studentId` = $studentId";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if($deleteResult) {
          echo "<script>alert('Account delete sccussefully');</script>";
          header("Location: logout.php");
        }
      }
    }
  }
}

?>