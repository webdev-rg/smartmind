<?php 
include "../assets/php/admin/loginAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login - SmartMind</title>

  <!-- Css File -->
  <link rel="stylesheet" href="../assets/css/adminlogin.css" />

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
      <div class="inner-container">
        <div class="logo">
          <img src="../assets/images/Logo.svg" alt="logo" />
        </div>

        <h1>Admin Login</h1>

        <div class="login-form-container">
          <form method="post" class="login-form">
            <div class="form-1 form">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-sign-in-alt"></i>
                </div>
              </div>

              <div class="input-group">
                <div class="input-field email">
                  <label for="adminEmail"><i class="fi fi-rr-envelope"></i></label>
                  <input type="email" name="adminEmail" id="adminEmail" placeholder="Admin Email" required autofocus />
                </div>
                <div class="input-field password">
                  <label for="adminPassword"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="adminPassword" id="adminPassword" placeholder="Admin Password" required />
                </div>
              </div>

              <div class="forgot-password">
                <a href="#">Forgot Password?</a>
              </div>

              <div class="btn">
                <input type="submit" value="Login" name="submit" id="loginBtn" class="loginBtn" />
              </div>
            </div>
          </form>
          <p>New Admin? <a href="./adminRegister.php">Register</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="module" src="./assets/js/login.js"></script> -->
</body>

</html>