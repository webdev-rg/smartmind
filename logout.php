<?php

require "./assets/php/connection.php";
session_start();

$_SESSION = ["studentId"];
session_unset();
session_destroy();
header("Location: index.php");
