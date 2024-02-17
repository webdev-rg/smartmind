<?php 
include "../assets/php/connection.php";

function quizUniqueId() {
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
  $randomString = '';
  $length = 12;

  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }

  return $randomString;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST["addTopic"])) {
    $topicName = $_POST["topicName"];
    $topicUniqueId = quizUniqueId();
  
    $insertTopic = "INSERT INTO `quiz_topics` (`topic_name`, `topicUniqueId`) VALUES('$topicName', '$topicUniqueId')";
    $result = mysqli_query($connection, $insertTopic);
  
    if($result) {
      echo "<script>alert('One topic added successfully.');</script>";
    }
  }
}

?>