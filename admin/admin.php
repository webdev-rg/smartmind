<?php
include "../assets/php/admin/adminDetails.php";

include "../assets/php/connection.php";
$selectQuery = mysqli_query($connection, "SELECT * FROM `students`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - SmartMind</title>

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
              <a href="../adminlogout.php">
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
                <p>Admin Unique Id</p>
              </div>
              <i class="fi fi-rr-angle-small-down"></i>
            </div>
            <ul class="admin-menu">
              <li class="active"><a href="./profile.php">Profile</a></li>
              <li><a href="./setting.php">Setting</a></li>
              <li><a href="../adminlogout.php">Logout</a></li>
            </ul>
          </div>
        </header>

        <section class="inner-right-side">
          <!-- Dashboard -->
          <div class="dashboard section ">
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
                  <img src="../assets/images/icons/admins.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Admins</h1>
                </div>
              </div>
              <div class="card">
                <div class="icon">
                  <img src="../assets/images/icons/topic.png" alt="ranking">
                </div>
                <div class="card-info">
                  <h1>Quiz Topics</h1>
                </div>
              </div>
            </div>
          </div>
          <!-- Students -->
          <div class="students section active">
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
          <div class="new-topic section"></div>

          <!-- Add new question -->
          <div class="new-question section"></div>
        </section>
      </div>
    </div>
  </div>

  <!-- JavaScript -->

  <script>
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
  </script>
</body>

</html>