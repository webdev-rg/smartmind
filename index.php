<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SmartMind - Onilne Quiz Platform</title>

  <!-- Css -->
  <link rel="stylesheet" href="./assets/css/index.css" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="./assets/images/apple-touch-icon.png" type="image/x-icon">
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

        <div class="heading">
          <h1 id="tagLines"></h1>
          <span>Showcase your tech skills, or gain a few more.</span>
        </div>
      </div>
    </div>
    <div class="right-container">
      <div class="right-inner-container">
        <div class="links">
          <h2>Get Started</h2>
          <div class="btns">
            <a href="./login.php">Login</a>
            <a href="./register.php">Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script>
    var typed = new Typed("#tagLines", {
      strings: [
        "<h1>The Skillset Verification Platform.</h1>",
        "<h1>Unleash Your Inner Genius!</h1>",
        "<h1>Grow Your Knowledge, Branch by Branch!</h1>",
        "<h1>Attracting Knowledge, One Quiz at a Time!</h1>",
      ],
      typeSpeed: 20,
      backDelay: 1500,
      loop: true,
      showCursor: false,
      fadeOut: true,
    });
  </script>
</body>

</html>