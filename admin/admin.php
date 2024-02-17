<?php
include "../assets/php/admin/adminDetails.php";
include "../assets/php/admin/addnewtopic.php";
include "../assets/php/admin/addQuestion.php";
?>

<?php
include "../assets/php/connection.php";

$getAllQuizes = mysqli_query($connection, "SELECT * FROM `quiz_topics`");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - SmartMind</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>

  <form action="#" method="post">
    <h1>Add New Topic</h1>

    <input type="text" name="topicName" id="topicName" placeholder="Enter Topic Name" required>
    <input type="submit" name="addTopic" value="Add Topic">
  </form>
  <br>

  <form action="#" method="post">
    <label for="topicList">Choose Topic</label>
    <select name="topicList" id="topicList">
      <?php
      if (mysqli_num_rows($getAllQuizes) > 0) {
        while ($row = mysqli_fetch_assoc($getAllQuizes)) {
      ?>
          <option value="<?php echo $row["topic_name"]?>"><?php echo $row["topic_name"] ?></option>
      <?php
        }
      }
      ?>
    </select>
    <h1>Add Questions</h1>
    <input type="text" name="question" id="question" placeholder="Question" required> <br> <br>
    <input type="text" name="option1" id="option1" placeholder="Option1" required> <br> <br>
    <input type="text" name="option2" id="option2" placeholder="Option2" required> <br> <br>
    <input type="text" name="option3" id="option3" placeholder="Option3" required> <br> <br>
    <input type="text" name="option4" id="option4" placeholder="Option4" required> <br> <br>
    <input type="text" name="answer" id="answer" placeholder="Answer" required> <br> <br>
    <input type="text" name="marks" id="marks" placeholder="Marks" required> <br> <br>
    <input type="submit" name="addQuestion" value="Add Question">
  </form>
  <br>


  <a href="../logout.php">Logout</a>
</body>

</html>