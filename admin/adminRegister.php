<?php 
include "../assets/php/admin/storeAdminData.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration - SmartMind</title>

  <!-- Css -->
  <link rel="stylesheet" href="../assets/css/adminregister.css">

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

        <div class="register-form-container">
          <form method="post" class="register-form">
            <div class="input-group">
              <div class="input-field">
                <label for="adminFirstName"><i class="fi fi-rr-user"></i></label>
                <input type="text" name="adminFirstName" id="adminFirstName" placeholder="Admin First Name" required autofocus />
              </div>
              <div class="input-field">
                <label for="adminLastName"><i class="fi fi-rr-user"></i></label>
                <input type="text" name="adminLastName" id="adminLastName" placeholder="Admin Last Name" required />
              </div>
            </div>
            <div class="input-group">
              <div class="input-field">
                <label for="adminEmail"><i class="fi fi-rr-envelope"></i></label>
                <input type="email" name="adminEmail" id="adminEmail" placeholder="Admin Email" required />
              </div>
              <div class="input-field">
                <label for="adminPassword"><i class="fi fi-rr-lock"></i></label>
                <input type="password" name="adminPassword" id="adminPassword" placeholder="Admin Password" required />
              </div>
            </div>
            <div class="btn">
              <input type="submit" name="submit" value="Register">
            </div>
          </form>

          <p>Already Admin? <a href="./adminlogin.php">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>