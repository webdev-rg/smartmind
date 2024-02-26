<?php
include "../assets/php/admin/adminDetails.php";
include "../assets/php/admin/addnewtopic.php";
include "../assets/php/admin/addQuestion.php";

include "../assets/php/connection.php";
$selectQuery = mysqli_query($connection, "SELECT * FROM `students`");
$selectQuizes = mysqli_query($connection, "SELECT * FROM `quiz_topics`");
$selectTopicName = mysqli_query($connection, "SELECT * FROM `quiz_topics`");
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
              <a href="./adminlogout.php">
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
              <li><a href="./adminlogout.php">Logout</a></li>
            </ul>
          </div>
        </header>

        <section class="inner-right-side">
          <!-- Dashboard -->
          <div class="dashboard section active">
            <div class="cards">
              <div class="card dashboardTab">
                <div class="icon">
                  <img src="../assets/images/icons/ranking.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Ranking</h1>
                </div>
              </div>
              <div class="card dashboardTab">
                <div class="icon">
                  <img src="../assets/images/icons/attemptedquiz.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Attempted Quiz</h1>
                </div>
              </div>
              <div class="card dashboardTab">
                <div class="icon">
                  <img src="../assets/images/icons/quiztopcis.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Quiz Topics</h1>
                </div>
              </div>
            </div>

            <div class="dashboard-content">
              <div class="content">
                <h1>Ranking</h1>
              </div>
              <div class="content">
                <h1>Attempted Quiz</h1>
              </div>
              <div class="all-quizes content active">
                <h1>All Quizes</h1>
                <div class="quiz-topics">
                  <div class="topics-card">
                    <?php
                    if (mysqli_num_rows($selectQuizes) > 0) {
                      while ($fetchQuizes = mysqli_fetch_assoc($selectQuizes)) {
                    ?>
                        <div class="quiz-card">
                          <div class="quiz-lang-img">
                            <div class="img">
                              <?php
                              if (!empty($fetchQuizes["langImages"])) {
                              ?>
                                <img src="../assets/languageImages/<?php echo $fetchQuizes["langImages"]; ?>" alt="quiz-lang-image">
                              <?php
                              } else {
                              ?>
                                <img src="../assets/images/default-lang-image.png" alt="default-lang-iamge">
                              <?php
                              }
                              ?>
                            </div>
                          </div>

                          <div class="quiz-info-wrapper">
                            <div class="quiz-info-item">
                              <h5><?php echo $fetchQuizes["topic_name"]; ?></h5>
                            </div>
                            <div class="quiz-info-item">
                              <span class="quiz-info-item-label">Questions: </span>
                              <span class="quiz-info-item-value">
                                <?php
                                if (empty($fetchQuizes["questions"])) {
                                  echo "0";
                                } else {
                                  echo $fetchQuizes["questions"];
                                }
                                ?>
                              </span>
                            </div>
                            <div class="quiz-info-item">
                              <span class="quiz-info-item-label">Marks: </span>
                              <span class="quiz-info-item-value">
                                <?php
                                if (empty($fetchQuizes["marks"])) {
                                  echo "0";
                                } else {
                                  echo $fetchQuizes["marks"];
                                }
                                ?>
                              </span>
                            </div>
                            <div class="quiz-info-item">
                              <a href="./viewquestions.php?topic=<?php echo $fetchQuizes["topicUniqueId"]; ?>">View Questions</a>
                            </div>
                          </div>
                        </div>
                      <?php
                      }
                    } else {
                      ?>
                      <h2>No Quizes</h2>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
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
                  while ($student = mysqli_fetch_assoc($selectQuery)) {
                ?>
                    <ul class="student-items">
                      <li class="stud-name"><?php echo $student["firstName"] . ' ' . $student["lastName"] ?></li>
                      <li class="stud-uid"><?php echo $student["studentUniqueId"] ?></li>
                      <li class="stud-email"><?php echo $student["email"] ?></li>
                      <li class="stud-username"><?php echo $student["username"] ?></li>
                      <li class="stud-gender"><?php echo $student["gender"] ?></li>
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
                    <?php if (mysqli_num_rows($selectTopicName) > 0) { ?>
                      <?php while ($topicName = mysqli_fetch_assoc($selectTopicName)) { ?>
                        <li>
                          <input type="radio" name="topicName" id="<?php echo $topicName["topic_name"] ?>" class="topicName" value="<?php echo $topicName["topic_name"] ?>">
                          <label for="<?php echo $topicName["topic_name"] ?>"><?php echo $topicName["topic_name"] ?></label>
                        </li>
                      <?php } ?>
                    <?php } ?>
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

    const dashboardTabs = document.querySelectorAll(".dashboardTab");
    const dashboardContents = document.querySelectorAll(".content");

    dashboardTabs.forEach((tab, index) => {
      tab.addEventListener("click", () => {
        dashboardContents.forEach((content) => {
          content.classList.remove("active");
        });
        dashboardTabs.forEach((tab) => {
          tab.classList.remove("active");
        });
        dashboardContents[index].classList.add("active");
        dashboardTabs[index].classList.add("active");
      });
    });
  </script>
  <script src="../assets/js/script.js"></script>
</body>

</html>