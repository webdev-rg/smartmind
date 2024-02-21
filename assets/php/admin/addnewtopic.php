<?php
include "../assets/php/connection.php";

function quizUniqueId()
{
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $randomString = '';
  $length = 12;

  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }

  return $randomString;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["addTopic"])) {
    $topicName = $_POST["newTopicName"];
    $topicUniqueId = quizUniqueId();

    $checkTopicExist = mysqli_query($connection, "SELECT `topic_name` FROM `quiz_topics` WHERE `topic_name` = '$topicName'");

    if (mysqli_num_rows($checkTopicExist) > 0) {
      echo '
      <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Topic already existed</title>

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
                z-index: 999;
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
                <i class="fa-solid fa-xmark icon"></i>

                <div class="message">
                  <span class="text text-1">Error</span>
                  <span class="text text-2">Topic already existed</span>
                </div>
              </div>
              <!-- <i class="fa-solid fa-xmark"></i> -->
              <div class="progress"></div>
            </div>
          </body>
        </html>

      ';
      // header("refresh: 0; url = admin.php");
      echo '
      <script>
        setTimeout(() => {
          document.querySelector(".toast").style.display = "none";
          window.location.replace("admin.php");
        }, 2000);
      </script>
    ';
    } else {
      $insertTopic = "INSERT INTO `quiz_topics` (`topic_name`, `topicUniqueId`) VALUES('$topicName', '$topicUniqueId')";
      $result = mysqli_query($connection, $insertTopic);

      if ($result) {
        echo '
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>New topic added successfully</title>
  
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
                  z-index: 999;
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
                    <span class="text text-2">New topic added successfully</span>
                  </div>
                </div>
                <!-- <i class="fa-solid fa-xmark"></i> -->
                <div class="progress"></div>
              </div>
            </body>
          </html>
        ';
        echo '
        <script>
          setTimeout(() => {
            document.querySelector(".toast").style.display = "none";
            window.location.replace("admin.php");
          }, 2000);
        </script>
    ';
      }
    }
  }
}
