<?php
include "../assets/php/deleteAccount.php";
include "../assets/php/profileDetails.php";
include "../assets/php/changePassword.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Setting</title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/setting.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>

  <div class="account-deletion">
    <div class="account-delete-form">
      <form action="#" method="post">
        <i class="fi fi-rr-cross-small close-delete-form"></i>
        <h2>Account Deletion</h2>
        <span>If you delete your account your data will be deleted, and cannot be recovered.</span>
        <div class="input-field">
          <label for="studentUniqueId">Enter UniqueId</label>
          <input type="text" name="studentUniqueId" id="studentUniqueId" placeholder="Enter UniqueId" required />
        </div>
        <div class="btn">
          <input type="submit" name="deleteAccount" value="Delete Account">
        </div>
      </form>
    </div>
  </div>

  <div class="password-change">
    <div class="password-change-form">
      <form action="#" method="post">
        <i class="fi fi-rr-cross-small close-pwd-form"></i>
        <h2>Change Password</h2>
        <div class="input-field">
          <label for="currectPassword">Current Password</label>
          <input type="password" name="currectPassword" id="currectPassword" placeholder="Current Password" />
        </div>
        <div class="input-field">
          <label for="newPassword">New Password</label>
          <input type="password" name="newPassword" id="newPassword" placeholder="New Password" />
        </div>
        <div class="input-field">
          <label for="confirmNewPassword">Confirm Password</label>
          <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm Password" />
        </div>
        <div class="btn">
          <input type="submit" name="changePassword" value="Change Password">
        </div>
      </form>
    </div>
  </div>

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
          <li><a href="./editprofile.php">Edit My Profile</a></li>
          <li class="active"><a href="./setting.php">Setting</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <section class="setting-container">
    <div class="container">
      <div class="heading">
        <h1>Account Setting</h1>
      </div>

      <section class="setting-form-container">
        <form action="#" method="post" class="setting-form">
          <div class="input-group">
            <div class="input-field">
              <label for="firstName">First Name</label>
              <input type="text" name="firstName" id="firstName" value="<?php echo $fetchData['firstName']; ?>" id="firstName" placeholder="First Name" readonly />
            </div>
            <div class="input-field">
              <label for="lastName">Last Name</label>
              <input type="text" name="lastName" id="lastName" value="<?php echo $fetchData['lastName']; ?>" id="lastName" placeholder="Last Name" readonly />
            </div>
          </div>
          <div class="input-group">
            <div class="input-field">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?php echo $fetchData['email']; ?>" id="email" placeholder="Email" readonly />
            </div>
            <div class="input-field">
              <label for="studentUniqueId">UniqueId</label>
              <input type="text" name="studentUniqueId" id="studentUniqueId" value="<?php echo $fetchData['studentUniqueId']; ?>" id="studentUniqueId" placeholder="Student UniqueId" readonly />
            </div>
          </div>

          <div class="change-password-btn">
            <span>Want to change your password?</span>
            <input type="submit" name="changePassword" class="changePwdBtn" value="Change Password" />
          </div>

          <div class="account-delete-btn">
            <span>Account Deletion</span>
            <button type="button" class="deleteBtn">Delete your account</button>
          </div>
        </form>
      </section>
    </div>
  </section>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const deleteBtn = document.querySelector(".deleteBtn");
    const closeDeleteForm = document.querySelector(".close-delete-form");
    const accountDeletion = document.querySelector(".account-deletion");

    deleteBtn.addEventListener("click", () => {
      Swal.fire({
        title: "<h2 style='line-height: 2'>Are you sure?</h2><h2 style='font-size: 1.5rem; font-weight: 500; line-height: 1.9;'>You want to delete your account?</h2>",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#004eec",
        cancelButtonColor: "#ef4444",
        confirmButtonText: "<h2>Yes</h2>",
        cancelButtonText: "<h2>Cancel</h2>",
        width: "40rem",
        iconColor: "#2a86ff",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          accountDeletion.classList.add("active");
        }
      });
    });

    closeDeleteForm.addEventListener("click", () => {
      accountDeletion.classList.remove("active");
    });

    // const changePwdBtn = document.querySelector(".changePwdBtn");
    // const closePwdForm = document.querySelector(".close-pwd-form");
    // const passwordChange = document.querySelector(".password-change");

    // changePwdBtn.addEventListener("click", () => {
    //   Swal.fire({
    //     title: "<h2 style='line-height: 2'>Are you sure?</h2><h2 style='font-size: 1.5rem; font-weight: 500; line-height: 1.9;'>You want to change your password?</h2>",
    //     icon: "question",
    //     showCancelButton: true,
    //     confirmButtonColor: "#004eec",
    //     cancelButtonColor: "#ef4444",
    //     confirmButtonText: "<h2>Yes</h2>",
    //     cancelButtonText: "<h2>Cancel</h2>",
    //     width: "40rem",
    //     iconColor: "#2a86ff",
    //     allowOutsideClick: false  
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       passwordChange.classList.add("active");
    //     }
    //   });
    // });

    // closePwdForm.addEventListener("click", () => {
    //   passwordChange.classList.remove("active");
    // })
  </script>
</body>

</html>