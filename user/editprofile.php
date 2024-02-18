<?php
include "../assets/php/profileDetails.php";
include "../assets/php/updateProfile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile</title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/editprofile.css" />

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
          <li><a href="./quizes.php">Quizes</a></li>
          <li><a href="./profile.php">My Profile</a></li>
        </ul>
      </nav>
    </div>

    <div class="right-side">
      <div class="user">
        <span>My Account <i class="fi fi-rr-angle-small-down"></i></span>
        <ul class="user-menu">
          <li><a href="./quizes.php">Quizes</a></li>
          <li><a href="./profile.php">My Profile</a></li>
          <li class="active"><a href="./editprofile.php">Edit My Profile</a></li>
          <li><a href="./setting.php">Setting</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <!-- Edit Profile Section -->
  <section class="edit-profile-container">
    <div class="container">
      <div class="heading">
        <h1>Edit Profile</h1>
      </div>

      <div class="edit-form-container">
        <form action="" method="post" class="edit-form" enctype="multipart/form-data">
          <div class="profile-pic">
            <input type="file" name="profile_pic" id="profile-img" accept="image/*" hidden />
            <label for="profile-img">
              <div class="profile-picture">
                <?php
                if (!empty($fetchData["studentImage"])) {
                ?>
                  <img src="../assets/StudentsProfileImages/<?php echo $fetchData["studentImage"]; ?>" style='width: 20rem; height: 20rem; object-fit: cover; border: 1rem solid #fff; text-align: center; border-radius: 50%; box-shadow: 0 5px 2rem rgba(0, 0, 0, 0.1); cursor: pointer;' class='profile-img'>
                <?php
                } 
                else {
                ?>
                  <img src='../assets/images/profile-user.png' style='width: 20rem; height: 20rem; object-fit: cover; text-align: center; border: 1rem solid #fff; border-radius: 50%; box-shadow: 0 5px 2rem rgba(0, 0, 0, 0.1); cursor: pointer;' class='profile-img'>"
                <?php
                }
                ?>
              </div>
            </label>
            <h3>Profile Picture</h3>
          </div>

          <div class="input-group">
            <div class="input-field">
              <label for="firstName">First Name</label>
              <input type="text" name="firstName" id="firstName" value="<?php echo $fetchData['firstName']; ?>" id="firstName" placeholder="First Name" />
            </div>
            <div class="input-field">
              <label for="lastName">Last Name</label>
              <input type="text" name="lastName" id="lastName" value="<?php echo $fetchData['lastName']; ?>" id="lastName" placeholder="Last Name" />
            </div>
          </div>

          <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $fetchData['email']; ?>" id="email" placeholder="Email" readonly />
          </div>

          <div class="input-group">
            <div class="input-field">
              <label for="studentUniqueId">UniqueId</label>
              <input type="text" name="studentUniqueId" id="studentUniqueId" value="<?php echo $fetchData['studentUniqueId']; ?>" id="studentUniqueId" placeholder="Student UniqueId" readonly />
            </div>
            <div class="input-field">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" value="<?php echo $fetchData['username']; ?>" id="username" placeholder="Username" />
            </div>
          </div>

          <div class="input-group">
            <div class="input-field">
              <label for="dateOfBirth">Date Of Birth</label>
              <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?php echo $fetchData['dateOfBirth']; ?>" id="dateOfBirth" />
            </div>
            <div class="input-field">
              <label for="mobileNumber">Mobile Number</label>
              <input type="text" name="mobileNumber" id="mobileNumber" value="<?php echo $fetchData['mobileNumber']; ?>" id="mobileNumber" placeholder="mobileNumber" />
            </div>
          </div>

          <div class="input-group">
            <div class="gender-input">
              <span>Gender</span>
              <input type="radio" name="gender" value="male" id="male" <?php if ($fetchData['gender'] == 'male') echo ' checked'; ?> />
              <label for="male">Male</label>
            </div>
            <div class="gender-input">
              <input type="radio" name="gender" value="female" id="female" <?php if ($fetchData['gender'] == 'female') echo ' checked'; ?> />
              <label for="female">Female</label>
            </div>
          </div>

          <div class="updateBtn">
            <input type="submit" name="submit" id="updateProfile" value="Update Profile" />
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>