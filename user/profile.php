<?php
include "../assets/php/profileDetails.php";
include "../assets/php/attemptedQuiz.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $fetchData['firstName'] . ' ' . $fetchData['lastName']; ?>
  </title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/profile.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <header class="header">
    <div class="left-side">
      <div class="logo">
        <img src="../assets/images/Logo.svg" alt="logo" />
      </div>
      <nav class="navbar">
        <ul>
          <li class="active"><a href="./profile.php">My Profile</a></li>
          <li><a href="./quizes.php">My Quizes</a></li>
        </ul>
      </nav>
    </div>

    <div class="right-side">
      <div class="user">
        <span>My Account <i class="fi fi-rr-angle-small-down"></i></span>
        <ul class="user-menu">
          <li class="active"><a href="./profile.php">My Profile</a></li>
          <li><a href="./quizes.php">My Quizes</a></li>
          <li><a href="./editprofile.php">Edit Profile</a></li>
          <li><a href="./setting.php">Setting</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <section class="profile-container">
    <div class="container">
      <div class="profile-content">
        <div class="student-image">
          <label for="profile-img">
            <?php
            if (!empty($fetchData["studentImage"])) {
            ?>
              <img src="../assets/StudentsProfileImages/<?php echo $fetchData["studentImage"]; ?>" style='width: 20rem; height: 20rem; object-fit: cover; border: 1rem solid #fff; text-align: center; border-radius: 50%; box-shadow: 0 5px 2rem rgba(0, 0, 0, 0.1);' class='profile-img'>

            <?php
            } else {
            ?>
            <?php
              echo "<img src='../assets/images/profile-user.png' style='width: 20rem; height: 20rem; object-fit: cover; text-align: center; border: 1rem solid #fff; border-radius: 50%; box-shadow: 0 5px 2rem rgba(0, 0, 0, 0.1);' class='profile-img'>";
            }
            ?>
          </label>
        </div>

        <div class="student-data">
          <h1><?php echo $fetchData['firstName'] . ' ' . $fetchData['lastName']; ?></h1>
          <div class="profile-info-wrapper">
            <div class="profile-info-item">
              <span class="profile-info-item-label">UniqueId: </span>
              <span class="profile-info-item-value"><?php echo $fetchData['studentUniqueId'] ?></span>
            </div>

            <div class="profile-info-item">
              <span class="profile-info-item-label">Username: </span>
              <span class="profile-info-item-value"><?php echo $fetchData['username'] ?></span>
            </div>

            <div class="profile-info-item">
              <a class="edit-profile" href="./editprofile.php">Edit Profile</a>
              <a class="start-quiz" href="./quizes.php">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>

      <div class="quizes-content">

        <?php
        if (mysqli_num_rows($selectQuery) > 0) {
          while ($row = mysqli_fetch_assoc($selectQuery)) {
        ?>
            <div class="quiz-container">
              <div class="lang-image-container">
                <div class="lang-image">
                  <img src="../assets/images/Javascript.png" alt="">
                </div>
              </div>
              <div class="quiz-attempted-info">
                <div class="profile-skills-item">
                  <h2><?php echo $row["quiz_topic_name"]; ?></h2>
                </div>
                <div class="profile-skills-item">
                  <span class="profile-skills-item-label">Time Taken: </span>
                  <span class="profile-skills-item-value"><?php echo $row["time_taken"]; ?></span>
                </div>
                <div class="profile-skills-item">
                  <span class="profile-skills-item-label">Rating: </span>
                  <span class="profile-skills-item-value"><?php echo $row["rating"]; ?></span>
                </div>
                <div class="profile-skills-item">
                  <span class="profile-skills-item-label">Score: </span>
                  <span class="profile-skills-item-value"><?php echo $row["score"]; ?></span>
                </div>
                <div class="profile-skills-item">
                  <span class="profile-skills-item-label">Result: </span>
                  <span class="profile-skills-item-value"><?php echo ["result"]; ?></span>
                </div>
              </div>

            <?php
          }
            ?>
            </div>
          <?php
        } else {
          ?>

            <div class="no-quiz-attempted">
              <span>No quiz attempted yet.</span>
            </div>
          <?php
        }
          ?>
      </div>
    </div>
  </section>
</body>

</html>