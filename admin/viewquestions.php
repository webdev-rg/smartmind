<?php
include "../assets/php/admin/adminDetails.php";
// include "../assets/php/connection.php";
include "../assets/php/admin/deletequestion.php";
include "../assets/php/admin/viewallquestions.php";

// $selectedTopic = isset($_GET['topic']) ? $_GET['topic'] : '';

// if (!empty($_SESSION["adminId"])) {
//   // Fetch topic details
//   $fetchTopic = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
//   $topicResult = mysqli_query($connection, $fetchTopic);

//   if ($topicResult && mysqli_num_rows($topicResult) > 0) {
//     $topicRow = mysqli_fetch_assoc($topicResult);
//   }

//   // Fetch quiz questions
//   $fetchQuestions = "SELECT * FROM `quiz_questions` WHERE `topic_unique_id` = '$selectedTopic'";
//   $result = mysqli_query($connection, $fetchQuestions);
// } else {
//   header("Location: ./adminlogin.php");
// }

// mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $topicRow["topic_name"]; ?></title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/viewquestions.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Selecting all the remove buttons
      const deleteQuestionBtn = document.querySelectorAll('.deleteQuestion');

      // Attaching a click event to each remove button
      deleteQuestionBtn.forEach(function(button) {
        button.addEventListener('click', function() {
          // Get the cart_id from the data attribute
          const questionId = this.getAttribute('data-questionid');

          // Sending an AJAX request to remove the item from the cart
          fetch('../assets/php/admin/deletequestion.php', {
              method: 'POST',
              body: JSON.stringify({
                question_id: questionId
              }),
              headers: {
                'Content-Type': 'application/json',
              },
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                // Removing the item from the cart UI
                const itemToRemove = this.closest('.question-card');
                itemToRemove.remove();
              } else {
                alert('Failed to remove the product');
              }
            });
        });
      });
    });
  </script>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="spinner"></div>
  </div>

  <header class="header">
    <h2><?php echo $topicRow["topic_name"]; ?></h2>
    <div class="admin">
      <div class="admin-info-wrapper">
        <div class="admin-info">
          <h2><?php echo $fetchData["adminFirstName"] . ' ' . $fetchData["adminLastName"]; ?></h2>
          <p><?php echo $fetchData["adminEmail"] ?></p>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="questions-container">
      <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <form action="" method="post">
            <div class="question-card">
              <div class="question-info-wrapper">
                <div class="question-item">
                  <span class="question-item-label">Q)</span>
                  <textarea name="question" class="question-item-value"><?php echo $row["question"] ?></textarea>
                </div>

                <div class="options-item">
                  <div class="option-group">
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["option1"] ?>" value="<?php echo $row["option1"] ?>">
                    </div>
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["option2"] ?>" value="<?php echo $row["option2"] ?>">
                    </div>
                  </div>
                  <div class="option-group">
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["option3"] ?>" value="<?php echo $row["option3"] ?>">
                    </div>
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["option4"] ?>" value="<?php echo $row["option4"] ?>">
                    </div>
                  </div>
                  <div class="option-group">
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["answer"] ?>" value="<?php echo $row["answer"] ?>">
                    </div>
                    <div class="option-field">
                      <input type="text" name="option" id="<?php echo $row["marks"] ?>" value="<?php echo $row["marks"] ?>">
                    </div>
                  </div>
                </div>

                <div class="delete-question">
                  <input type="text" class="delete-question" name="question_id" value="<?php echo $row["question_id"] ?>" hidden />
                  <button class="deleteQuestion" data-questionid="<?php echo $row["question_id"] ?>">Delete Question</button>
                </div>
              </div>
            </div>
          </form>
        <?php } ?>
      <?php } else {
        echo "No questions for this quiz";
      } ?>

    </div>
  </div>

  <!-- JavaScript -->
  <script src="../assets/js/script.js"></script>
</body>

</html>