<?php

include "../assets/php/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["addQuestion"])) {
    $selectedTopic = isset($_POST["topicName"]) ? $_POST["topicName"] : "";
    $question = $_POST["question"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];
    $answer = $_POST["correctAnswer"];
    $marks = $_POST["marks"];

    $selectTopics = mysqli_query($connection, "SELECT `topicUniqueId` FROM `quiz_topics` WHERE `topic_name` = '$selectedTopic'");

    if ($selectTopics) {
      // Check if any rows were returned
      if (mysqli_num_rows($selectTopics) > 0) {
        $row = mysqli_fetch_assoc($selectTopics);
        $topicId = $row["topicUniqueId"];

        // Inserting new questions
        $insertQuestion = mysqli_query($connection, "INSERT INTO `quiz_questions`(`topic_unique_id`, `topic_name`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`)
        VALUES('$topicId', '$selectedTopic', '$question', '$option1', '$option2', '$option3', '$option4', '$answer', '$marks')");

        if($insertQuestion) {
          echo "<script>alert('One question added successfully');</script>";
          header("refresh: 0; url = admin.php");
        } 
        else {
          echo mysqli_error($connection);
        }
      } 
      else {
        echo "No matching topic found";
      }
    } 
    else {
      // Handle the query error
      echo "Error: " . mysqli_error($connection);
    }
    
    // Updating marks
    $selectMarks = mysqli_query($connection, "SELECT SUM(marks) AS totalMarks FROM `quiz_questions` WHERE `topic_name` = '$selectedTopic'");
    if($selectMarks) {
      if(mysqli_num_rows($selectMarks) > 0) {
        $fetchQuizTopic = mysqli_fetch_assoc($selectMarks);
        $topicMarks = $fetchQuizTopic["totalMarks"];
        $updateQuizTopicTable = mysqli_query($connection, "UPDATE `quiz_topics` SET `marks` = $topicMarks WHERE `topic_name` = '$selectedTopic'");
      }
    }

    // Updating questions count
    $selectQuizId = mysqli_query($connection, "SELECT count(topic_unique_id) AS totalQuestion FROM `quiz_questions` WHERE `topic_name` = '$selectedTopic'");
    if($selectQuizId) {
      if(mysqli_num_rows($selectQuizId) > 0) {
        $fetchQuizId = mysqli_fetch_assoc($selectQuizId);
        $topicId = $fetchQuizId["totalQuestion"];
        $updateQuizQuestionCount = mysqli_query($connection, "UPDATE `quiz_topics` SET `questions` = $topicId WHERE `topic_name` = '$selectedTopic'");
      }
    }
  }
}
