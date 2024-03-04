<?php
include "connection.php";
session_start();

$selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

if (!empty($_SESSION["studentId"])) {
  $studentId = $_SESSION["studentId"];
  $fetchTopicName = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $result = mysqli_query($connection, $fetchTopicName);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    // Handle the error or redirect to a different page
    header("Location: ../index.php");
    exit;
  }

  $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
  $questionResult = mysqli_query($connection, $fetchQuestions);

  if ($questionResult && mysqli_num_rows($questionResult) > 0) {
    $questions = mysqli_fetch_all($questionResult, MYSQLI_ASSOC);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['finishQuiz'])) {
    // Process and store the quiz results
    $score = 0;

    // Fetch all answers for the selected topic
    $fetchAnswers = mysqli_query($connection, "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'");
    if ($fetchAnswers && mysqli_num_rows($fetchAnswers) > 0) {
      $answersData = mysqli_fetch_all($fetchAnswers, MYSQLI_ASSOC);

      $option1 = $_POST["option1"];
      $option2 = $_POST["option2"];
      $option3 = $_POST["option3"];
      $option4 = $_POST["option4"];
      $option5 = $_POST["option5"];
      $option6 = $_POST["option6"];
      $option7 = $_POST["option7"];
      $option8 = $_POST["option8"];
      $option9 = $_POST["option9"];
      $option10 = $_POST["option10"];

      if ($option1 == $answersData[0]["answer"]) {
        $score += 2;
      }
      if ($option2 == $answersData[1]["answer"]) {
        $score += 2;
      }
      if ($option3 == $answersData[2]["answer"]) {
        $score += 2;
      }
      if ($option4 == $answersData[3]["answer"]) {
        $score += 2;
      }
      if ($option5 == $answersData[4]["answer"]) {
        $score += 2;
      }
      if ($option6 == $answersData[5]["answer"]) {
        $score += 2;
      }
      if ($option7 == $answersData[6]["answer"]) {
        $score += 2;
      }
      if ($option8 == $answersData[7]["answer"]) {
        $score += 2;
      }
      if ($option9 == $answersData[8]["answer"]) {
        $score += 2;
      }
      if ($option10 == $answersData[9]["answer"]) {
        $score += 2;
      }
    }

    // Getting student's name
    $studentData = mysqli_query($connection, "SELECT * FROM `students` WHERE `studentId` = $studentId");
    $fetchStudentData = mysqli_fetch_assoc($studentData);
    $studentName = $fetchStudentData["firstName"] . ' ' . $fetchStudentData["lastName"];
    $topicName = $row["topic_name"];
    $langImageResult = mysqli_query($connection, "SELECT `langImages` FROM `quiz_topics` WHERE `topicUniqueId` = '$selectedTopic'");
    if ($langImageResult && mysqli_num_rows($langImageResult) > 0) {
      // Fetch the data as an associative array
      $langImageData = mysqli_fetch_assoc($langImageResult);

      // Access the 'langImages' column
      $langImage = $langImageData['langImages'];
    }

    $level;
    $result;

    if ($score < 4) {
      $level = "Fail";
      $result = "Fail";
    }
    if ($score > 4 && $score <= 10) {
      $level = "Basic Level";
      $result = "Pass";
    }
    if ($score >= 10 && $score <= 16) {
      $level = "Intermediate Level";
      $result = "Pass";
    }
    if ($score >= 16 && $score <= 20) {
      $level = "Advance Level";
      $result = "Pass";
    }

    // Store the quiz results in the database
    $insertAttemptedQuiz = "INSERT INTO `attempted_quiz` (`studentId`, `student_name`, `topic_unique_id`, `quiz_topic_name`, `langImages`, `level`, `score`, `result`) 
    VALUES ('$studentId', '$studentName', '$selectedTopic', '$topicName', '$langImage', '$level', '$score', '$result')";
    $insertResult = mysqli_query($connection, $insertAttemptedQuiz);

    if ($insertResult) {
      // Redirect to a success page or do any other post-submission actions
      header("Location: /smartmind/user/profile.php");
      exit;
    } else {
      // Handle the error
      echo "Error: " . mysqli_error($connection);
    }
  }
} else {
  header("Location: ../login.php");
}
mysqli_close($connection);
