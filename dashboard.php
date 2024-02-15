<?php
require "./assets/php/connection.php";
session_start();

if (!empty($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $selectQuery = mysqli_query($connection, "SELECT * FROM `students` WHERE id = $id");
  
  if($selectQuery) {
    $fetchData = mysqli_fetch_assoc($selectQuery);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $fetchData['username']. ' '.$fetchData['firstName'].' '.$fetchData['lastName']; ?>
  </title>
</head>

<body>

  <h1>
    Welcome
    <?php 
      echo $fetchData['firstName'] . ' ' . $fetchData['lastName'] . '<br>';
      echo '@'.$fetchData['username'];
    ?>
  </h1>
  <a href="./logout.php">Logout</a>
</body>

</html>