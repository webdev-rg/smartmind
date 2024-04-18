<?php

include "./assets/php/loginUser.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - SmartMind - Online Quiz Game Portal</title>

  <!-- Css File -->
  <link rel="stylesheet" href="./assets/css/login.css" />

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
  <!-- Preloader -->
  <div class="preloader">
    <div class="spinner"></div>
  </div>
  
  <div class="main-container">
    <div class="left-container">
      <div class="left-inner-container">
        <div class="logo">
          <img src="./assets/images/Logo.svg" alt="logo" />
        </div>

        <div class="register-link">
          <h2>Don't have an account?</h2>
          <span>To play quiz and gain knowledge<br />create a free account.</span>
          <div class="register-btn">
            <a href="./register.php">Register</a>
          </div>
        </div>
      </div>
    </div>

    <div class="right-container">
      <div class="right-inner-container">
        <div class="logo">
          <img src="./assets/images/Logo.svg" alt="logo" />
        </div>

        <h1>Login</h1>

        <div class="login-form-container">
          <form method="post" class="login-form">
            <div class="form-1 form">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-sign-in-alt"></i>
                </div>
              </div>

              <div class="head">
                <h2>Login to your account.</h2>
                <p>Login using your email and password.</p>
              </div>

              <div class="input-group">
                <div class="input-field email">
                  <label for="email"><i class="fi fi-rr-envelope"></i></label>
                  <input type="email" name="email" id="email" placeholder="Email" required autofocus/>
                </div>
                <div class="input-field password">
                  <label for="password"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="password" id="password" placeholder="Password" required />
                </div>
              </div>
<!-- 
              <div class="forgot-password">
                <a href="#">Forgot Password?</a>
              </div> -->

              <div class="btn">
                <input type="button" value="Login" name="submit" id="loginBtn" class="loginBtn" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="module" src="./assets/js/login.js"></script>
  <script src="./assets/js/script.js"></script>
</body>

</html>