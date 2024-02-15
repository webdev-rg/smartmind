<?php
include "./assets/php/storeData.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration - SmartMind - Online Quiz Game Portal</title>

  <!-- Css File -->
  <link rel="stylesheet" href="./assets/css/register.css" />

  <!-- Icons CDN Link -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css" />
</head>

<body>
  <div class="main-container">
    <div class="left-container">
      <div class="left-inner-container">
        <div class="logo">
          <img src="./assets/images/Logo.svg" alt="logo" />
        </div>

        <div class="steps">
          <div class="step-1 step active">
            <div class="step-icon">
              <i class="fi fi-rr-user"></i>
            </div>
            <div class="step-text">
              <h2>What's Your Name?</h2>
              <p>Provide your name</p>
            </div>
          </div>
          <div class="step-2 step">
            <div class="step-icon">
              <i class="fi fi-rr-calendar"></i>
            </div>
            <div class="step-text">
              <h2>Date of Birth & Gender</h2>
              <p>Provide your date of birth and gender</p>
            </div>
          </div>
          <div class="step-3 step">
            <div class="step-icon">
              <i class="fi fi-rr-headset"></i>
            </div>
            <div class="step-text">
              <h2>Your Contact Info</h2>
              <p>Provide your contact info</p>
            </div>
          </div>
          <div class="step-4 step">
            <div class="step-icon">
              <i class="fi fi-rr-lock"></i>
            </div>
            <div class="step-text">
              <h2>Choose a password</h2>
              <p>Must be atleast 8 characters</p>
            </div>
          </div>
        </div>

        <div class="login-link">
          <a href="./login.php">Already have an account?</a>
        </div>
      </div>
    </div>

    <div class="right-container">
      <div class="right-inner-container">
        <div class="logo">
          <img src="./assets/images/Logo.svg" alt="logo" />
        </div>

        <h1>Create a New Account</h1>

        <div class="registration-form-container">
          <form action="register.php" method="POST" class="registration-form">
            <div class="form-1 form active">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-user"></i>
                </div>
              </div>

              <div class="head">
                <h2>What's Your Name?</h2>
                <p>By which name we should call you?</p>
              </div>

              <div class="input-group">
                <div class="input-field">
                  <label for="firstName"><i class="fi fi-rr-user"></i></label>
                  <input type="text" name="firstName" id="firstName" placeholder="Enter Your First Name" required autofocus />
                </div>
                <div class="input-field">
                  <label for="lastName"><i class="fi fi-rr-user"></i></label>
                  <input type="text" name="lastName" id="lastName" placeholder="Enter Your Last Name" required />
                </div>
              </div>

              <div class="btn">
                <input type="button" value="Continue" id="nameFormBtn" class="next-form-btn" />
              </div>
            </div>

            <div class="form-2 form">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-calendar"></i>
                </div>
              </div>

              <div class="head">
                <h2>Date of Birth & Gender</h2>
                <p>Which is your day & gender</p>
              </div>

              <div class="input-group">
                <div class="input-field">
                  <label for="dateOfBirth"><i class="fi fi-rr-calendar"></i></label>
                  <input type="date" name="dateOfBirth" id="dateOfBirth" placeholder="Enter Your First Name" required />
                </div>
                <div class="input-field gender-selection">
                  <p class="field-heading">Gender</p>
                  <label for="male">
                    <input type="radio" name="gender" value="male" id="male" required />Male
                  </label>
                  <label for="female">
                    <input type="radio" name="gender" value="female" id="female" required />Female
                  </label>
                </div>
              </div>

              <div class="btn">
                <button type="button" class="previous-form-btn">Back</button>
                <input type="button" value="Continue" id="dateOfBirthFormBtn" class="next-form-btn" />
              </div>
            </div>

            <div class="form-3 form">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-headset"></i>
                </div>
              </div>

              <div class="head">
                <h2>Your contact information</h2>
                <p>How we should contact you?</p>
              </div>

              <div class="input-group">
                <div class="input-field email">
                  <label for="email"><i class="fi fi-rr-envelope"></i></label>
                  <input type="email" name="email" id="email" placeholder="Email" required />
                </div>
                <div class="input-field mobile">
                  <label for="mobileNumber"><i class="fi fi-rr-phone-flip"></i></label>
                  <input type="tel" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number" required />
                </div>
              </div>

              <div class="btn">
                <button type="button" class="previous-form-btn">Back</button>
                <input type="button" value="Continue" id="contactFormBtn" class="next-form-btn" />
              </div>
            </div>

            <div class="form-4 form">
              <div class="icon-1">
                <div class="icon">
                  <i class="fi fi-rr-lock"></i>
                </div>
              </div>

              <div class="head">
                <h2>Choose a password</h2>
                <p>Choose a strong password to secure your account</p>
              </div>

              <div class="input-group">
                <div class="input-field password">
                  <label for="password"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="password" id="password" placeholder="Create new password" required />
                </div>
                <div class="input-field confirm-password">
                  <label for="confirm-password"><i class="fi fi-rr-lock"></i></label>
                  <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required />
                </div>
              </div>

              <div class="btn">
                <button type="button" class="previous-form-btn">Back</button>
                <input type="button" value="Submit" id="finalSubmitBtn" class="next-form-btn" />
              </div>
            </div>
          </form>
        </div>

        <div class="pagination">
          <div class="indicator active"></div>
          <div class="indicator"></div>
          <div class="indicator"></div>
          <div class="indicator"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="module" src="./assets/js/registerFormValidation.js"></script>
      <script type="module" src="./assets/js/functions.js"></script>
      <script type="module" src="./assets/js/register.js"></script>
</body>

</html>
