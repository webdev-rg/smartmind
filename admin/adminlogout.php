<?php

require "../assets/php/connection.php";
session_start();

$_SESSION = [];
session_unset();
session_destroy();
header("Location: adminlogin.php");
