<?php 

include "connection.php";

if(!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION['studentId'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `quiz_topics`");

  if ($selectQuery) {
    $fetchQuiz = mysqli_fetch_assoc($selectQuery);
  }
}

?>