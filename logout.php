<?php

require "./assets/php/connection.php";
session_start();

$_SESSION = [];
session_unset();
session_destroy();
// echo "<script>window.location.replace('index.php');</script>";
header("Location: index.html");
