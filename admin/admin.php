<?php
include "../assets/php/admin/adminDetails.php";
include "../assets/php/admin/addnewtopic.php";
include "../assets/php/admin/addQuestion.php";

include "../assets/php/connection.php";
$selectQuery = mysqli_query($connection, "SELECT * FROM `students`");
$selectQuizes = mysqli_query($connection, "SELECT * FROM `quiz_topics`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - <?php echo $fetchData["adminFirstName"] . ' ' . $fetchData["adminLastName"] ?></title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/admin.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="spinner"></div>
  </div>

  <div class="main-container">
    <div class="container">
      <div class="left-side">
        <div class="inner-left-side">
          <div class="logo">
            <img src="../assets/images/Logo.svg" alt="logo">
          </div>
          <nav>
            <div class="nav-bar">
              <ul>
                <li class="tab active">
                  <div class="icon">
                    <img src="../assets/images/icons/dashboard.png" alt="dashboard">
                  </div>
                  <span>Dashboard</span>
                </li>
                <li class="tab">
                  <div class="icon">
                    <img src="../assets/images/icons/students.png" alt="students">
                  </div>
                  <span>Students</span>
                </li>
                <li class="tab">
                  <div class="icon">
                    <img src="../assets/images/icons/topic.png" alt="add-new-topic">
                  </div>
                  <span>Add New Topic</span>
                </li>
                <li class="tab">
                  <div class="icon">
                    <img src="../assets/images/icons/addquestion.png" alt="add-new-question">
                  </div>
                  <span>Add New Question</span>
                </li>
              </ul>
            </div>
            <div class="logout-btn">
              <a href="../logout.php">
                <div class="icon">
                  <img src="../assets/images/icons/logout.png" alt="logout-icon">
                </div>
                <span>Logout</span>
              </a>
            </div>
          </nav>
        </div>
      </div>

      <div class="right-side">
        <!-- Header -->
        <header class="header">
          <h2>Admin Panel</h2>
          <div class="admin">
            <div class="admin-info-wrapper">
              <div class="admin-image">
                <img src="../assets/images/profile-user.png" alt="admin-profile-image">
              </div>
              <div class="admin-info">
                <h2><?php echo $fetchData["adminFirstName"] . ' ' . $fetchData["adminLastName"]; ?></h2>
                <p><?php echo $fetchData["adminEmail"] ?></p>
              </div>
              <i class="fi fi-rr-angle-small-down"></i>
            </div>
            <ul class="admin-menu">
              <li class="active"><a href="./profile.php">Profile</a></li>
              <li><a href="./setting.php">Setting</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div>
        </header>

        <section class="inner-right-side">
          <!-- Dashboard -->
          <div class="dashboard section active">
            <div class="cards">
              <div class="card">
                <div class="icon">
                  <img src="../assets/images/icons/ranking.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Ranking</h1>
                </div>
              </div>
              <div class="card">
                <div class="icon">
                  <img src="../assets/images/icons/attemptedquiz.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Attempted Quiz</h1>
                </div>
              </div>
              <div class="card">
                <div class="icon">
                  <img src="../assets/images/icons/quiztopcis.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Quiz Topics</h1>
                </div>
              </div>
            </div>

            <div class="dashboard-content">
              
            </div>
          </div>

          <!-- Students -->
          <div class="students section">
            <h1>Students</h1>

            <div class="student-section">
              <div class="student-container">
                <ul class="student-info">
                  <li class="stud-name">Name</li>
                  <li class="stud-uid">UniqueId</li>
                  <li class="stud-email">Email</li>
                  <li class="stud-username">Username</li>
                  <li class="stud-gender">Gender</li>
                </ul>

                <?php
                if (mysqli_num_rows($selectQuery) > 0) {
                  while ($row = mysqli_fetch_assoc($selectQuery)) {
                ?>
                    <ul class="student-items">
                      <li class="stud-name"><?php echo $row["firstName"] . ' ' . $row["lastName"] ?></li>
                      <li class="stud-uid"><?php echo $row["studentUniqueId"] ?></li>
                      <li class="stud-email"><?php echo $row["email"] ?></li>
                      <li class="stud-username"><?php echo $row["username"] ?></li>
                      <li class="stud-gender"><?php echo $row["gender"] ?></li>
                    </ul>
                <?php
                  }
                }
                ?>
              </div>
            </div>

          </div>

          <!-- Add new topics -->
          <div class="new-topic section">
            <h1>Add New Topic</h1>

            <div class="new-topic-container">
              <form action="#" method="post" class="new-topic-form" enctype="multipart/form-data">
                <label for="langImage">Select Language Logo</label>
                <input type="file" name="langImage" id="langImage" accept="image/*">
                <div class="topic-input-field">
                  <label for="newTopicName"><i class="fi fi-rr-poll-h"></i></label>
                  <input type="text" name="newTopicName" id="newTopicName" placeholder="Enter New Topic Name" required>
                </div>
                <div class="btn">
                  <input type="submit" name="addTopic" value="Add Topic">
                </div>
              </form>
            </div>
          </div>

          <!-- Add new question -->
          <div class="new-question section">
            <h1>Add New Questions to Topics</h1>

            <div class="add-questions-container">
              <form action="#" method="post" class="question-form">
                <div class="topic-dropdown">
                  <div class="select-topic">
                    <label for="selectTopic">Select Topic</label>
                    <input type="button" value="Select Topic" name="selectedTopic" id="selectedTopic" hidden required>
                    <i class="fi fi-rr-angle-small-down"></i>
                  </div>

                  <ul class="topicList">
                    <?php
                    if (mysqli_num_rows($selectQuizes) > 0) {
                      while ($row = mysqli_fetch_assoc($selectQuizes)) {
                    ?>
                        <li>
                          <input type="radio" name="topicName" id="<?php echo $row["topic_name"] ?>" class="topicName" value="<?php echo $row["topic_name"] ?>">
                          <label for="<?php echo $row["topic_name"] ?>"><?php echo $row["topic_name"] ?></label>
                        </li>
                    <?php
                      }
                    }
                    ?>
                  </ul>
                </div>

                <div class="question-options">
                  <div class="question-container">
                    <label for="question">Question</label>
                    <textarea name="question" id="question" placeholder="Enter Question" required></textarea>
                  </div>

                  <div class="options-container">
                    <div class="option-group">
                      <div class="option-input">
                        <label for="option1">Option 1</label>
                        <input type="text" name="option1" id="option1" placeholder="Enter Option 1" required>
                      </div>
                      <div class="option-input">
                        <label for="option2">Option 2</label>
                        <input type="text" name="option2" id="option2" placeholder="Enter Option 2" required>
                      </div>
                    </div>
                    <div class="option-group">
                      <div class="option-input">
                        <label for="option3">Option 3</label>
                        <input type="text" name="option3" id="option3" placeholder="Enter Option 3" required>
                      </div>
                      <div class="option-input">
                        <label for="option4">Option 4</label>
                        <input type="text" name="option4" id="option4" placeholder="Enter Option 4" required>
                      </div>
                    </div>
                    <div class="option-group">
                      <div class="option-input">
                        <label for="correctAnswer">Correct Answer</label>
                        <input type="text" name="correctAnswer" id="correctAnswer" placeholder="Enter Correct Answer" required>
                      </div>
                      <div class="option-input">
                        <label for="marks">Marks</label>
                        <input type="text" name="marks" id="marks" placeholder="Enter Marks" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="btn">
                  <input type="submit" name="addQuestion" value="Add Question">
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- JavaScript -->

  <script>
    // Shift tabs
    const tabs = document.querySelectorAll(".tab");
    const tabContents = document.querySelectorAll(".section");

    tabs.forEach((tab, index) => {
      tab.addEventListener("click", () => {
        tabContents.forEach((content) => {
          content.classList.remove("active");
        });
        tabs.forEach((tab) => {
          tab.classList.remove("active");
        });
        tabContents[index].classList.add("active");
        tabs[index].classList.add("active");
      });
    });

    // Topic dropdown

    const selectTopic = document.querySelector(".select-topic");
    const topicList = document.querySelector(".topicList");

    selectTopic.addEventListener("click", () => {
      topicList.classList.toggle("open");
    });

    const topicNames = document.querySelectorAll(".topicName");
    const selectedTopic = document.getElementById("selectedTopic");
    const label = document.querySelector(".select-topic label");

    topicNames.forEach((topic) => {
      topic.addEventListener("click", () => {
        if (topic.checked) {
          selectedTopic.value = topic.value;
          label.innerHTML = topic.value;
          topicList.classList.remove("open");
          console.log(selectTopic.value);
        }
      })
    })
  </script>
  <script src="../assets/js/script.js"></script>
</body>

</html>