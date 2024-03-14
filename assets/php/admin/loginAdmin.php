<?php

require "../assets/php/connection.php";
session_start();

if (!empty($_SESSION["adminId"])) {
  header("Location: admin.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $adminEmail = $_POST["adminEmail"];
  $adminPassword = $_POST["adminPassword"];

  $result = mysqli_query($connection, "SELECT * FROM `admin` WHERE `adminEmail` = '$adminEmail'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($adminEmail == $row["adminEmail"] && $adminPassword == $row["adminPassword"]) {
      $_SESSION["login"] = true;
      $_SESSION["adminId"] = $row["adminId"];

      echo '
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>Login successful</title>
  
              <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
              />
              <link rel="preconnect" href="https://fonts.googleapis.com" />
              <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
              <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet"
              />
  
              <!-- Favicon -->
              <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
              <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon">
  
              <style>
                * {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
                  font-family: "Montserrat", sans-serif;
                }
                body {
                  width: 100%;
                  height: 100vh;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .toast {
                  width: 350px;
                  position: absolute;
                  top: 25px;
                  right: 30px;
                  border-radius: 12px;
                  padding: 12px 15px 12px 15px;
                  background-color: #fff;
                  box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.1);
                  border-left: 5px solid #119c65;
                }
                .toast .toast-content {
                  display: flex;
                  align-items: center;
                }
                .toast-content .check {
                  width: 32px;
                  height: 32px;
                  background-color: #119c65;
                  border-radius: 50%;
                  font-size: 20px;
                  color: #fff;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .toast-content .message {
                  display: flex;
                  flex-direction: column;
                  gap: 3px;
                  margin: 0 15px;
                }
                .message .text {
                  font-size: 15px;
                  font-weight: 400;
                  color: #666666;
                }
                .message .text.text-1 {
                  font-weight: 600;
                  color: #333;
                  letter-spacing: 0.4px;
                }
              </style>
            </head>
            <body>
              <div class="toast">
                <div class="toast-content">
                  <i class="fa-solid fa-check check"></i>
  
                  <div class="message">
                    <span class="text text-1">Success</span>
                    <span class="text text-2">Login successful</span>
                  </div>
                </div>
                <!-- <i class="fa-solid fa-xmark"></i> -->
                <div class="progress"></div>
              </div>
            </body>
          </html>
  
        ';
      echo '<script>
      setTimeout(() => {
        window.location.replace("admin.php");</script>;
      }, 2000)';
    } 
    else {
      echo '
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>Incorrect email or password</title>
  
              <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
              />
              <link rel="preconnect" href="https://fonts.googleapis.com" />
              <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
              <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet"
              />
  
              <!-- Favicon -->
              <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
              <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon">
  
              <style>
                * {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
                  font-family: "Montserrat", sans-serif;
                }
                body {
                  width: 100%;
                  height: 100vh;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .toast {
                  width: 350px;
                  position: absolute;
                  top: 15px;
                  right: 15px;
                  border-radius: 12px;
                  padding: 12px 15px 12px 15px;
                  background-color: #fff;
                  box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.1);
                  border-left: 5px solid #cb4d3f;
                }
                .toast .toast-content {
                  display: flex;
                  align-items: center;
                }
                .toast-content .icon {
                  width: 32px;
                  height: 32px;
                  background-color: #cb4d3f;
                  border-radius: 50%;
                  font-size: 20px;
                  color: #fff;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }
                .toast-content .message {
                  display: flex;
                  flex-direction: column;
                  gap: 3px;
                  margin: 0 15px;
                }
                .message .text {
                  font-size: 15px;
                  font-weight: 400;
                  color: #666666;
                }
                .message .text.text-1 {
                  font-weight: 600;
                  color: #333;
                  letter-spacing: 0.4px;
                }
              </style>
            </head>
            <body>
              <div class="toast">
                <div class="toast-content">
                  <i class="fa-solid fa-circle-xmark icon"></i>
  
                  <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">Incorrect Email or Password</span>
                  </div>
                </div>
                <!-- <i class="fa-solid fa-xmark"></i> -->
                <div class="progress"></div>
              </div>
            </body>
          </html>
      ';
    }
  }
}
