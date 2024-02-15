<?php 
include "./assets/php/resetPasword.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password - SmartMind - Online Quiz Game Portal</title>

  <!-- Css File -->
  <link rel="stylesheet" href="./assets/css/resetpassword.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon">

  <!-- Icons CDN Link -->
  <link 
    rel="stylesheet" 
    href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" 
  />
  <link 
    rel="stylesheet" 
    href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" 
  />
</head>

<body>
  <div class="main-container">
    <div class="container">
      <div class="inner-container">
        <div class="logo">
          <img src="./assets/images/Logo.svg" alt="logo" />
        </div>

        <h1>Reset Password</h1>

        <div class="reset-form-container">
          <form action="resetpassword.php" method="post" class="reset-form">
            <div class="form-1 form">
              <div class="icon-1">
                <div class="icon">
                <i class="fi fi-rr-lock"></i>
                </div>
              </div>

              <div class="input-group">
                <div class="input-field email">
                  <label for="currentPassword"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="currentPassword" id="currentPassword" placeholder="Current Password" required autofocus />
                </div>
                <div class="input-field email">
                  <label for="newPassword"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="newPassword" id="newPassword" placeholder="New Password" required />
                </div>
                <div class="input-field password">
                  <label for="confirmNewPassword"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm Password" required />
                </div>
              </div>

              <div class="btn">
                <input type="submit" value="Reset Password" name="submit" id="resetBtn" class="resetBtn" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="module" src="./assets/js/login.js"></script> -->
</body>

</html>