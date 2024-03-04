<?php

include "../assets/php/connection.php";

if (isset($_POST["question_id"])) {
  $questionId = $_POST["question_id"];

  $deleteQuery = mysqli_query($connection, "DELETE FROM `quiz_questions` WHERE question_id = $questionId");

  if ($deleteQuery) {
    echo "<script>alert('Question Deleted Successfully')</script>";
  } 
  else {
    echo "<script>alert('Cant delete')</script>";
  }
}
